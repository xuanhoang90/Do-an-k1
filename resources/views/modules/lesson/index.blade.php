@extends('admin')



@section('title', 'List')
@section('name', 'Lesson')
@section('app-content')



<div class="card-header">
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createLessonModal">
                <i class="fas fa-plus"></i> Create Lesson
            </a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Short Description</th>
                        <th>Status</th>
                        <th>Thumbnail</th>
                        <th>Sample Image</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody text-center>
                    @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lesson->name }}</td>
                        <td>{{ $lesson->content }}</td>
                        <td>{{ $lesson->short_description }}</td>
                        <td>
                            <span class="badge {{ $lesson->status ? 'badge-success' : 'badge-danger' }}">
                                {{ $lesson->status ? 'Show' : 'Hidden' }}
                            </span>
                        </td>
                        <td><img src="{{ asset('uploads/lessons/thumbnail/' . $lesson->thumbnail) }}" alt="{{ $lesson->name }}" width="70px"></td>
                        <td>

                            <img src="{{ asset('uploads/lessons/sample_image/' . $lesson->sample_image) }}" alt="{{ $lesson->name }}" width="70px">

                        </td>
                        <td>
                            <div class="image-stack mx-auto" id="imageStack-{{ $lesson->id }}" data-bs-toggle="modal" data-bs-target="#imageModal-{{ $lesson->id }}">
                                @php
                                $sampleImages = json_decode($lesson->sample_image, true) ?? [];
                                @endphp
                                @foreach($sampleImages as $index => $image)
                                <img src="{{ asset('uploads/lessons/sample_image/' . $image) }}" alt="Sample Image {{ $index + 1 }}">
                                @endforeach
                            </div>

                            <!-- Modal for Image Gallery -->
                            <div class="modal fade" id="imageModal-{{ $lesson->id }}" tabindex="-1" aria-labelledby="imageModalLabel-{{ $lesson->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel-{{ $lesson->id }}">Image Gallery for {{ $lesson->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex flex-wrap justify-content-center">
                                            @foreach($sampleImages as $image)
                                            <img src="{{ asset('uploads/lessons/sample_image/' . $image) }}" alt="Sample Image" class="modal-img">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <!-- <td>{{ $lesson->level->name ?? 'N/A' }}</td> -->
                        <td>
                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editLessonModal-{{ $lesson->id }}">Edit</a>
                            <a href="{{ route('admin.lesson.destroy', $lesson->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('modules.lesson.create')
@include('modules.lesson.edit', ['lessons' => $lessons])

@endsection
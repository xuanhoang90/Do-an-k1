@extends('admin.layout')

@section('content')
@include('admin.commons.flash-message')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">List Social Post</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">List Post</h4>
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Feeling</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>
                                    @if($post->studentLessonHistory)
                                        <img src="{{ asset('storage/' . $post->studentLessonHistory->image) }}" alt="Thumbnail"
                                            style="width: 200px; height: 200px;">
                                    @else
                                        <span>No Thumbnail</span>
                                    @endif
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content ?? 'No Content' }}</td>
                                <td>{{ $post->feeling ?? 'No Feeling' }}</td>
                                <td>
                                    @if($post->status == 1)
                                        Hide
                                    @elseif($post->status == 2)
                                        Show
                                    @else
                                        Unknown
                                    @endif
                                </td>
                                <td>
                                    @if($post->type == 1)
                                        Pending
                                    @elseif($post->type == 2)
                                        Approve
                                    @elseif($post->type == 3)
                                        Rejected
                                    @else
                                        Unknown
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-success action-btn" data-id="{{ $post->id }}"
                                        data-action="approve">Approve</button>
                                    <button class="btn btn-danger action-btn" data-id="{{ $post->id }}"
                                        data-action="reject">Reject</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

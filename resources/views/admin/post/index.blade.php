@extends('admin.layout')

@section('content')
@include('admin.commons.flash-message')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">List Social Post</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20 shadow-sm rounded">
                <h4 class="c-grey-900 mB-20">List Post</h4>
                <table id="dataTable" class="table table-hover table-bordered text-center" text-align="center" cellspacing="0" width="100%">
                    <thead class="table-primary text-center"  >
                        <tr class="text-center">
                            <th class="text-center">ID</th>
                            <th class="text-center">Thumbnail</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Content</th>
                            <th class="text-center">Feeling</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>
                                    @if($post->studentLessonHistory)
                                        <img src="{{ asset('storage/' . $post->studentLessonHistory->image) }}" alt="Thumbnail"
                                            class="img-thumbnail" style="width: 150px; height: 150px;">
                                    @else
                                        <span class="text-muted">No Thumbnail</span>
                                    @endif
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content ?? '<span class="text-muted">No Content</span>' }}</td>
                                <td>{{ $post->feeling ?? '<span class="text-muted">No Feeling</span>' }}</td>
                                <td>
                                    <span class="badge 
                                        @if($post->status == 1) bg-secondary 
                                        @elseif($post->status == 2) bg-success 
                                        @else bg-danger @endif">
                                        {{ $post->status == 1 ? 'Hide' : ($post->status == 2 ? 'Show' : 'Unknown') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge 
                                        @if($post->type == 1) bg-warning 
                                        @elseif($post->type == 2) bg-success 
                                        @elseif($post->type == 3) bg-danger 
                                        @else bg-secondary @endif">
                                        {{ $post->type == 1 ? 'Pending' : ($post->type == 2 ? 'Approve' : ($post->type == 3 ? 'Rejected' : 'Unknown')) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success action-btn" data-id="{{ $post->id }}" data-action="approve">
                                        Approve
                                    </button>
                                    <button class="btn btn-sm btn-danger action-btn" data-id="{{ $post->id }}" data-action="reject">
                                        Reject
                                    </button>
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

@extends('admin')

@section('title', 'List')
@section('name', 'Category')
@section('app-content')

<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <a href="" class="btn btn-primary btn-color" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"></path>
                </svg> Create Category
            </a>
            

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Created_by</th>
                        <th>Update_by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            @if ($category->status == 1)
                            <span class="right badge badge-success">Show</span>
                            @else
                            <span class="right badge badge-danger">Hidden</span>
                            @endif
                        </td>
                        <td> <img src="{{ asset('uploads/category/' . $category->thumbnail) }}" alt="{{ $category->name }}" width="70px">
                        </td>
                        <td>{{ $category->created_by }}</td>
                        <td>{{ $category->updated_by }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editCategoryModal-{{ $category->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            
                            <a href="{{ route('admin.category.destroy', $category->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Category Modal -->
@include('modules.category.create')

<!-- Edit Category Modal -->
@foreach($categories as $category)
@include('modules.category.edit', ['category' => $category])
@endforeach

@endsection

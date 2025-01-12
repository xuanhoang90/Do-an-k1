@extends('form')


@section('title', 'List')
@section('name', 'Category')
@section('app-content')



<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <a href="{{route('admin.category.create')}}" class="btn btn-primary btn-lg d-flex align-items-center">
            <i class="ti-plus mr-10"> </i> Add
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nation ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Thumbnail</th>
                <th>Level</th>
                <th>Category</th>
                <th>Created_by</th>
                <th>Update_by</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{$category->national->name}}</td>
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
                <td>{{ $category->level->name }}</td>
                <td>{{ $category->category->name }}</td>
                <td>{{ $category->created_by }}</td>
                <td>{{ $category->updated_by }}</td>
                <td>
                  
                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info" >Edit</a>
                    
                    <a href="{{ route('admin.category.destroy', $category->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>


@endsection
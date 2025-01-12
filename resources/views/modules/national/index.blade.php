@extends('form')


@section('title', 'List')
@section('name', 'National')
@section('app-content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <a href="{{route('admin.national.create')}}" class="btn btn-primary btn-lg d-flex align-items-center">
            <i class="ti-plus mr-10"> </i> Add
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($nationals as $national )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $national->name }}</td>
                  
                    <td>
                        <a class="btn btn btn-info" href="{{ route('admin.national.edit', $national->id ) }}">Edit</a>
                        <a class="btn btn btn-danger" href="{{ route('admin.national.destroy', $national->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No items found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
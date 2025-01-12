@extends('form')


@section('title', 'List')
@section('name', 'National')
@section('app-content')

<div class="container mt-4">
    <!-- Form Nhập Liệu -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Edit New Nation</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.national.update', $national->id ) }}" method="POST">
                @csrf 
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name"  id="name" class="form-control" placeholder="Enter name" required value="{{old('name' ,$national -> name)}}">
                    
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    
@endsection
@extends('form')


@section('title', 'List')
@section('name', 'Nation')
@section('app-content')

<div class="container mt-4">
   
    <div class="card mb-4">
        <div class="card-header">
            <h4>Add New Nation</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.national.store') }}" method="POST">
                @csrf 
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required value="{{old('name')}}">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    
@endsection
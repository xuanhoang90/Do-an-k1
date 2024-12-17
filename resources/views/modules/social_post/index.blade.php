@extends('admin')



@section('title', '')
@section('name', '')
@section('app-content')


<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <a href="" class="btn btn-primary btn-color" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"></path>
                </svg> Create Social Post Comment
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
                <tr>
                        <td>Abc</td>
                        <td>Abc</td>
                        <td>Abc</td>
                        <td>Abc</td>
                        <td>Abc</td>
                        <td>Abc</td>
                        <td>Abc</td>
                        <td>
                            <button type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i> Edit
                            </button>

                            <a href="" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
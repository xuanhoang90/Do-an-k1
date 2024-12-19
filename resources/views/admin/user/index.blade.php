@extends('admin.layout')

@section('content')
@include('admin.commons.flash-message')

<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Users</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">Danh sach user</h4>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Display name</th>
                <th>National</th>
                <th>Level</th>
                <th>Type</th>
                <th>status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tfoot>
              <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Display name</th>
                <th>National</th>
                <th>Level</th>
                <th>Type</th>
                <th>status</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>

              {
                @foreach ($users as $user)

                  <tr>
                    <td>{{ $user->id }}</td>
                    <td><img src="{{ $user->profile->avatar }}" width="100" /></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->profile?->display_name ?? 'No name' }}</td>
                    <td>{{ $user->profile?->national?->name ?? 'No national' }}</td>
                    <td>{{ $user->profile?->level?->name ?? 'No level' }}</td>
                    <td>{{ $user->getUserTypeName() }}</td>
                    <td>{{ $user->getStatusName() }}</td>
                    <td>
                      <button type="button" class="btn cur-p btn-primary btn-color">View</button>
                      <button type="button" class="btn cur-p btn-info btn-color">Edit</button>
                      <button type="button" class="btn cur-p btn-danger btn-color">Ban</button>
                    </td>
                  </tr>
                @endforeach
              }
              
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

@endsection

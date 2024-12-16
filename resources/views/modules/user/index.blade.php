@extends('form')



@section('title', 'List')
@section('name', 'User')
@section('app-content')


<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <a href="" class="btn btn-primary btn-color" data-bs-toggle="modal" data-bs-target="#createUserModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"></path>
                </svg> Create User
            </a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Level</th>
                        <th>Created_by</th>
                        <th>Update_by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            @if ($user->type == 1)
                            <span class="right badge badge-primary">Admin</span>
                            @else
                            <span class="right badge badge-info">Study</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->status == 1)
                            <span class="right badge badge-success">Show</span>
                            @else
                            <span class="right badge badge-danger">Hidden</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->level == 1)
                            <span class="right badge badge-primary">Beginner</span>
                            @elseif ($user->level == 2)
                            <span class="right badge badge-info">Intermediate</span>
                            @else
                            <span class="right badge badge-success">Advanced</span>
                            @endif
                        </td>
                        </td>

                        <td>{{ $user->created_by }}</td>
                        <td>{{ $user->updated_by }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $user->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            </button>
                            <a href="{{ route('admin.user.destroy', $user->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create User Modal -->
@include('modules.user.create')

<!-- Edit User Modal -->
@foreach($users as $user)
@include('modules.user.edit', ['user' => $user])
@endforeach


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>



<!-- <script>
    $('.modal ').insertAfter($('body'));
</script>

<script>
    $('.modal').on('show.bs.modal', function() {
        $(this).appendTo('body');
    });
</script> -->


<script>
    $('#createUserForm').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const url = form.attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                clearValidationErrors('createUserForm');
                $('#createUserModal').modal('hide');
                alert('User created successfully!');
                location.reload();
            },
            error: function(xhr) {
                displayValidationErrors(xhr, 'createUserForm');
            }
        });
    })
    $('form[id^="editUserForm-"]').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const url = form.attr('action');
        const formId = form.attr('id');
        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                clearValidationErrors(formId);
                $(`#editUserModal-${response.id}`).modal('hide');
                alert('User updated successfully!');
                location.reload();
            },
            error: function(xhr) {
                displayValidationErrors(xhr, formId);
            }
        });
    });

    function displayValidationErrors(xhr, formId) {
        $(`#${formId} .is-invalid`).removeClass('is-invalid');
        $(`#${formId} .is-valid`).removeClass('is-valid');
        $(`#${formId} .invalid-feedback`).text('').hide();
        $(`#${formId} .valid-feedback`).text('').hide();

        if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
            const errors = xhr.responseJSON.errors;
            $(`#${formId} [name]`).each(function() {
                const field = $(this).attr('name');
                const input = $(this);
                if (errors[field]) {
                    input.addClass('is-invalid');
                    $(`#error-${field}`).text(errors[field][0]).show();
                } else {
                    input.addClass('is-valid');
                    $(`#valid-${field}`).text('Looks good!').show();
                }
            });
        } else {
            console.error('Validation error format is invalid', xhr.responseJSON);
        }
    }
    function clearValidationErrors(formId) {
        $(`#${formId} .is-invalid`).removeClass('is-invalid');
        $(`#${formId} .invalid-feedback`).text('').hide();
    }
</script>



@endsection
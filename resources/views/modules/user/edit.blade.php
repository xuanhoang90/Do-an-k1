<div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel-{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="editUserModalLabel-{{ $user->id }}">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm-{{ $user->id }}"
                action="{{ route('admin.user.update', $user->id) }}"
                method="POST">
                @csrf
                <div class="modal-body">
                    <!-- User Name -->
                    <div class="mb-3">
                        <label for="name-{{ $user->id }}" class="form-label">User Name</label>
                        <input type="text"
                            class="form-control"
                            id="name-{{ $user->id }}"
                            name="name"
                            value="{{ $user->name }}"
                            placeholder="Enter User Name">
                        <div class="invalid-feedback" id="error-name-{{ $user->id }}"></div>
                        <div class="valid-feedback" id="valid-name-{{ $user->id }}"></div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email-{{ $user->id }}" class="form-label">Email</label>
                        <input type="email"
                            class="form-control"
                            id="email-{{ $user->id }}"
                            name="email"
                            value="{{ $user->email }}"
                            placeholder="Enter Email">
                        <div class="invalid-feedback" id="error-name-{{ $user->id }}"></div>
                        <div class="valid-feedback" id="valid-name-{{ $user->id }}"></div>
                    </div>

                    <!-- Password -->
                     <div class="mb-3">
                        <label for="password-{{ $user->id }}" class="form-label">Password</label>
                        <input type="password"
                            class="form-control"
                            id="password-{{ $user->id }}"
                            name="password"
                            placeholder="Enter Password">
                        <div class="invalid-feedback" id="error-name-{{ $user->id }}"></div>
                        <div class="valid-feedback" id="valid-name-{{ $user->id }}"></div>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="type-{{ $user->id }}" class="form-label">Type</label>
                        <select class="form-select" id="type-{{ $user->id }}" name="type">
                            <option value="1" {{ $user->type == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $user->type == 2 ? 'selected' : '' }}>Study</option>
                        </select>
                        <div class="invalid-feedback" id="error-name-{{ $user->id }}"></div>
                        <div class="valid-feedback" id="valid-name-{{ $user->id }}"></div>
                    </div>

                    <div class="mb-3">
                        <label for="status-{{ $user->id }}" class="form-label">Status</label>
                        <select class="form-select" id="status-{{ $user->id }}" name="status">
                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Show</option>
                            <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Hide</option>
                        </select>
                        <div class="invalid-feedback" id="error-name-{{ $user->id }}"></div>
                        <div class="valid-feedback" id="valid-name-{{ $user->id }}"></div>
                    </div>

                    <!-- Level -->
                    <div class="mb-3">
                        <label for="level-{{ $user->id }}" class="form-label">Level</label>
                        <select class="form-select" id="level-{{ $user->id }}" name="level">
                            <option value="1" {{ $user->level == 1 ? 'selected' : '' }}>Beginner</option>
                            <option value="2" {{ $user->level == 2 ? 'selected' : '' }}>Intermediate</option>
                            <option value="3">{{ $user->level == 3 ? 'selected' : '' }}>Advanced</option>
                        </select>
                        <div class="invalid-feedback" id="error-name-{{ $user->id }}"></div>
                        <div class="valid-feedback" id="valid-name-{{ $user->id }}"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
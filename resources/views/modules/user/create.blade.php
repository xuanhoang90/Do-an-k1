<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createUserForm" action="{{ route('admin.user.store') }}" method="POST" >
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Enter user name">
                                <div class="invalid-feedback" id="error-name"></div>
                                <div class="valid-feedback" id="valid-name"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter User Email">
                                <div class="invalid-feedback" id="error-name"></div>
                                <div class="valid-feedback" id="valid-name"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1">Show</option>
                                    <option value="2">Hide</option>
                                </select>
                                <div class="invalid-feedback" id="error-name"></div>
                                <div class="valid-feedback" id="valid-name"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1">Show</option>
                                    <option value="2">Hide</option>
                                </select>
                                <div class="invalid-feedback" id="error-name"></div>
                                <div class="valid-feedback" id="valid-name"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1">Show</option>
                                    <option value="2">Hide</option>
                                </select>
                                <div class="invalid-feedback" id="error-name"></div>
                                <div class="valid-feedback" id="valid-name"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control"
                                id="description"
                                name="description"
                                rows="3"
                                placeholder="Enter description"></textarea>
                            <div class="invalid-feedback" id="error-name"></div>
                            <div class="valid-feedback" id="valid-name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" onchange="previewImage(event, 'thumbnailPreview')">
                            <div class="mt-3">
                                <img id="thumbnailPreview" src="#" alt="Thumbnail Preview" class="img-thumbnail" style="display: none; width: 70px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
            </form>
        </div>
    </div>
</div>
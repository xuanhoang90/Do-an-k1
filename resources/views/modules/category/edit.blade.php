<div class="modal fade" id="editCategoryModal-{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel-{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="editCategoryModalLabel-{{ $category->id }}">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editCategoryForm-{{ $category->id }}"
                action="{{ route('admin.category.update', $category->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Category Name -->
                    <div class="mb-3">
                        <label for="name-{{ $category->id }}" class="form-label">Category Name</label>
                        <input type="text"
                            class="form-control"
                            id="name-{{ $category->id }}"
                            name="name"
                            value="{{ $category->name }}"
                            placeholder="Enter category name">
                        <div class="invalid-feedback" id="error-name-{{ $category->id }}"></div>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status-{{ $category->id }}" class="form-label">Status</label>
                        <select class="form-select" id="status-{{ $category->id }}" name="status">
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Show</option>
                            <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>Hide</option>
                        </select>
                        <div class="invalid-feedback" id="error-status-{{ $category->id }}"></div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description-{{ $category->id }}" class="form-label">Description</label>
                        <textarea class="form-control"
                            id="description-{{ $category->id }}"
                            name="description"
                            rows="3">{{ $category->description }}</textarea>
                        <div class="invalid-feedback" id="error-description-{{ $category->id }}"></div>
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
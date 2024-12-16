<div class="modal fade" id="editSocial_PostModal-{{ $social_post->id }}" tabindex="-1" aria-labelledby="editSocial_PostModalLabel-{{ $social_post->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="editSocial_PostModalLabel-{{ $social_post->id }}">Edit Social_Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editSocial_PostForm-{{ $social_post->id }}"
                action="{{ route('admin.social_post.update', $social_post->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Social_Post Name -->
                    <div class="mb-3">
                        <label for="name-{{ $social_post->id }}" class="form-label">Social_Post Name</label>
                        <input type="text"
                            class="form-control"
                            id="name-{{ $social_post->id }}"
                            name="name"
                            value="{{ $social_post->name }}"
                            placeholder="Enter social_post name">
                        <div class="invalid-feedback" id="error-name-{{ $social_post->id }}"></div>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status-{{ $social_post->id }}" class="form-label">Status</label>
                        <select class="form-select" id="status-{{ $social_post->id }}" name="status">
                            <option value="1" {{ $social_post->status == 1 ? 'selected' : '' }}>Show</option>
                            <option value="2" {{ $social_post->status == 2 ? 'selected' : '' }}>Hide</option>
                        </select>
                        <div class="invalid-feedback" id="error-status-{{ $social_post->id }}"></div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description-{{ $social_post->id }}" class="form-label">Description</label>
                        <textarea class="form-control"
                            id="description-{{ $social_post->id }}"
                            name="description"
                            rows="3">{{ $social_post->description }}</textarea>
                        <div class="invalid-feedback" id="error-description-{{ $social_post->id }}"></div>
                        <div class="valid-feedback" id="valid-name-{{ $social_post->id }}"></div>
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
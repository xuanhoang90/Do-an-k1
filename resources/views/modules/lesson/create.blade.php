<div class="modal fade" id="createLessonModal" tabindex="-1" aria-labelledby="createLessonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl  style="margin-top: 50px;">
        <div class="modal-content">
            <form id="createLessonForm" action="{{ route('admin.lesson.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="createLessonModalLabel">Create Lesson</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Lesson Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter lesson name">
                            <div class="invalid-feedback" id="error-name"></div>
                        </div>

                        <div class="col-md-2">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1">Show</option>
                                <option value="0">Hidden</option>
                            </select>
                            <div class="invalid-feedback" id="error-status"></div>
                        </div>

                      

                        <!-- Thumbnail Preview -->
                        <div class="col-md-4 text-center">
                            <div class="mt-3">
                                <img id="thumbnailPreview" src="#" alt="Thumbnail Preview" class="img-thumbnail" style="display: none; width:100px;">
                            </div>

                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <!-- Short Description -->
                        <div class="col-md-6">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea class="form-control" id="short_description" name="short_description" rows="3" placeholder="Enter short description"></textarea>
                            <div class="invalid-feedback" id="error-short_description"></div>
                        </div>

                        <!-- Content -->
                        <div class="col-md-6">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter content"></textarea>
                            <div class="invalid-feedback" id="error-content"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" onchange="previewImage(event, 'thumbnailPreview')">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <!-- Title -->
                                <h3 class="text-center mb-4">Upload Sample Images</h3>

                                <!-- Image Upload Container -->
                                <div id="sampleImagesUploadContainer" class="mb-4">
                                    <div class="upload-box border rounded p-4" id="addSampleImagesBox" style="cursor: pointer;">
                                        <p class="mb-0"><strong>Click to Add Images</strong></p>
                                        <p class="text-muted">You can select multiple images at once</p>
                                    </div>
                                    <input type="file" name="sample_images[]" id="sample_images" multiple hidden>
                                </div>

                                <!-- Image Preview -->
                                <div class="d-flex flex-wrap gap-2 justify-content-center" id="sample_imagePreview">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm">Create</button>
                    </div>
            </form>
        </div>
    </div>
</div>
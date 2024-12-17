@foreach($lessons as $lesson)
<div class="modal fade" id="editLessonModal-{{ $lesson->id }}" tabindex="-1" aria-labelledby="editLessonModalLabel-{{ $lesson->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editLessonForm-{{ $lesson->id }}" action="{{ route('admin.lesson.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editLessonModalLabel-{{ $lesson->id }}">Edit Lesson</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 
                    <div class="mb-3">
                        <label for="name-{{ $lesson->id }}" class="form-label">Lesson Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name"
                            value="{{ old('name', $lesson->name) }}"
                            placeholder="Enter lesson name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <!-- <div class="mb-3">
                    <label for="level_id" class="form-label">Level</label>
                    <select class="form-select @error('level_id') is-invalid @enderror" id="level_id" name="level_id">
                        @foreach($levels as $level)
                        <option value="{{ $level->id }}" {{ old('level_id', $lesson->level_id) == $level->id ? 'selected' : '' }}>
                            {{ $level->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('level_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> -->

                
                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control @error('short_description') is-invalid @enderror"
                        id="short_description" name="short_description" rows="3">{{ old('short_description', $lesson->short_description) }}</textarea>
                    @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror"
                        id="content" name="content" rows="5">{{ old('content', $lesson->content) }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <div class="mb-2">
                        @if($lesson->thumbnail)
                        <img src="{{ asset('storage/' . $lesson->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" width="100px">
                        @endif
                    </div>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
                    @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

              
                <div class="mb-3">
                    <label for="sample_image" class="form-label">Sample Image</label>
                    <div class="mb-2">
                        @if($lesson->sample_image)
                        <img src="{{ asset('uploads/' . $lesson->sample_image) }}" alt="Sample Image" class="img-thumbnail" width="100px">
                        @endif
                    </div>
                    <input type="file" class="form-control @error('sample_image') is-invalid @enderror" id="sample_image" name="sample_image">
                    @error('sample_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                        <option value="1" {{ old('status', $lesson->status) == 1 ? 'selected' : '' }}>Show</option>
                        <option value="0" {{ old('status', $lesson->status) == 0 ? 'selected' : '' }}>Hidden</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Lesson</button>
                <a href="{{ route('admin.lesson.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endforeach
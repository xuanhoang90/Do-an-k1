@extends('form')



@section('title', 'List')
@section('name', 'Lesson')
@section('app-content')




<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Edit Lesson: {{ $lesson->name }}</h4>
        </div>
        <div class="card-body">
            <form id="editLessonForm-{{ $lesson->id }}" action="{{ route('admin.lesson.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
               

                <!-- Lesson Name -->
                <div class="mb-3">
                    <label for="name-{{ $lesson->id }}" class="form-label">Lesson Name</label>
                    <input 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name-{{ $lesson->id }}" 
                        name="name" 
                        value="{{ old('name', $lesson->name) }}" 
                        required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status-{{ $lesson->id }}" class="form-label">Status</label>
                    <select 
                        class="form-select @error('status') is-invalid @enderror" 
                        id="status-{{ $lesson->id }}" 
                        name="status" 
                        required>
                        <option value="1" {{ old('status', $lesson->status) == 1 ? 'selected' : '' }}>Show</option>
                        <option value="0" {{ old('status', $lesson->status) == 0 ? 'selected' : '' }}>Hidden</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Short Description -->
                <div class="mb-3">
                    <label for="short_description-{{ $lesson->id }}" class="form-label">Short Description</label>
                    <textarea 
                        class="form-control @error('short_description') is-invalid @enderror" 
                        id="short_description-{{ $lesson->id }}" 
                        name="short_description" 
                        rows="3">{{ old('short_description', $lesson->short_description) }}</textarea>
                    @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Content -->
                <div class="mb-3">
                    <label for="content-{{ $lesson->id }}" class="form-label">Content</label>
                    <textarea 
                        class="form-control @error('content') is-invalid @enderror" 
                        id="content-{{ $lesson->id }}" 
                        name="content" 
                        rows="5">{{ old('content', $lesson->content) }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Thumbnail -->
                <div class="mb-3">
                    <label for="thumbnail-{{ $lesson->id }}" class="form-label">Thumbnail</label>
                    <div class="mb-2">
                        @if($lesson->thumbnail)
                        <img src="{{ asset('uploads/' . $lesson->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" width="100px">
                        @endif
                    </div>
                    <input 
                        type="file" 
                        class="form-control @error('thumbnail') is-invalid @enderror" 
                        id="thumbnail-{{ $lesson->id }}" 
                        name="thumbnail">
                    @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sample Images -->
                <div class="mb-3">
                    <label for="sample_images-{{ $lesson->id }}" class="form-label">Upload Sample Images</label>
                    <input 
                        type="file" 
                        class="form-control @error('sample_images.*') is-invalid @enderror" 
                        id="sample_images-{{ $lesson->id }}" 
                        name="sample_images[]" 
                        accept="image/*" 
                        multiple>
                    @error('sample_images.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="text-end">
                    <a href="{{ route('admin.lesson.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Lesson</button>
                </div>
            </form>
        </div>
    </div>
</div>



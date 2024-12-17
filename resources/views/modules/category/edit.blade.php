@extends('form')


@section('title', 'List')
@section('name', 'Category')
@section('app-content')


<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4>Edit Category: {{ $category->name }}</h4>
        </div>
        <div class="card-body">
            <form class="row g-3 needs-validation" id="editCategoryForm-{{ $category->id }}" action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf


                <div class="col-md-6">
                    <label for="name-{{ $category->id }}" class="form-label">Category Name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name-{{ $category->id }}"
                        name="name"
                        value="{{ old('name', $category->name) }}"
                        required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Status -->
                <div class="col-md-6">
                    <label for="status-{{ $category->id }}" class="form-label">Status</label>
                    <select
                        class="form-select @error('status') is-invalid @enderror"
                        id="status-{{ $category->id }}"
                        name="status"
                        required>
                        <option selected disabled value="">Choose...</option>
                        <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Show</option>
                        <option value="2" {{ old('status', $category->status) == 2 ? 'selected' : '' }}>Hide</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-md-12">
                    <label for="description-{{ $category->id }}" class="form-label">Description</label>
                    <textarea
                        class="form-control @error('description') is-invalid @enderror"
                        id="description-{{ $category->id }}"
                        name="description"
                        rows="3">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label class="form-label">Current Thumbnail</label>
                    <div>
                        <img src="{{ asset('uploads/category/' . $category->thumbnail) }}" alt="{{ $category->name }}" class="img-thumbnail" style="width: 100px;">
                    </div>
                </div>


                <!-- Upload New Thumbnail -->
                <div class="col-md-6">
                    <label for="thumbnail-{{ $category->id }}" class="form-label">Upload New Thumbnail</label>
                    <input
                        type="file"
                        class="form-control @error('thumbnail') is-invalid @enderror"
                        id="thumbnail-{{ $category->id }}"
                        name="thumbnail"
                        accept="image/*">
                    @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="national-{{ $category->id }}" class="form-label">National</label>
                    <select
                        class="form-select @error('national_id') is-invalid @enderror"
                        id="national-{{ $category->id }}"
                        name="national_id"
                        required>
                        <option selected disabled value="">Choose...</option>
                        @foreach ($nationals as $national)
                        <option value="{{ $national->id }}"
                            {{ old('national_id', $category->national_id) == $national->id ? 'selected' : '' }}>
                            {{ $national->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('national_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Submit Button -->
                <div class="text-end">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function previewImage(event, previewId) {
        const input = event.target;
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    (function() {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>


@endsection
@extends('form')


@section('title', 'Create')
@section('name', 'Category')
@section('app-content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Create Category</h4>
        </div>
        <div class="card-body">
            <form id="createCategoryForm" action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Category Name -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                placeholder="Enter category name"
                                value="{{ old('name') }}"
                                required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>

                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select
                                class="form-select @error('status') is-invalid @enderror"
                                id="status"
                                name="status"
                                required>
                                <option value="" disabled selected>Choose...</option>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Show</option>
                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Hide</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description"
                        rows="3"
                        placeholder="Enter description"
                        required>{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Thumbnail -->
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <input
                        type="file"
                        class="form-control @error('thumbnail') is-invalid @enderror"
                        id="thumbnail"
                        name="thumbnail"
                        accept="image/*"
                        onchange="previewImage(event, 'thumbnailPreview')">
                    @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="mt-3">
                        <img id="thumbnailPreview" src="#" alt="Thumbnail Preview" class="img-thumbnail" style="display: none; width: 100px;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="national_id" class="form-label">National</label>
                        <select
                            class="form-select @error('national_id') is-invalid @enderror"
                            id="national_id"
                            name="national_id"
                            required>
                            <option value="" disabled selected>Choose...</option>
                            @foreach ($nationals as $national )
                            <option value="{{ $national->id }}" {{ old('national') == $national->id ? 'selected' : '' }}>
                                {{ $national->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('national_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Submit and Reset Buttons -->
                <div class="text-end">
                    <button type="reset" class="btn btn-secondary me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Create Category</button>
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
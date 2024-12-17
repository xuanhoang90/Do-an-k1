@extends('form')



@section('title', 'List')
@section('name', 'Lesson')
@section('app-content')


<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Create Lesson</h4>
        </div>
        <div class="card-body">
            <form id="createLessonForm" action="{{ route('admin.lesson.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Lesson Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Lesson Name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        placeholder="Enter lesson name"
                        value="{{ old('name') }}"
                        required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select
                        class="form-select @error('status') is-invalid @enderror"
                        id="status"
                        name="status"
                        required>
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Show</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Hidden</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Level -->
                <!-- <div class="mb-3">
                    <label for="level_id" class="form-label">Level</label>
                    <select
                        class="form-select @error('level_id') is-invalid @enderror"
                        id="level_id"
                        name="level_id"
                        required>
                        <option value="" disabled selected>Choose...</option>
                        @foreach ($levels as $level )
                        <option value="{{ $level->id }}" {{ old('level') == $level->id ? 'selected' : '' }}>
                            {{ $level->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('level_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> -->
                <!-- Category -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category Name</label>
                    <select
                        class="form-select @error('category_id') is-invalid @enderror"
                        id="category_id"
                        name="category_id"
                        required>
                        <option value="" disabled selected>Choose...</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Short Description -->
                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea
                        class="form-control @error('short_description') is-invalid @enderror"
                        id="short_description"
                        name="short_description"
                        rows="3"
                        placeholder="Enter short description">{{ old('short_description') }}</textarea>
                    @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Content -->
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea
                        class="form-control @error('content') is-invalid @enderror"
                        id="content"
                        name="content"
                        rows="5"
                        placeholder="Enter content">{{ old('content') }}</textarea>
                    @error('content')
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
                        accept="image/*">
                    @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sample Images -->
                <div class="mb-3">
                    <label for="sample_images" class="form-label">Upload Sample Images</label>
                    <input
                        type="file"
                        class="form-control @error('sample_images.*') is-invalid @enderror"
                        id="sample_images"
                        name="sample_images[]"
                        accept="image/*"
                        multiple>
                    @error('sample_images.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="text-end">
                    <button type="reset" class="btn btn-secondary me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Create Lesson</button>
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
    $(document).ready(function() {
        $('#addSampleImagesBox').on('click', function() {
            $('#sample_images').click();
        });
        $('#sample_images').on('change', function() {
            const files = this.files;
            for (let i = 0; i < files.length; i++) {
                if (files[i].type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imgElement = `
                        <div class="image-container">
                            <img src="${e.target.result}" alt="Image" class="rounded">
                            <button class="delete-btn">&times;</button>
                        </div>
                    `;
                        $('#sample_imagePreview').append(imgElement);
                    };
                    reader.readAsDataURL(files[i]);
                }
            }
        });
        $(document).on('click', '.delete-btn', function() {
            $(this).closest('.image-container').remove();
        });
    });
</script>






@endsection
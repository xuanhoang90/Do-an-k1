@extends('admin')



@section('title', 'List')
@section('name', 'Lesson')
@section('app-content')



<div class="card-header">
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createLessonModal">
                <i class="fas fa-plus"></i> Create Lesson
            </a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Short Description</th>
                        <th>Status</th>
                        <th>Thumbnail</th>
                        <th>Sample Image</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody text-center>
                    @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lesson->name }}</td>
                        <td>{{ $lesson->content }}</td>
                        <td>{{ $lesson->short_description }}</td>
                        <td>
                            <span class="badge {{ $lesson->status ? 'badge-success' : 'badge-danger' }}">
                                {{ $lesson->status ? 'Show' : 'Hidden' }}
                            </span>
                        </td>
                        <td><img src="{{ asset('uploads/lessons/thumbnail/' . $lesson->thumbnail) }}" alt="{{ $lesson->name }}" width="70px"></td>
                        <td>

                            <img src="{{ asset('uploads/lessons/sample_image/' . $lesson->sample_image) }}" alt="{{ $lesson->name }}" width="70px">

                        </td>
                        <td>
                            <div class="image-stack mx-auto" id="imageStack-{{ $lesson->id }}" data-bs-toggle="modal" data-bs-target="#imageModal-{{ $lesson->id }}">
                                @php
                                $sampleImages = json_decode($lesson->sample_image, true) ?? [];
                                @endphp
                                @foreach($sampleImages as $index => $image)
                                <img src="{{ asset('uploads/lessons/sample_image/' . $image) }}" alt="Sample Image {{ $index + 1 }}">
                                @endforeach
                            </div>

                            <!-- Modal for Image Gallery -->
                            <div class="modal fade" id="imageModal-{{ $lesson->id }}" tabindex="-1" aria-labelledby="imageModalLabel-{{ $lesson->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel-{{ $lesson->id }}">Image Gallery for {{ $lesson->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex flex-wrap justify-content-center">
                                            @foreach($sampleImages as $image)
                                            <img src="{{ asset('uploads/lessons/sample_image/' . $image) }}" alt="Sample Image" class="modal-img">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <!-- <td>{{ $lesson->level->name ?? 'N/A' }}</td> -->
                        <td>
                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editLessonModal-{{ $lesson->id }}">Edit</a>
                            <a href="{{ route('admin.lesson.destroy', $lesson->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('modules.lesson.create')
@include('modules.lesson.edit', ['lessons' => $lessons])

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
    function checkDelete(event, message) {

        if (!confirm(message)) {
            event.preventDefault();
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

<script>
    $('.modal ').insertAfter($('body'));
</script>

<script>
    $$('.modal').on('show.bs.modal', function() {
        $(this).appendTo('body');
    });
</script>


<script>
    function displayValidationErrors(xhr, formId) {
        $(`#${formId} .is-invalid`).removeClass('is-invalid');
        $(`#${formId} .is-valid`).removeClass('is-valid');
        $(`#${formId} .invalid-feedback`).text('').hide();
        $(`#${formId} .valid-feedback`).text('').hide();

        if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
            const errors = xhr.responseJSON.errors;
            $(`#${formId} [name]`).each(function() {
                const field = $(this).attr('name');
                const input = $(this);
                if (errors[field]) {
                    input.addClass('is-invalid');
                    $(`#error-${field}`).text(errors[field][0]).show();
                } else {
                    input.addClass('is-valid');
                    $(`#valid-${field}`).text('Looks good!').show();
                }
            });
        } else {
            console.error('Validation error format is invalid', xhr.responseJSON);
        }
    }

    function clearValidationErrors(formId) {
        $(`#${formId} .is-invalid`).removeClass('is-invalid');
        $(`#${formId} .invalid-feedback`).text('').hide();
    }
    $('#createLessonForm').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const url = form.attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                clearValidationErrors('createLessonForm');
                $('#createLessonModal').modal('hide');
                alert('Lesson created successfully!');
                location.reload();
            },
            error: function(xhr) {
                displayValidationErrors(xhr, 'createLessonForm');
            }
        });
    })
    $('form[id^="editLessonForm-"]').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const url = form.attr('action');
        const formId = form.attr('id');
        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                clearValidationErrors(formId);
                $(`#editLessonModal-${response.id}`).modal('hide');
                alert('Lesson updated successfully!');
                location.reload();
            },
            error: function(xhr) {
                displayValidationErrors(xhr, formId);
            }
        });
    });
</script>




@endsection
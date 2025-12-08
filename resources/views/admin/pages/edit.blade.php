@extends('layouts.adminlte')

@section('title', 'Edit Page')

@section('page-title', 'Edit Page')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Pages</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Page: {{ $page->title }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Pages
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Page Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title', $page->title) }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Page Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                       id="slug" name="slug" value="{{ old('slug', $page->slug) }}">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="form-text text-muted">Leave empty to auto-generate from title</small>
                            </div>

                            <div class="form-group">
                                <label for="type">Page Type <span class="text-danger">*</span></label>
                                <select class="form-control @error('type') is-invalid @enderror"
                                        id="type" name="type" required>
                                    <option value="">Select Page Type</option>
                                    <option value="single-column" {{ old('type', $page->type) == 'single-column' ? 'selected' : '' }}>
                                        Single Column
                                    </option>
                                    <option value="2-columns" {{ old('type', $page->type) == '2-columns' ? 'selected' : '' }}>
                                        2 Columns
                                    </option>
                                    <option value="3-columns" {{ old('type', $page->type) == '3-columns' ? 'selected' : '' }}>
                                        3 Columns
                                    </option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Content Fields - Single Column -->
                            <div id="single-column-content" class="content-section">
                                <div class="form-group">
                                    <label for="content1">Page Content <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('content1') is-invalid @enderror summernote-editor"
                                              id="content1" name="content1" rows="10">{{ old('content1', $page->content1) }}</textarea>
                                    @error('content1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Content Fields - 2 Columns -->
                            <div id="two-columns-content" class="content-section" style="display: none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="content1_col2">Left Column Content <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('content1') is-invalid @enderror summernote-editor"
                                                      id="content1_col2" name="content1" rows="8">{{ old('content1', $page->content1) }}</textarea>
                                            @error('content1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="content2">Right Column Content <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('content2') is-invalid @enderror summernote-editor"
                                                      id="content2" name="content2" rows="8">{{ old('content2', $page->content2) }}</textarea>
                                            @error('content2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Fields - 3 Columns -->
                            <div id="three-columns-content" class="content-section" style="display: none;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="content1_col3">Left Column Content <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('content1') is-invalid @enderror summernote-editor"
                                                      id="content1_col3" name="content1" rows="6">{{ old('content1', $page->content1) }}</textarea>
                                            @error('content1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="content2_col3">Middle Column Content <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('content2') is-invalid @enderror summernote-editor"
                                                      id="content2_col3" name="content2" rows="6">{{ old('content2', $page->content2) }}</textarea>
                                            @error('content2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="content3">Right Column Content <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('content3') is-invalid @enderror summernote-editor"
                                                      id="content3" name="content3" rows="6">{{ old('content3', $page->content3) }}</textarea>
                                            @error('content3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Page Preview</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Selected Type:</label>
                                        <div id="type-preview">
                                            <span class="badge badge-{{ $page->type == 'single-column' ? 'primary' : ($page->type == '2-columns' ? 'info' : 'success') }}">
                                                {{ ucwords(str_replace('-', ' ', $page->type)) }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Slug Preview:</label>
                                        <div id="slug-preview">
                                            <code>{{ $page->slug }}</code>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Created:</label>
                                        <div>{{ $page->created_at->format('M d, Y H:i') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Last Updated:</label>
                                        <div>{{ $page->updated_at->format('M d, Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Header Image Upload Section -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Header Image</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="header_image">Header Image</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control @error('header_image') is-invalid @enderror"
                                                   id="header_image" name="header_image" accept="image/*">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-success" id="upload-header-image">
                                                    <i class="fas fa-upload"></i> Upload
                                                </button>
                                            </div>
                                        </div>
                                        @error('header_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small class="form-text text-muted">Upload a header image for this page (JPG, PNG, GIF, max 2MB)</small>
                                    </div>

                                    <!-- Header Image Preview -->
                                    <div id="header-image-preview" style="{{ $page->hasHeaderImage() ? 'display: block;' : 'display: none;' }}">
                                        <div class="form-group">
                                            <label>Current Header Image:</label>
                                            <div>
                                                <img id="header-image-preview-img"
                                                     src="{{ $page->getHeaderImageUrl() }}"
                                                     alt="Header Image"
                                                     style="max-width: 100%; height: auto; border: 1px solid #ddd; padding: 5px;">
                                                <button type="button" class="btn btn-sm btn-danger mt-2" id="remove-header-image">
                                                    <i class="fas fa-trash"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Update Page
                    </button>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary ml-2">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

@section('custom-scripts')
<!-- Summernote JS -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
$(document).ready(function() {
    // Initialize Summernote instances for all content fields
    $('.summernote-editor').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'help', 'codeview']]
        ],
        allowedTags: [
            ...['p', 'br', 'strong', 'em', 'u', 'a', 'ul', 'ol', 'li', 'table', 'thead', 'tbody', 'tr', 'th', 'td', 'img', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            ...['div', 'span', 'blockquote', 'pre', 'code'],
            ...['hr', 'sub', 'sup'],
            ...['form', 'input', 'label', 'textarea', 'select', 'option'],
            ...['iframe', 'video', 'audio', 'source']
        ],
        disableDragAndDrop: true,
        callbacks: {
            onImageUpload: function(files) {
                console.log('Content image upload initiated via Media Library in edit page:', files.length, 'files');

                // Upload each file
                for (var i = 0; i < files.length; i++) {
                    uploadContentImage(files[i], this);
                }
            }
        }
    });

    // Function to upload content image to server
    function uploadContentImage(file, editor) {
        var data = new FormData();
        data.append('image', file);
        data.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: '{{ route("admin.pages.upload-content-image") }}',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            timeout: 30000, // 30 second timeout
            success: function(response) {
                if (response && response.success && response.url) {
                    //console.log('Upload successful!');
                    //console.log('Image URL:', response.url);
                    //console.log('Image filename:', response.filename);

                    // Small delay to ensure editor is ready, then insert image
                    setTimeout(function() {
                        $(editor).summernote('insertImage', response.url, function($image) {
                            $image.attr('alt', response.filename);
                        });
                        console.log('Image inserted into editor.');
                    }, 20);

                } else {
                    console.error('Upload failed - invalid response:', response);
                    var errorMsg = response && response.message ? response.message : 'Invalid server response';
                    alert('Upload failed: ' + errorMsg);
                }
            },
            error: function(xhr, status, error) {
                console.error('Upload error - Status:', status, 'Error:', error);
                console.error('Response text:', xhr.responseText);
                console.error('Response status:', xhr.status);
            }
        });
    }

    // Function to show/hide content sections based on type
    function toggleContentSections(type) {
        $('.content-section').hide();
        $('.content-section').find('textarea').prop('disabled', true);

        switch(type) {
            case 'single-column':
                $('#single-column-content').show();
                $('#single-column-content').find('textarea').prop('disabled', false);
                break;
            case '2-columns':
                $('#two-columns-content').show();
                $('#two-columns-content').find('textarea').prop('disabled', false);
                break;
            case '3-columns':
                $('#three-columns-content').show();
                $('#three-columns-content').find('textarea').prop('disabled', false);
                break;
        }
    }

    // Auto-generate slug from title
    $('#title').on('input', function() {
        var title = $(this).val();
        if (title) {
            var slug = title.toLowerCase()
                           .replace(/[^a-z0-9 -]/g, '')
                           .replace(/\s+/g, '-')
                           .replace(/-+/g, '-')
                           .trim('-');
            $('#slug').val(slug);
            $('#slug-preview code').text(slug || 'page-slug');
        }
    });

    // Update slug preview when slug field changes
    $('#slug').on('input', function() {
        var slug = $(this).val();
        $('#slug-preview code').text(slug || 'page-slug');
    });

    // Update type preview and content sections
    $('#type').on('change', function() {
        var type = $(this).val();
        var typeText = 'None';
        var badgeClass = 'badge-secondary';

        switch(type) {
            case 'single-column':
                typeText = 'Single Column';
                badgeClass = 'badge-primary';
                break;
            case '2-columns':
                typeText = '2 Columns';
                badgeClass = 'badge-info';
                break;
            case '3-columns':
                typeText = '3 Columns';
                badgeClass = 'badge-success';
                break;
        }

        $('#type-preview').html('<span class="badge ' + badgeClass + '">' + typeText + '</span>');
        toggleContentSections(type);
    });

    // Trigger initial preview updates and show current content sections
    $('#title').trigger('input');
    $('#type').trigger('change');

    // Show the appropriate content section based on current page type
    var currentType = '{{ $page->type }}';
    toggleContentSections(currentType);

    // Header Image Upload Functionality
    $('#upload-header-image').on('click', function() {
        var fileInput = $('#header_image')[0];
        var file = fileInput.files[0];

        if (!file) {
            alert('Please select an image file first');
            return;
        }

        uploadHeaderImage(file);
    });

    $('#remove-header-image').on('click', function() {
        if (confirm('Are you sure you want to remove the header image?')) {
            $('#header-image-preview').hide();
            $('#header_image').val('');

            // Add hidden field to indicate header image should be removed
            if (!$('input[name="remove_header_image"]').length) {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'remove_header_image',
                    value: '1'
                }).appendTo('form');
            }
        }
    });

    function uploadHeaderImage(file) {
        console.log('Uploading header image:', file.name, 'size:', file.size);

        var data = new FormData();
        data.append('header_image', file);
        data.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $('#upload-header-image').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Uploading...');

        $.ajax({
            url: '{{ route("admin.pages.upload-header-image") }}',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            timeout: 30000,
            success: function(response) {
                console.log('Header image upload response:', response);

                if (response.success && response.url) {
                    // For existing pages, we need to handle media attachment differently
                    // This is a temporary solution until we implement proper Media Library integration
                    $('#header-image-preview-img').attr('src', response.url);
                    $('#header-image-preview').show();
                    $('#upload-header-image').prop('disabled', false).html('<i class="fas fa-upload"></i> Upload');

                    // Store the uploaded image filename for processing
                    $('form').data('temp-header-image', response.filename);

                    alert('Header image uploaded! It will be attached when you save the page.');
                } else {
                    alert('Upload failed: ' + (response.message || 'Unknown error'));
                    $('#upload-header-image').prop('disabled', false).html('<i class="fas fa-upload"></i> Upload');
                }
            },
            error: function(xhr, status, error) {
                console.error('Header image upload error:', xhr.responseText);
                $('#upload-header-image').prop('disabled', false).html('<i class="fas fa-upload"></i> Upload');

                var errorMessage = 'Upload failed';
                if (xhr.status === 413) {
                    errorMessage = 'File too large. Please choose a smaller image.';
                } else if (xhr.status === 422) {
                    errorMessage = 'Invalid file type. Please choose a valid image file.';
                } else {
                    try {
                        var errorResponse = JSON.parse(xhr.responseText);
                        errorMessage = errorResponse.message || error;
                    } catch (e) {
                        errorMessage = error || 'Unknown error occurred';
                    }
                }

                alert('Failed to upload header image: ' + errorMessage);
            }
        });
    }

    // Fix Summernote form submission - ensure content is properly extracted
    $('form').on('submit', function(e) {
        $('.summernote-editor').each(function() {
            // Get Summernote content and set it to the textarea value
            var content = $(this).summernote('code');
            $(this).val(content);
        });

        // Let the form submit normally after content is synced
        return true;
    });
});
</script>
@endsection

@push('styles')
<!-- Summernote CSS -->
<link href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

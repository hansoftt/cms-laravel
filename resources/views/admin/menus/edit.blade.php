@extends('layouts.adminlte')

@section('title', 'Edit Menu')

@section('page-title', 'Edit Menu')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Menus</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Menu: {{ $menu->name }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Menus
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Menu Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $menu->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type">Menu Type <span class="text-danger">*</span></label>
                        <select class="form-control @error('type') is-invalid @enderror"
                                id="type" name="type" required>
                            <option value="">Select Menu Type</option>
                            <option value="internal" {{ old('type', $menu->type) == 'internal' ? 'selected' : '' }}>
                                Internal (Link to Page)
                            </option>
                            <option value="external" {{ old('type', $menu->type) == 'external' ? 'selected' : '' }}>
                                External (Custom URL)
                            </option>
                            <option value="static" {{ old('type', $menu->type) == 'static' ? 'selected' : '' }}>
                                Static (No Link)
                            </option>
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Internal Link Section -->
                    <div id="internal-section" class="type-section" style="display: none;">
                        <div class="form-group">
                            <label for="page_id">Select Page <span class="text-danger">*</span></label>
                            <select class="form-control @error('page_id') is-invalid @enderror"
                                    id="page_id" name="page_id">
                                <option value="">Select a Page</option>
                                @foreach($pages as $page)
                                <option value="{{ $page->id }}" {{ old('page_id', $menu->page_id) == $page->id ? 'selected' : '' }}>
                                    {{ $page->title }} ({{ $page->slug }})
                                </option>
                                @endforeach
                            </select>
                            @error('page_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- External Link Section -->
                    <div id="external-section" class="type-section" style="display: none;">
                        <div class="form-group">
                            <label for="url">External URL <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('url') is-invalid @enderror"
                                   id="url" name="url" value="{{ old('url', $menu->url) }}" placeholder="https://example.com">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted">Enter the full URL including https://</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Parent Menu (Optional)</label>
                        <select class="form-control @error('parent_id') is-invalid @enderror"
                                id="parent_id" name="parent_id">
                            <option value="">No Parent (Top Level)</option>
                            @foreach($parentMenus as $parentMenu)
                            <option value="{{ $parentMenu->id }}" {{ old('parent_id', $menu->parent_id) == $parentMenu->id ? 'selected' : '' }}>
                                {{ $parentMenu->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="form-text text-muted">Select a parent menu to create a submenu</small>
                    </div>

                    <div class="form-group">
                        <label for="order">Display Order</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror"
                               id="order" name="order" value="{{ old('order', $menu->order) }}" min="0">
                        @error('order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="form-text text-muted">Lower numbers appear first (0 = default)</small>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1"
                                   {{ old('is_active', $menu->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Inactive menus won't be displayed in the frontend</small>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Update Menu
                    </button>
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary ml-2">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-4">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Menu Preview</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Menu Name:</label>
                    <div id="preview-name">{{ $menu->name }}</div>
                </div>

                <div class="form-group">
                    <label>Type:</label>
                    <div id="preview-type">
                        @if($menu->type === 'internal')
                            <span class="badge badge-primary">Internal Link</span>
                        @elseif($menu->type === 'external')
                            <span class="badge badge-success">External Link</span>
                        @else
                            <span class="badge badge-secondary">No Type</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label>Link:</label>
                    <div id="preview-link">
                        @if($menu->type === 'internal' && $menu->page)
                            Page: {{ $menu->page->title }}
                        @elseif($menu->type === 'external')
                            {{ $menu->url }}
                        @else
                            -
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label>Parent:</label>
                    <div id="preview-parent">
                        {{ $menu->parent ? $menu->parent->name : 'Top Level Menu' }}
                    </div>
                </div>

                <div class="form-group">
                    <label>Created:</label>
                    <div>{{ $menu->created_at->format('M d, Y H:i') }}</div>
                </div>

                <div class="form-group">
                    <label>Last Updated:</label>
                    <div>{{ $menu->updated_at->format('M d, Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script>
$(document).ready(function() {
    function toggleTypeSections() {
        var type = $('#type').val();
        $('.type-section').hide();

        if (type === 'internal') {
            $('#internal-section').show();
        } else if (type === 'external') {
            $('#external-section').show();
        } else if (type === 'static') {
            // No additional fields for static type
        }
    }

    function updatePreview() {
        var name = $('#name').val() || 'Menu Name';
        var type = $('#type').val();
        var typeText = 'No Type Selected';
        var typeClass = 'badge-secondary';

        if (type === 'internal') {
            typeText = 'Internal Link';
            typeClass = 'badge-primary';
        } else if (type === 'external') {
            typeText = 'External Link';
            typeClass = 'badge-success';
        }

        var link = '-';
        if (type === 'internal') {
            var selectedPage = $('#page_id option:selected').text();
            link = selectedPage ? 'Page: ' + selectedPage : 'No page selected';
        } else if (type === 'external') {
            var url = $('#url').val();
            link = url || 'No URL provided';
        }

        var parent = $('#parent_id option:selected').text();
        if (parent === 'No Parent (Top Level)') {
            parent = 'Top Level Menu';
        }

        $('#preview-name').text(name);
        $('#preview-type').html('<span class="badge ' + typeClass + '">' + typeText + '</span>');
        $('#preview-link').text(link);
        $('#preview-parent').text(parent);
    }

    // Show/hide sections based on type selection
    $('#type').on('change', function() {
        toggleTypeSections();
        updatePreview();
    });

    // Update preview when form fields change
    $('#name, #page_id, #url, #parent_id').on('input change', function() {
        updatePreview();
    });

    // Initialize
    toggleTypeSections();
    updatePreview();
});
</script>
@endsection

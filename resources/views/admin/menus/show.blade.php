@extends('layouts.adminlte')

@section('title', $menu->name)

@section('page-title', $menu->name)

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Menus</a></li>
<li class="breadcrumb-item active">{{ $menu->name }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $menu->name }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit Menu
                    </a>
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Menus
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Menu Name:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ $menu->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Type:</strong>
                    </div>
                    <div class="col-sm-9">
                        @if($menu->type === 'internal')
                            <span class="badge badge-primary">Internal Link</span>
                        @elseif($menu->type === 'external')
                            <span class="badge badge-success">External Link</span>
                        @else
                            <span class="badge badge-secondary">No Type</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Link:</strong>
                    </div>
                    <div class="col-sm-9">
                        @if($menu->type === 'internal' && $menu->page)
                            <a href="{{ route('pages.show', $menu->page->slug) }}" target="_blank">
                                {{ $menu->page->title }} ({{ $menu->page->slug }})
                            </a>
                        @elseif($menu->type === 'external')
                            <a href="{{ $menu->url }}" target="_blank">{{ $menu->url }}</a>
                        @else
                            <span class="text-muted">No link configured</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Parent Menu:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ $menu->parent ? $menu->parent->name : 'Top Level Menu' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Display Order:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ $menu->order ?: 'Default (0)' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-sm-9">
                        @if($menu->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Created:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ $menu->created_at->format('M d, Y H:i') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ $menu->updated_at->format('M d, Y H:i') }}
                    </div>
                </div>

                @if($menu->hasChildren())
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Submenus:</strong>
                    </div>
                    <div class="col-sm-9">
                        <div class="submenu-list">
                            @foreach($menu->children as $child)
                            <div class="submenu-item">
                                <strong>{{ $child->name }}</strong>
                                @if($child->type === 'internal' && $child->page)
                                    <span class="badge badge-primary ml-2">Internal</span>
                                    <small class="text-muted">→ {{ $child->page->title }}</small>
                                @elseif($child->type === 'external')
                                    <span class="badge badge-success ml-2">External</span>
                                    <small class="text-muted">→ {{ $child->url }}</small>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Menu Actions</h3>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Menu
                    </a>

                    <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this menu?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete Menu
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Menu Information</h3>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <strong>ID:</strong>
                    </div>
                    <div class="col-sm-8">
                        #{{ $menu->id }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-4">
                        <strong>Children:</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $menu->children()->count() }} submenu(s)
                    </div>
                </div>

                @if($menu->type === 'internal' && $menu->page)
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <strong>Page ID:</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $menu->page_id }}
                    </div>
                </div>
                @endif

                @if($menu->parent)
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <strong>Parent ID:</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $menu->parent_id }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.submenu-list {
    max-height: 200px;
    overflow-y: auto;
}

.submenu-item {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.submenu-item:last-child {
    border-bottom: none;
}
</style>
@endpush

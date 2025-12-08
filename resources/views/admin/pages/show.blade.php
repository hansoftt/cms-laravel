@extends('layouts.adminlte')

@section('title', $page->title)
@section('page-title', $page->title)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $page->title }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit Page
                    </a>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Pages
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Page Slug:</strong>
                    </div>
                    <div class="col-sm-9">
                        <code>{{ $page->slug }}</code>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Page Type:</strong>
                    </div>
                    <div class="col-sm-9">
                        <span class="badge badge-{{ $page->type == 'single-column' ? 'primary' : ($page->type == '2-columns' ? 'info' : 'success') }}">
                            {{ ucwords(str_replace('-', ' ', $page->type)) }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Created:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ $page->created_at->format('M d, Y H:i') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ $page->updated_at->format('M d, Y H:i') }}
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <strong>Content:</strong>
                    </div>
                    <div class="col-sm-9">
                        <div class="content-preview">
                            @if($page->type === 'single-column')
                                <div class="single-column">
                                    {!! $page->content1 !!}
                                </div>
                            @elseif($page->type === '2-columns')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="column-content">
                                            <strong>Left Column:</strong>
                                            {!! $page->content1 !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="column-content">
                                            <strong>Right Column:</strong>
                                            {!! $page->content2 !!}
                                        </div>
                                    </div>
                                </div>
                            @elseif($page->type === '3-columns')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="column-content">
                                            <strong>Left Column:</strong>
                                            {!! $page->content1 !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="column-content">
                                            <strong>Middle Column:</strong>
                                            {!! $page->content2 !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="column-content">
                                            <strong>Right Column:</strong>
                                            {!! $page->content3 !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Page Actions</h3>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Page
                    </a>

                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this page?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete Page
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Page Information</h3>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <strong>ID:</strong>
                    </div>
                    <div class="col-sm-8">
                        #{{ $page->id }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-sm-8">
                        <span class="badge badge-success">Active</span>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-4">
                        <strong>URL:</strong>
                    </div>
                    <div class="col-sm-8">
                        <small><code>/{{ $page->slug }}</code></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.content-preview {
    max-height: 400px;
    overflow-y: auto;
    border: 1px solid #dee2e6;
    padding: 15px;
    border-radius: 5px;
    background-color: #f8f9fa;
}

.column-content {
    border: 1px solid #dee2e6;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 3px;
    background-color: #ffffff;
    min-height: 100px;
}

.column-content strong {
    display: block;
    margin-bottom: 8px;
    color: #495057;
    font-size: 0.9em;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
</style>
@endpush

@extends('layouts.adminlte')

@section('title', 'Pages Management')

@section('page-title', 'Pages')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Pages</a></li>
<li class="breadcrumb-item active">List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pages Management</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add New Page
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i> {{ session('success') }}
                </div>
                @endif

                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Type</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td><code>{{ $page->slug }}</code></td>
                            <td>
                                <span class="badge badge-{{ $page->type == 'single-column' ? 'primary' : ($page->type == '2-columns' ? 'info' : 'success') }}">
                                    {{ ucwords(str_replace('-', ' ', $page->type)) }}
                                </span>
                            </td>
                            <td>{{ $page->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.pages.show', $page) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this page?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No pages found. <a href="{{ route('admin.pages.create') }}">Create the first page</a></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $pages->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

@push('styles')
<style>
.badge {
    font-size: 0.8em;
}
</style>
@endpush

@extends('layouts.adminlte')

@section('title', 'Menus Management')

@section('page-title', 'Menus')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Menus</a></li>
<li class="breadcrumb-item active">List</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menus Management</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.menus.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add New Menu
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i> {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-ban"></i> {{ session('error') }}
                </div>
                @endif

                <div class="menu-tree">
                    @forelse($menus as $menu)
                        @include('admin.menus.menu_item', ['menu' => $menu, 'level' => 0])
                    @empty
                    <div class="text-center py-4">
                        <p>No menus found. <a href="{{ route('admin.menus.create') }}">Create the first menu</a></p>
                    </div>
                    @endforelse
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

@push('styles')
<style>
.menu-tree {
    padding: 0;
}

.menu-item {
    border: 1px solid #dee2e6;
    margin-bottom: 10px;
    border-radius: 5px;
    background-color: #fff;
}

.menu-item-header {
    padding: 15px;
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.menu-item-children {
    padding: 15px;
    background-color: #f8f9fa;
}

.menu-item-child {
    border-left: 3px solid #007bff;
    padding-left: 20px;
    margin-bottom: 10px;
    background-color: #fff;
    padding: 10px;
    border-radius: 3px;
}

.menu-item-child:last-child {
    margin-bottom: 0;
}

.menu-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.menu-meta {
    font-size: 0.85em;
    color: #6c757d;
}

.menu-actions .btn {
    margin-right: 5px;
}

.menu-badge {
    display: inline-block;
    padding: 2px 8px;
    font-size: 0.75em;
    border-radius: 3px;
    text-transform: uppercase;
    font-weight: bold;
}
</style>
@endpush

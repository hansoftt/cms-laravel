@extends('layouts.adminlte')

@section('title', 'Contact Settings')

@section('page-title', 'Contact Settings')

@section('breadcrumb', 'Contact Settings')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Contact Information</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="{{ route('admin.settings.contact.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea
                            class="form-control @error('address') is-invalid @enderror"
                            id="address"
                            name="address"
                            rows="3"
                            placeholder="Enter your organization's address"
                        >{{ old('address', $settings->address) }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input
                            type="text"
                            class="form-control @error('phone') is-invalid @enderror"
                            id="phone"
                            name="phone"
                            placeholder="Enter phone number"
                            value="{{ old('phone', $settings->phone) }}"
                        >
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            placeholder="Enter email address"
                            value="{{ old('email', $settings->email) }}"
                        >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

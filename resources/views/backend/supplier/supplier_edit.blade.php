@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Supplier Page </h4>


                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('supplier.all') }}">Supplier Page</a></li>
                        <li class="breadcrumb-item active text-info">Edit Supplier Page</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('supplier.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $supplier->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name </label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{ $supplier->name }}" >
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Mobile </label>
                                <div class="col-sm-10">
                                    <input name="mobile_no" class="form-control" type="text" value="{{ $supplier->mobile_no }}" >
                                        @error('mobile_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Email </label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" value="{{ $supplier->email }}" >
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Address </label>
                                <div class="col-sm-10">
                                    <input name="address" class="form-control" type="text" value="{{ $supplier->address }}" >
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <input type="submit" class="btn btn-warning waves-effect waves-light" value="Update Supplier">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection

@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Category Page</h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.all') }}">Category All</a></li>
                        <li class="breadcrumb-item active text-info">Edit Category Page</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('category.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $category->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Unit Name </label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" value="{{ $category->name }}" type="text">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Category">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Product Page</h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.all') }}">Product All</a></li>
                        <li class="breadcrumb-item active text-info">Add Product Page</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('product.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Product Name </label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Supplier Name </label>
                                <div class="col-sm-10">
                                    <select name="supplier_id" class="form-select" aria-label="Default select example" required>
                                        <option selected="">Open this select menu</option>
                                            @foreach($supplier as $supp)
                                                <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Unit Name </label>
                                <div class="col-sm-10">
                                    <select name="unit_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                            @foreach($unit as $uni)
                                                <option value="{{ $uni->id }}">{{ $uni->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category Name </label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                            @foreach($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Product">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Suppliers </h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-info">Suppliers</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr class="text-center">
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Mobile Number </th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Created</th>
                                <th class="d-flex justify-content-center">
                                    <a href="{{ route('supplier.add') }}" class="btn btn-success btn-rounded waves-effect waves-light" style="float:right;">Add Supplier </a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $key => $item)
                                    <tr class="text-center">
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->mobile_no }} </td>
                                        <td> {{ $item->email }} </td>
                                        <td> {{ $item->address }} </td>
                                        <td> {{ $item->created_at->format('d-m-Y') }} </td>
                                        <td>
                                            <a href="{{ route('supplier.edit', $item->id) }}" class="btn btn-warning sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                                            <a href="{{ route('supplier.delete', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection

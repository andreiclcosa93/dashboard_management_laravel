@extends('admin.admin_master')

@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Category All </h4>


                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-info">Category All </li>
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
                                <th>Created</th>
                                <th class="d-flex justify-content-center"><a href="{{ route('category.add') }}" class="btn btn-success btn-rounded waves-effect waves-light" style="float:right;">Add Category </a></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $key => $item)
                                    <tr class="text-center">
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->created_at->format('d-m-Y') }} </td>
                                        <td>
                                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-warning sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                                            <a href="{{ route('category.delete', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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

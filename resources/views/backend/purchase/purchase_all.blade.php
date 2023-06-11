@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Purchase All </h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-info">Purchase All</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-3" style="margin-right: 30px">
                        <a href="{{ route('purchase.add') }}" class="btn btn-success btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-ad"></i> Add Product </a>
                    </div>
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr  class="text-center">
                                <th>Sl</th>
                                <th>Purhase No</th>
                                <th>Date </th>
                                <th>Supplier</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key => $item)
                                    <tr  class="text-center">
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item->purchase_no }} </td>
                                        <td> {{ date('d-m-Y',strtotime($item->date)) }} </td>
                                        <td> {{ $item['supplier']['name'] }} </td>
                                        <td> {{ $item['category']['name'] }} </td>
                                        <td> {{ $item->buying_qty }} </td>
                                        <td> {{ $item['product']['name'] }} </td>
                                        <td>
                                            @if($item->status == '0')
                                                <span class="btn btn-warning">Pending</span>
                                            @elseif($item->status == '1')
                                                <span class="btn btn-success">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->status == '0')
                                                <a href="{{ route('purchase.delete', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                            @endif
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

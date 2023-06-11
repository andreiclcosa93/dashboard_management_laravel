@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Invoice Pending </h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-info">Invoice Pending</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-3" style="margin-right: 30px">
                        <a href="{{ route('invoice.add') }}" class="btn btn-success btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-ad"></i> Add Invoice </a>
                    </div>
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Customer Name</th>
                                <th>Invoice No </th>
                                <th>Date </th>
                                <th>Desctipion</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>

                            </thead>

                            <tbody>
                                @foreach($allData as $key => $item)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item['payment']['customer']['name'] }} </td>
                                        <td> #{{ $item->invoice_no }} </td>
                                        <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>
                                        <td>  {{ $item->description }} </td>
                                        <td>  ${{ $item['payment']['total_amount'] }} </td>
                                        <td>

                                            @if($item->status == '0')
                                                <span class="btn btn-warning">Pending</span>
                                            @elseif($item->status == '1')
                                                <span class="btn btn-success">Approved</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if($item->status == '0')
                                                <a href="{{ route('invoice.approve',$item->id) }}" class="btn btn-dark sm" title="Approved Data" >  <i class="fas fa-check-circle"></i> </a>

                                                <a href="{{ route('invoice.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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

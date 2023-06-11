@extends('admin.admin_master')

@section('admin')


 <div class="page-content">
    <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-8">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Stock report</h4>
                    </div>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active text-info">Stock report</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                         <a href="{{ route('stock.report.pdf') }}" target="_blank" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-print"> Stock Report Print </i></a> <br><br><br>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Supplier Name </th>
                                    <th>Unit</th>
                                    <th>Category</th>
                                    <td class="text-center"><strong>Product Name</strong></td>
                                    <td class="text-center"><strong>In Qty </strong></td>
                                    <td class="text-center"><strong>Out Qty </strong></td>
                                    <td class="text-center"><strong>Stock </strong></td>
                                </tr>
                            </thead>
                            <tbody>
                        	    @foreach($allData as $key => $item)

                                @php
                                    $buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
                                    $selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
                                @endphp

                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item['supplier']['name'] }} </td>
                                        <td> {{ $item['unit']['name'] }} </td>
                                        <td> {{ $item['category']['name'] }} </td>
                                        <td> {{ $item->name }} </td>
                                        <td> <span class="btn btn-success"> {{ $buying_total  }}</span>  </td>
                                        <td> <span class="btn btn-info"> {{ $selling_total  }}</span> </td>
                                        <td> <span class="btn btn-danger"> {{ $item->quantity }}</span> </td>
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

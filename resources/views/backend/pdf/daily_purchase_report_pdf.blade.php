@extends('admin.admin_master')

@section('admin')

 <div class="page-content">
    <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h3>
                                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo" height="24"/> Easy Shopping Mall
                                        </h3>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <address>
                                                <strong>Easy Shopping Mall:</strong><br>
                                                Shop Online<br>
                                                support@contact.com
                                            </address>
                                        </div>
                                        <div class="col-6 mt-4 text-end">
                                            <address>

                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <div class="p-2">
                                                <h3 class="font-size-16"><strong>Daily Purchase Report
                                                    <span class="btn btn-info"> {{ date('d-m-Y',strtotime($start_date)) }} </span> -
                                                    <span class="btn btn-success"> {{ date('d-m-Y',strtotime($end_date)) }} </span>
                                                </strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <div class="p-2"></div>
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td><strong>Sl </strong></td>
                                                                    <td class="text-center"><strong>Purchase No </strong></td>
                                                                    <td class="text-center"><strong>Date  </strong></td>
                                                                    <td class="text-center"><strong>Product Name</strong></td>
                                                                    <td class="text-center"><strong>Quantity</strong></td>
                                                                    <td class="text-center"><strong>Unit Price  </strong></td>
                                                                    <td class="text-center"><strong>Total Price  </strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                    @php
                                                                        $total_sum = '0';
                                                                    @endphp
                                                                @foreach($allData as $key => $item)
                                                                <tr>
                                                                <td class="text-center">{{ $key+1 }}</td>
                                                                    <td class="text-center">{{ $item->purchase_no }}</td>
                                                                    <td class="text-center">{{ date('d-m-Y',strtotime($item->date)) }}</td>
                                                                    <td class="text-center">{{ $item['product']['name'] }}</td>
                                                                    <td class="text-center">{{ $item->buying_qty }} {{ $item['product']['unit']['name'] }} </td>
                                                                    <td class="text-center">{{ $item->unit_price }}</td>
                                                                    <td class="text-center">{{ $item->buying_price }}</td>
                                                                </tr>
                                                                    @php
                                                                        $total_sum += $item->buying_price;
                                                                    @endphp
                                                                @endforeach

                                                                <tr>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line text-center">
                                                                        <strong>Grand Amount</strong></td>
                                                                    <td class="no-line text-end"><h4 class="m-0">${{ $total_sum}}</h4></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="d-print-none">
                                                        <div class="float-end">
                                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                            <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Download</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>


@endsection

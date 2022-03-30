@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Processing Orders</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Orders</li>
                            <li class="breadcrumb-item active" aria-current="page">Processing Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Processing Orders</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Dete</th>
                                        <th>Invoice</th>
                                        <th>Amount</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>${{ number_format($order->amount) }}</td>
                                        <td>{{ $order->payment_type }}</td>
                                        <td>
                                            {{-- @if ($order->status === 'Delivered')
                                                <span class="badge badge-pill badge-success">Delivered</span>
                                            @else --}}
                                            <span class="badge badge-pill badge-primary">{{$order->status}}</span>
                                            {{-- @endif --}}
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('pending.details',$order->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{ route('admin.invoice',$order->id) }}">
                                                <i class="fa fa-download" title="Invoice"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Dete</th>
                                        <th>Invoice</th>
                                        <th>Amount</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>


        </div>
    </section>
</div>

@endsection

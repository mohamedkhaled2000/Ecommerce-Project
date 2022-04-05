@extends('fontend.home_master')
@section('title')
    My Orders
@endsection
@section('fontend')
    <div class="body-cotent">
        <div class="container">
            <div class="row">

                @include('fontend.body.dash_sidbar')


                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="text-center"><strong>{{ Auth::user()->name }}</strong> Orders</h3>
                        <br><br>
                        <div class="card-body">

                            <table class="table table-striped">
                                <thead style="background:#C3C7FA">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Order</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $order->order_date }}</td>
                                            <td>${{ number_format($order->amount) }}</td>
                                            <td>{{ $order->payment_type }}</td>
                                            <td>{{ $order->invoice_no }}</td>
                                            <td>
                                                @if ($order->status === 'Pending')
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #50A5F5">{{ $order->status }}</span>
                                                @elseif ($order->status === 'return')
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #533E85">{{ $order->status }}</span>
                                                @elseif ($order->status === 'confirm')
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #5EE6EB">{{ $order->status }}</span>
                                                @elseif ($order->status === 'processing')
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #EBD671">{{ $order->status }}</span>
                                                @elseif ($order->status === 'picked')
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #F582A7">{{ $order->status }}</span>
                                                @elseif ($order->status === 'shipping')
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #C5D8A4">{{ $order->status }}</span>
                                                @elseif ($order->status === 'delivered')
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #00C897">{{ $order->status }}</span>
                                                    @if ($order->return_order == 1)
                                                    <span class="badge badge-pill badge-info"
                                                        style="background: red">Returned Request</span>
                                                    @endif
                                                @elseif ($order->status === 'cancel')
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #E83A14">{{ $order->status }}</span>
                                                @endif

                                                    @if ($order->status == 'return')
                                                    <span class="badge badge-pill badge-info"
                                                        style="background: red">Returned Request</span>
                                                    @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('order.details', $order->id) }}"
                                                    class="btn btn-primary"><i class="fa fa-eye" title="View"></i></a>
                                                <a target="_blank" href="{{ route('order.invoice',$order->id) }}" class="btn btn-danger"><i class="fa fa-download"
                                                        title="Invoice"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $orders->links('vendor.pagination.bootstrap-4') }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

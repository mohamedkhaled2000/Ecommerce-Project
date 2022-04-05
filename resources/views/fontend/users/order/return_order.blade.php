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
                                        <th scope="col">Return Reason</th>
                                        <th scope="col">Order</th>
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
                                            <td>{{ $order->return_reason }}</td>
                                            <td>
                                                @if ($order->return_order == 1)
                                                    <span class="badge badge-pill badge-info"
                                                        style="background: #490bda">Pending</span>
                                                @elseif ($order->return_order == 2)
                                                    <span class="badge badge-pill badge-info"
                                                        style="background: #0bda15">Success</span>
                                                @endif

                                                    @if ($order->return_order == 1)
                                                    <span class="badge badge-pill badge-info"
                                                        style="background: red">Returned Request</span>
                                                    @endif
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

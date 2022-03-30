@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Pending Details</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Pending</li>
                            <li class="breadcrumb-item active" aria-current="page">Pending Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">


            <div class="col-md-6 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Shipping Details</h4>
                  </div>
                  <div class="box-body">
                    <table class="table table-striped">
                        <tr>
                            <th><strong>Shipping Name :</strong></th>
                            <th>{{ $order->name }}</th>
                        </tr>
                        <tr>
                            <th><strong>Shipping Phone :</strong></th>
                            <th>{{ $order->phone }}</th>
                        </tr>
                        <tr>
                            <th><strong>Shipping Email :</strong></th>
                            <th>{{ $order->email }}</th>
                        </tr>
                        <tr>
                            <th><strong>Shipping Division :</strong></th>
                            <th>{{ $order->division->shipping_name }}</th>
                        </tr>
                        <tr>
                            <th><strong>Shipping District :</strong></th>
                            <th>{{ $order->district->district_name }}</th>
                        </tr>
                        <tr>
                            <th><strong>State :</strong></th>
                            <th>{{ $order->state->state_name }}</th>
                        </tr>
                        <tr>
                            <th><strong>Post Code :</strong></th>
                            <th>{{ $order->post_code }}</th>
                        </tr>
                        <tr>
                            <th><strong>Order Date :</strong></th>
                            <th>{{ $order->order_date }}</th>
                        </tr>

                    </table>
                  </div>
                </div>
            </div>


            <div class="col-md-6 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Order Details</h4><br>
                    <strong>Invoice : </strong><span class="text-danger">{{ $order->invoice_no }}</span>
                  </div>
                  <div class="box-body">
                    <table class="table table-striped">
                        <tr>
                            <th><strong>Name :</strong></th>
                            <th>{{ $order->name }}</th>
                        </tr>
                        <tr>
                            <th><strong>Phone :</strong></th>
                            <th>{{ $order->phone }}</th>
                        </tr>
                        <tr>
                            <th><strong>Payment Type :</strong></th>
                            <th>{{ $order->payment_type }}</th>
                        </tr>
                        <tr>
                            <th><strong>Tranx ID :</strong></th>
                            <th>{{ $order->transaction_id }}</th>
                        </tr>
                        <tr>
                            <th><strong>Invoice :</strong></th>
                            <th class="text-danger">{{ $order->invoice_no }}</th>
                        </tr>
                        <tr>
                            <th><strong>Order Total :</strong></th>
                            <th>${{ number_format($order->amount) }}</th>
                        </tr>
                        <tr>
                            <th><strong>Order :</strong></th>
                            <th>
                                <span class="badge badge-pill badge-info"
                                    style="background: #50A5F5">{{ $order->status }}</span>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                @if ($order->status == 'Pending')
                                    <a href="{{ url('/orders/pending/confirm/'.$order->id) }}" class="btn btn-success" id="confirm">Confirm Order</a>
                                @elseif ($order->status == 'confirm')
                                    <a href="{{ url('/orders/pending/processing/'.$order->id) }}" class="btn btn-success" id="procrssing">Processing Order</a>
                                @elseif ($order->status == 'processing')
                                    <a href="{{ url('/orders/pending/picked/'.$order->id) }}" class="btn btn-success" id="picked">Picked Order</a>
                                @elseif ($order->status == 'picked')
                                    <a href="{{ url('/orders/pending/shipping/'.$order->id) }}" class="btn btn-success" id="shipping">Shipping Order</a>
                                @elseif ($order->status == 'shipping')
                                    <a href="{{ url('/orders/pending/delivered/'.$order->id) }}" class="btn btn-success" id="delivered">Delivered Order</a>
                                @elseif ($order->status == 'delivered')
                                    <a href="{{ url('/orders/pending/cancel/'.$order->id) }}" class="btn btn-danger" id="cancel">Cancel Order</a>
                                @endif
                            </th>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Order</h4><br>
                  </div>
                  <div class="box-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Code</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_item as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img src="{{ asset($item->product->product_thambnail) }}" width="50px" height="50px">
                                    </td>
                                    <td>{{ $item->product->product_name_en }}</td>
                                    <td>{{ $item->product->product_code }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>
                                        @if ($item->size == null)
                                        <span class="badge badge-pill badge-danger"
                                            style="background: #E63A3A">No Size</span>
                                        @else
                                            {{$item->size}}
                                        @endif
                                    </td>
                                    <td>{{$item->qty }}</td>
                                    <td>${{ number_format($item->price * $item->qty) }}</td>
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

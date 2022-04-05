@extends('fontend.home_master')
@section('title')
{{ $order->invoice_no }}
@endsection

@section('fontend')
    <div class="body-cotent">
        <div class="container">
            <div class="row">

                @include('fontend.body.dash_sidbar')


                <div class="col-md-5">
                    <div class="card">
                        <h3 class="text-center"><strong>Shipping Details</strong></h3>
                        <br><br>
                        <div class="card-body">

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

                <div class="col-md-5">
                    <div class="card">
                        <h3 class="text-center"><strong>Order Details</strong></h3>
                        <strong>Invoice : </strong><span class="text-danger">{{ $order->invoice_no }}</span>
                        <br><br>
                        <div class="card-body">

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
                            </table>


                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <br><br>
                            <div class="card-body">

                                <table class="table table-striped">
                                    <thead style="background:#C3C7FA">
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

                @if ($order->status === 'delivered')
                    @if ($order->return_order != 1)
                    <form action="{{ route('return.order',$order->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="label">Order Return Ression</label>
                            <textarea name="return_reason" class="form-control" id="label" aria-describedby="emailHelp" rows="05">Return Ression</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Return</button><br><br>
                    </form>

                    @endif

                @endif

            </div>
        </div>
    </div>
@endsection

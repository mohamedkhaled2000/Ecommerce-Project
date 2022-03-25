@extends('fontend.home_master')

@section('title')
    {{ __('masseges.Checkout') }}
@endsection

@section('fontend')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Cash On Delivery</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">
                                            <!-- guest-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <div class="panel-heading">
                                                    <h4 class="unicase-checkout-title">Your Ship Amount</h4>
                                                </div><br><br>
                                                <div class="">
                                                    <ul class="nav nav-checkout-progress list-unstyled">
                                                        <li>
                                                            @if (Session::has('coupon'))
                                                                <strong>SubTotal:</strong>${{ $cartTotle }} <br><br>
                                                                <strong>Coupon
                                                                    Name:</strong>{{ session()->get('coupon')['coupon_name'] }}
                                                                ({{ session()->get('coupon')['coupon_discount'] }}%)<br><br>
                                                                <strong>Discount
                                                                    Amount:</strong>${{ session()->get('coupon')['discount_amount'] }}<br><br>
                                                                <strong class="text-success">Grand
                                                                    Total:</strong>${{ session()->get('coupon')['total_amount'] }}<br><br>
                                                            @else
                                                                <strong>SubTotal:</strong>${{ $cartTotle }} <br><br>
                                                                <strong>Grand Total:</strong>${{ $cartTotle }}
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">

                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="row">

                                                            <!-- Display a payment form -->
                                                            <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                                                                @csrf
                                                                <div class="form-row">
                                                                    <img src="{{ asset('fontend/assets/images/payments/cash.png') }}" alt="">
                                                                    <label for="card-element">
                                                                        <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                                                        <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                                                        <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                                                        <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                                                        <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                                                        <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                                                        <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                                                        <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                                                    </label>

                                                                </div>
                                                                <br>
                                                                <button class="btn btn-primary">Submit Payment</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- already-registered-login -->


                                            </div>
                                        </div>
                                        <!-- panel-body  -->
                                    </div>
                                    <!-- row -->
                                </div>
                                <!-- checkout-step-01  -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    </div>

    </div>
    <!-- /.row -->
    </div>
    <!-- /.checkout-box -->

    <!-- /.logo-slider -->
    </div>
    <!-- /.container -->
    </div>
    <!-- /.body-content -->

@endsection

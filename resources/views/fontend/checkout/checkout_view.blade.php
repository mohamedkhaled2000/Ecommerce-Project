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
          <li class="active">{{ __('masseges.Checkout') }}</li>
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
          <div class="col-md-8">
            <div class="panel-group checkout-steps" id="accordion">
              <!-- checkout-step-01  -->
              <div class="panel panel-default checkout-step-01">

                <div id="collapseOne" class="panel-collapse collapse in">
                  <!-- panel-body  -->
                  <div class="panel-body">
                    <div class="row">
                        <!-- guest-login -->
                        <div class="col-md-6 col-sm-6 already-registered-login">
                            <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>

                            <form class="register-form" action="{{ route('checkout.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1"
                                    >Shipping Name <span>*</span></label>
                                    <input
                                    type="text" name="shipping_name"
                                    class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1"
                                    value="{{ Auth::user()->name }}" required
                                    />
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1"
                                    >Shipping Email <span>*</span></label>
                                    <input
                                    type="email" name="shipping_email"
                                    class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1"
                                    value="{{ Auth::user()->email }}" required
                                    />
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1"
                                    >Shipping Phone <span>*</span></label>
                                    <input
                                    type="text" name="shipping_phone"
                                    class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1"
                                    value="{{ Auth::user()->phone }}" required
                                    />
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1"
                                    >Post Code <span>*</span></label>
                                    <input
                                    type="text" name="post_code"
                                    class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1" required/>
                                </div>

                            </div>
                        <!-- guest-login -->

                        <!-- already-registered-login -->
                            <div class="col-md-6 col-sm-6 already-registered-login">

                                <div class="form-group">
                                    <!-- select -->
                                        <label>Shipping Division</label>
                                        <select class="form-control" name="division_id">
                                            <option value="" selected>Select Division</option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->shipping_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <!-- select -->
                                        <label>Shipping District</label>
                                        <select class="form-control" name="district_id">
                                            <option value="" selected>Select District</option>
                                        </select>
                                    @error('district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <!-- select -->
                                        <label>Shipping State</label>
                                        <select class="form-control" name="state_id">
                                            <option value="" selected>Select State</option>
                                        </select>
                                    @error('state_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1"
                                    >Notes</label>
                                    <textarea
                                    type="text" name="notes"
                                    class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1" placeholder="Notes" ></textarea>
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
                            <!-- /.checkout-steps -->
                                </div>
                                <div class="col-md-4">
                                    <!-- checkout-progress-sidebar -->
                                    <div class="checkout-progress-sidebar">
                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="unicase-checkout-title">
                                            Your Checkout Progress
                                            </h4>
                                        </div>
                                        <div class="">
                                            <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach ($carts as $item)

                                            <li>
                                                <strong>Image: </strong>
                                                <img src="{{ asset($item->attributes->image) }}" width="50px" height="50px">
                                            </li> <br>
                                            <li>
                                                <strong>Qty:</strong>
                                                ({{ $item->quantity }})

                                                <strong>Color:</strong>
                                                {{ $item->attributes->color }}

                                                @if ($item->attributes->size != null)
                                                    <strong>Size:</strong>
                                                    {{ $item->attributes->size }}
                                                @endif

                                            </li> <br><br>
                                            @endforeach
                                            <li>
                                                @if (Session::has('coupon'))
                                                    <strong>SubTotal:</strong>${{ $cartTotle }} <br><br>
                                                    <strong>Coupon Name:</strong>{{ session()->get('coupon')['coupon_name'] }} ({{ session()->get('coupon')['coupon_discount'] }}%)<br><br>
                                                    <strong>Discount Amount:</strong>${{ session()->get('coupon')['discount_amount'] }}<br><br>
                                                    <strong class="text-success">Grand Total:</strong>${{ session()->get('coupon')['total_amount'] }}<br><br>

                                                @else
                                                <strong>SubTotal:</strong>${{ $cartTotle }} <br><br>
                                                <strong>Grand Total:</strong>${{ $cartTotle }}

                                                @endif
                                            </li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- checkout-progress-sidebar -->
                                </div>

                                <div class="col-md-4">
                                    <!-- checkout-progress-sidebar -->
                                    <div class="checkout-progress-sidebar">
                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="unicase-checkout-title">
                                            Select Payment Method
                                            </h4>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label for="">Stripe</label>
                                                <input type="radio" name="payment_method" value="stripe">
                                                <img src="{{ asset('fontend/assets/images/payments/4.png') }}" alt="">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Card</label>
                                                <input type="radio" name="payment_method" value="card">
                                                <img src="{{ asset('fontend/assets/images/payments/3.png') }}" alt="">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Cash</label>
                                                <input type="radio" name="payment_method" value="cash">
                                                <img src="{{ asset('fontend/assets/images/payments/6.png') }}" alt="">
                                            </div>

                                        </div> <hr>
                                        <button
                                        type="submit"
                                        class="btn-upper btn btn-primary checkout-page-button">
                                        Pyment Step
                                    </button>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- checkout-progress-sidebar -->
                                </div>
                            </form>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.checkout-box -->

      <!-- /.logo-slider -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.body-content -->

  <script type="text/javascript">
    $(document).ready(function() {

      $('select[name="division_id"]').on('change', function(){
          var divition_id = $(this).val();
          if(divition_id) {
              $.ajax({
                  url: "{{  url('district/ajax') }}/"+divition_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                      $('select[name="state_id"]').empty();
                     var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

      $('select[name="district_id"]').on('change', function(){
          var district_id = $(this).val();
          if(district_id) {
              $.ajax({
                  url: "{{  url('state/ajax') }}/"+district_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="state_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

  });
  </script>

@endsection

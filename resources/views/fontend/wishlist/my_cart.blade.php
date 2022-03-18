@extends('fontend.home_master')

@section('title')
    {{ __('masseges.cart') }}
@endsection

@section('fontend')
<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
            <li><a href="{{url('/')}}">{{__('masseges.Home')}}</a></li>
            <li class="active">{{__('masseges.Shopping Cart')}}</li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.breadcrumb -->

  <div class="body-content outer-top-xs">
    <div class="container">
      <div class="row">
        <div class="shopping-cart">
          <div class="shopping-cart-table">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th class="cart-romove item">Remove</th>
                    <th class="cart-description item">Image</th>
                    <th class="cart-product-name item">Product Name</th>
                    <th class="cart-edit item">Edit</th>
                    <th class="cart-qty item">Quantity</th>
                    <th class="cart-sub-total item">Subtotal</th>
                    <th class="cart-total last-item">Grandtotal</th>
                  </tr>
                </thead>
                <!-- /thead -->
                <tfoot>
                  <tr>
                    <td colspan="7">
                      <div class="shopping-cart-btn">
                        <span class="">
                          <a
                            href="#"
                            class="btn btn-upper btn-primary outer-left-xs"
                            >Continue Shopping</a
                          >
                          <a
                            href="#"
                            class="btn btn-upper btn-primary pull-right outer-right-xs"
                            >Update shopping cart</a
                          >
                        </span>
                      </div>
                      <!-- /.shopping-cart-btn -->
                    </td>
                  </tr>
                </tfoot>
                <tbody id="my_cart_products">


                </tbody>
                <!-- /tbody -->
              </table>
              <!-- /table -->
            </div>
          </div>
          <!-- /.shopping-cart-table -->
          <div class="col-md-4 col-sm-12 estimate-ship-tax">

          </div>
          <!-- /.estimate-ship-tax -->

          <div class="col-md-4 col-sm-12 estimate-ship-tax">
             @if (Session::has('coupon'))
             @else
            <table class="table" id="applyedCoupon">
              <thead>
                <tr>
                  <th>
                    <span class="estimate-title">Discount Code</span>
                    <p>Enter your coupon code if you have one..</p>
                  </th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control unicase-form-control text-input"
                        placeholder="You Coupon.."
                      id="coupon_name" />
                    </div>
                    <div class="clearfix pull-right">
                      <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">
                        APPLY COUPON
                      </button>
                    </div>
                  </td>
                </tr>


              </tbody>
              <!-- /tbody -->
            </table>
            <!-- /table -->
             @endif
          </div>
          <!-- /.estimate-ship-tax -->



          <div class="col-md-4 col-sm-12 cart-shopping-total">
            <table class="table" >
              <thead id="couponCalculation">

              </thead>
              <!-- /thead -->
              <tbody>
                <tr>
                  <td>
                    <div class="cart-checkout-btn pull-right">
                      <button
                        type="submit"
                        class="btn btn-primary checkout-btn"
                      >
                        PROCCED TO CHEKOUT
                      </button>
                      <span class="">Checkout with multiples address!</span>
                    </div>
                  </td>
                </tr>
              </tbody>
              <!-- /tbody -->
            </table>
            <!-- /table -->
          </div>
          <!-- /.cart-shopping-total -->
        </div>
        <!-- /.shopping-cart -->
      </div>
      <!-- /.row -->
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      <div id="brands-carousel" class="logo-slider wow fadeInUp">
        <div class="logo-slider-inner">
          <div
            id="brand-slider"
            class="owl-carousel brand-slider custom-carousel owl-theme"
          >
            <div class="item m-t-15">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand1.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->

            <div class="item m-t-10">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand2.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->

            <div class="item">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand3.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->

            <div class="item">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand4.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->

            <div class="item">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand5.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->

            <div class="item">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand6.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->

            <div class="item">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand2.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->

            <div class="item">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand4.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->

            <div class="item">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand1.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->

            <div class="item">
              <a href="#" class="image">
                <img
                  data-echo="assets/images/brands/brand5.png"
                  src="assets/images/blank.gif"
                  alt=""
                />
              </a>
            </div>
            <!--/.item-->
          </div>
          <!-- /.owl-carousel #logo-slider -->
        </div>
        <!-- /.logo-slider-inner -->
      </div>
      <!-- /.logo-slider -->
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.body-content -->

@endsection

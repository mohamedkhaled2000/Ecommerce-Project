@extends('fontend.home_master')

@section('title')
    {{ __('masseges.Wishlist') }}
@endsection

@section('fontend')

<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="{{url('/')}}">{{__('masseges.Home')}}</a></li>
          <li class="active">{{__('masseges.My Wishlist')}}</li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.breadcrumb -->

  <div class="body-content">
    <div class="container">
      <div class="my-wishlist-page">
        <div class="row">
          <div class="col-md-12 my-wishlist">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="4" class="heading-title">{{__('masseges.Wishlist')}}</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($wishlists as $wishlist)
                @php
                    $amount = $wishlist->products->selling_price - $wishlist->products->discount_price;

                @endphp
                  <tr>
                    <td class="col-md-2">
                      <img src="{{ asset($wishlist->products->product_thambnail) }}" alt="imga" />
                    </td>
                    <td class="col-md-7">
                      <div class="product-name">
                        <a href="{{ url('/product/' . $wishlist->products->product_name_en . '/' . $wishlist->products->id) }}">
                            {{ LaravelLocalization::getCurrentLocale() === 'ar' ? $wishlist->products->product_name_ar:$wishlist->products->product_name_en }}
                        </a>
                      </div>
                      <div class="rating">
                        <i class="fa fa-star rate"></i>
                        <i class="fa fa-star rate"></i>
                        <i class="fa fa-star rate"></i>
                        <i class="fa fa-star rate"></i>
                        <i class="fa fa-star non-rate"></i>
                        <span class="review">( 06 Reviews )</span>
                      </div>
                      <div class="price">
                        ${{ $amount }}
                        <span style="color: rgb(126, 125, 125);display: {{ $amount == $wishlist->products->selling_price ? 'none' : '' }}">${{ $wishlist->products->selling_price }}</span>
                      </div>
                    </td>
                    <td class="col-md-2">
                        <button class="btn btn-primary icon"
                        type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $wishlist->product_id }}" onclick="productView(this.id)">
                        {{__('masseges.Add to cart')}}</button>

                    </td>
                    <td class="col-md-1 close-btn">
                      <a type="submit" id="{{ $wishlist->id }}" onclick="wishlistRemove(this.id)" class=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.sigin-in-->
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

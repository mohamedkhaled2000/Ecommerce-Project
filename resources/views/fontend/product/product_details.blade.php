@extends('fontend.home_master')

@section('title')
{{ $details->product_name_en }}
@endsection

@section('fontend')

<style>
        /* rating */
    .rating-css div {
        color: #ffe400;
        font-size: 30px;
        font-family: sans-serif;
        font-weight: 800;
        text-align: center;
        text-transform: uppercase;
        padding: 20px 0;
    }
    .rating-css input {
        display: none;
    }
    .rating-css input + label {
        font-size: 60px;
        text-shadow: 1px 1px 0 #8f8420;
        cursor: pointer;
    }
    .rating-css input:checked + label ~ label {
        color: #b4afaf;
    }
    .rating-css label:active {
        transform: scale(0.8);
        transition: 0.3s ease;
    }

    .checked{
        color: #ffe400
    }

    /* End of Star Rating */
</style>
    <!-- ===== ======== HEADER : END ============================================== -->

    @php
        $reviews = App\Models\Review::where('product_id',$details->id)
                                ->where('status',1)
                                ->latest()
                                ->get();

        if ($reviews->count() > 0) {
            $review_rate = $reviews->sum('product_rating') / $reviews->count();
        }
    @endphp

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">{{__('masseges.Home')}}</a></li>
                    <li><a href="#">{{ LaravelLocalization::getCurrentLocale() === 'ar' ? $details->category->category_name_ar:$details->category->category_name_en }}</a></li>
                    <li class='active'>{{ LaravelLocalization::getCurrentLocale() === 'ar' ? $details->product_name_en:$details->product_name_en }}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>

                <div class='col-md-3 sidebar' style="float: {{LaravelLocalization::getCurrentLocale() === 'ar' ? 'right':''}}">
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{asset('fontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                        </div>



                        <!-- ============================================== HOT DEALS ============================================== -->
                        @include('fontend.product.hot_deals')
                        <!-- ============================================== HOT DEALS: END ============================================== -->

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                            <h3 class="section-title">Newsletters</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <p>Sign Up for Our Newsletter!</p>
                                <form>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Subscribe to our newsletter">
                                    </div>
                                    <button class="btn btn-primary">Subscribe</button>
                                </form>
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== NEWSLETTER: END ============================================== -->

                        <!-- ============================================== Testimonials============================================== -->
                        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                            <div id="advertisement" class="advertisement">
                                <div class="item">
                                    <div class="avatar"><img src="{{asset('fontend/assets/images/testimonials/member1.png')}}"
                                            alt="Image"></div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                    <!-- /.container-fluid -->
                                </div><!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="{{asset('fontend/assets/images/testimonials/member3.png')}}"
                                            alt="Image"></div>
                                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                                </div><!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="{{asset('fontend/assets/images/testimonials/member2.png')}}"
                                            alt="Image"></div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                        mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                    <!-- /.container-fluid -->
                                </div><!-- /.item -->

                            </div><!-- /.owl-carousel -->
                        </div>

                        <!-- ============================================== Testimonials: END ============================================== -->



                    </div>
                </div><!-- /.sidebar -->


                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                    @php
                    $multImg = App\Models\MultiImage::where('product_id',$details->id)->get();
                    @endphp
                                    <div id="owl-single-product">

                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                                href="{{asset($details->product_thambnail)}}">
                                                <img class="img-responsive" alt="" src="{{asset($details->product_thambnail)}}"
                                                    data-echo="{{asset($details->product_thambnail)}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @foreach ($multImg as $img)
                                        <div class="single-product-gallery-item" id="slide{{$img->id}}">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                                href="{{$img->photo_name}}">
                                                <img class="img-responsive" alt="" src="{{asset($img->photo_name)}}"
                                                    data-echo="{{asset($img->photo_name)}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                        @endforeach



                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">

                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                    data-slide="1" href="#slide1">
                                                    <img class="img-responsive" width="85" alt=""
                                                        src="{{asset($details->product_thambnail)}}"
                                                        data-echo="{{asset($details->product_thambnail)}}" />
                                                </a>
                                            </div>
                                            @foreach ($multImg as $img)

                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product"
                                                    data-slide="2" href="#slide{{$img->id}}">
                                                    <img class="img-responsive" width="85" alt=""
                                                        src="{{asset($img->photo_name)}}"
                                                        data-echo="{{asset($img->photo_name)}}" />
                                                </a>
                                            </div>
                                            @endforeach
                                        </div><!-- /#owl-single-product-thumbnails -->



                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->


                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name" id="proName">{{ LaravelLocalization::getCurrentLocale() === 'ar' ? $details->product_name_ar:$details->product_name_en }}</h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating">
                                                    @if ($reviews->count() != 0)
                                                        @for ($i = 1 ; $i <= number_format($review_rate); $i++)
                                                            <i class="fa fa-star checked"></i>
                                                        @endfor
                                                        @for ($j = number_format($review_rate)+1; $j <= 5; $j++ )
                                                            <i class="fa fa-star"></i>
                                                        @endfor

                                                    @else
                                                        @for ($i = 1; $i <= 5; $i++ )
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">({{$reviews->count()}} Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    @if ($details->product_qty <= 0)
                                                        <span class="value"><b>Out Of Stock</b> </span>
                                                    @else
                                                        <span class="text-success"><b>In Stock</b> </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        {{ LaravelLocalization::getCurrentLocale() === 'ar' ? $details->short_desc_ar:$details->short_desc_en }}
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">

                                            @php
                                            $amount = $details->selling_price - $details->discount_price;
                                            $discount = 100 - ($amount / $details->selling_price * 100);
                                            @endphp
                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    <span class="price" >$ {{$details->selling_price}}</span>
                                                    <span class="price-strike" style="color: rgb(126, 125, 125);display: {{$amount == $details->selling_price ? 'none' : '' }}">$ {{$amount}}</span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="E-mail" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="info-title control-label">{{__('masseges.Select Color')}}</label>
                                                    <select class="form-control unicase-form-control selectpicker" id="color" style="display: none;">
                                                        <option>--{{__('masseges.Select Color')}}--</option>
                                                        @if (LaravelLocalization::getCurrentLocale() === 'ar')

                                                            @foreach ($product_color_ar as $color)
                                                                <option>{{ ucwords($color) }}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach ($product_color_en as $color)
                                                                <option>{{ ucwords($color) }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group" style="display: {{ $details->product_size_en == null  ?  'none' : ''}} ">
                                                    <label class="info-title control-label">{{__('masseges.Select Size')}}</label>
                                                    <select class="form-control unicase-form-control selectpicker" id="size" style="display: none;">
                                                        <option>--{{__('masseges.Select Size')}}--</option>
                                                        @if (LaravelLocalization::getCurrentLocale() === 'ar')

                                                            @foreach ($product_size_ar as $size)
                                                                <option>{{ ucwords($size) }}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach ($product_size_en as $size)
                                                                <option>{{ ucwords($size) }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->



                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span
                                                                    class="ir"><i
                                                                        class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span
                                                                    class="ir"><i
                                                                        class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="number" id="qty" value="1" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="product_id" value="{{ $details->id }}">

                                            <div class="col-sm-7">
                                                @if (Auth::user())
                                                <button type="submit" class="btn btn-primary" onclick="AddToCart()"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i>{{__('masseges.Add to cart')}}</button>
                                                @else
                                                 <a href="{{url('/login')}}" class="btn btn-primary">{{__('masseges.Add to cart')}}</a>
                                                @endif
                                            </div>

                                            <br><br>
                                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                            <div class="addthis_inline_share_toolbox"></div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->






                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">{{__('masseges.DESCRIPTION')}}</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#review">{{__('masseges.REVIEW')}}</a></li>
                                    <li><a data-toggle="tab" href="#tags">{{__('masseges.TAGS')}}</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                {!! LaravelLocalization::getCurrentLocale() === 'ar' ? $details->long_desc_ar:$details->long_desc_en !!}
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">

                                                    @foreach ($reviews as $review)
                                                        <div class="review">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <img class="card-img-top rounded-circle"
                                                                        style="height: 40px; width:40px; border-radius:50% ;"
                                                                        src="{{ $review->user->profile_photo_path == null ? url('upload/admin_images/no_image.jpg') : url('upload/user_images/'.$review->user->profile_photo_path) }}" >

                                                                    <strong>{{$review->user->name}}</strong>

                                                                </div><br>
                                                                <div class="col-md-4">
                                                                    <div class="rating">
                                                                        @if ($reviews->count() != 0)
                                                                            @for ($i = 1 ; $i <= $review->product_rating; $i++)
                                                                                <i class="fa fa-star checked"></i>
                                                                            @endfor
                                                                            @for ($j = $review->product_rating+1; $j <= 5; $j++ )
                                                                                <i class="fa fa-star"></i>
                                                                            @endfor
                                                                        @endif

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="review-title"><span class="summary"><b>{{ $review->summary }}</b></span><span class="date"><i
                                                                        class="fa fa-calendar"></i><span>{{Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</span></span></div>
                                                            <div class="text">"{{ $review->comment }}"</div>
                                                        </div>
                                                    @endforeach


                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        {{-- <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="cell-label">&nbsp;</th>
                                                                    <th>1 star</th>
                                                                    <th>2 stars</th>
                                                                    <th>3 stars</th>
                                                                    <th>4 stars</th>
                                                                    <th>5 stars</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="cell-label">Quality</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Price</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Value</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered --> --}}
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">

                                                    @guest
                                                    <div><b>To Submit Your Review, You Must Be Login! <a href="{{route('login')}}">Login now...</a></b></div>
                                                    @else
                                                    <div class="form-container">
                                                        <form class="cnt-form" action="{{ route('submit.review') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$details->id}}">
                                                            <div class="col-lg-12">
                                                                <div class="rating-css">
                                                                    <label>Stars <span class="astk">*</span></label>
                                                                    <div class="star-icon">
                                                                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                                        <label for="rating1" class="fa fa-star"></label>
                                                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                                                        <label for="rating2" class="fa fa-star"></label>
                                                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                                                        <label for="rating3" class="fa fa-star"></label>
                                                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                                                        <label for="rating4" class="fa fa-star"></label>
                                                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                                                        <label for="rating5" class="fa fa-star"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                            id="exampleInputSummary" name="summary">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span
                                                                                class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review"
                                                                            id="exampleInputReview" rows="4"
                                                                            name="comment"></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT
                                                                    REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                    @endguest

                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">{{__('masseges.Product Tags')}}</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">{{__('masseges.Add Your Tags')}}: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">{{__('masseges.ADD TAGS')}}</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">{{__('masseges.Related products')}}</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                            @forelse ($relatedProducts as $pro)
                            @php
                                $amount = $pro->selling_price - $pro->discount_price;
                                $discount = 100 - ($amount / $pro->selling_price) * 100;
                            @endphp
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a
                                                    href="{{ url('/product/' . $pro->product_slug_en . '/' . $pro->id) }}"><img
                                                        src="{{ asset($pro->product_thambnail) }}" alt=""></a>
                                            </div>
                                            <!-- /.image -->

                                            <div class="tag sale">
                                                <span>-{{ $pro->discount_price == null ? __('masseges.New') : round($discount) }}%</span>
                                            </div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a
                                                    href="{{ url('/product/' . $pro->product_slug_en . '/' . $pro->id) }}">{{ LaravelLocalization::getCurrentLocale() === 'ar' ? $pro->product_name_ar:$pro->product_name_en }}</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price">
                                                    ${{ $pro->selling_price }} </span> <span
                                                    class="price-before-discount"
                                                    style="color: rgb(126, 125, 125);display: {{ $amount == $pro->selling_price ? 'none' : '' }}">$
                                                    {{ $amount }}</span> </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"> <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn"
                                                            type="button">{{ __('masseges.Add to cart') }}</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                            href="detail.html" title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i
                                                                class="fa fa-signal" aria-hidden="true"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->
                        @empty
                            <h5 class="text-danger">{{ __('masseges.No Data Found') }}</h5>
                        @endforelse

                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
        </div>
    </div>

            @include('fontend.body.brand')
        @endsection

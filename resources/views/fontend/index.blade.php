@extends('fontend.home_master')

@section('title')
    {{ __('masseges.Home') }}
@endsection

@section('fontend')
    <!-- ============================================== SIDEBAR ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-3 sidebar"
        style="float: {{ LaravelLocalization::getCurrentLocale() === 'ar' ? 'right' : '' }} ">

@include('fontend.body.sidbar')
@php
$categories = App\Models\Category::select('id', 'category_name_' . LaravelLocalization::getCurrentLocale() . ' as catName', 'category_icon')->get();
@endphp


        <!-- ============================================== HOT DEALS ============================================== -->
        @include('fontend.product.hot_deals')
        <!-- ============================================== HOT DEALS: END ============================================== -->

        <!-- ============================================== SPECIAL OFFER ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">{{ __('masseges.Special Offer') }}</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                    <div class="item">
                        <div class="products special-product">
                            @foreach ($special_offers as $pro)
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ url('/product/' . $pro->proSlug . '/' . $pro->id) }}">
                                                            <img src="{{ asset($pro->product_thambnail) }}" alt=""> </a>
                                                    </div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a
                                                            href="{{ url('/product/' . $pro->proSlug . '/' . $pro->id) }}">{{ $pro->ProName }}</a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> <span class="price">
                                                            ${{ $pro->selling_price }} </span> </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL OFFER : END ============================================== -->
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        @include('fontend.product.product_tages')
        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
        <!-- ============================================== SPECIAL DEALS ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">{{ __('masseges.Special Deals') }}</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                    <div class="item">
                        <div class="products special-product">
                            @foreach ($special_deals as $pro)
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ url('/product/' . $pro->proSlug . '/' . $pro->id) }}">
                                                            <img src="{{ asset($pro->product_thambnail) }}" alt=""> </a>
                                                    </div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a
                                                            href="{{ url('/product/' . $pro->proSlug . '/' . $pro->id) }}">{{ $pro->ProName }}</a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> <span class="price">
                                                            ${{ $pro->selling_price }} </span> </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL DEALS : END ============================================== -->
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
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
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== NEWSLETTER: END ============================================== -->

        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
            <div id="advertisement" class="advertisement">
                <div class="item">
                    <div class="avatar"><img src="{{ asset('fontend/assets/images/testimonials/member1.png') }}"
                            alt="Image"></div>
                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                        condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">John Doe <span>Abc Company</span> </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="avatar"><img src="{{ asset('fontend/assets/images/testimonials/member3.png') }}"
                            alt="Image"></div>
                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                        condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                </div>
                <!-- /.item -->

                <div class="item">
                    <div class="avatar"><img src="{{ asset('fontend/assets/images/testimonials/member2.png') }}"
                            alt="Image"></div>
                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc
                        condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.item -->

            </div>
            <!-- /.owl-carousel -->
        </div>

        <!-- ============================================== Testimonials: END ============================================== -->

        <div class="home-banner"> <img src="{{ asset('fontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
        </div>
    </div>
    <!-- /.sidemenu-holder -->
    <!-- ============================================== SIDEBAR : END ============================================== -->

    <!-- ============================================== CONTENT ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION ??? HERO ========================================= -->

        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                @foreach ($sliders as $slider)
                    <div class="item" style="background-image: url({{ asset($slider->slider_image) }});">
                        <div class="container-fluid">
                            <div class="caption bg-color vertical-center text-left">
                                <div class="big-text fadeInDown-1"> {{ $slider->title }} </div>
                                <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span>
                                </div>
                                <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
                                        class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{ __('masseges.Shop Now') }}</a>
                                </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.item -->
                @endforeach

            </div>
            <!-- /.owl-carousel -->
        </div>

        <!-- ========================================= SECTION ??? HERO : END ========================================= -->

        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
                <div class="row">
                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">money back</h4>
                                </div>
                            </div>
                            <h6 class="text">30 Days Money Back Guarantee</h6>
                        </div>
                    </div>
                    <!-- .col -->

                    <div class="hidden-md col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">free shipping</h4>
                                </div>
                            </div>
                            <h6 class="text">Shipping on orders over $99</h6>
                        </div>
                    </div>
                    <!-- .col -->

                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="info-box-heading green">Special Sale</h4>
                                </div>
                            </div>
                            <h6 class="text">Extra $5 off on all items </h6>
                        </div>
                    </div>
                    <!-- .col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.info-boxes-inner -->

        </div>
        <!-- /.info-boxes -->
        <!-- ============================================== INFO BOXES : END ============================================== -->
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">{{ __('masseges.New Products') }}</h3>
                <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                    <li class="active"><a data-transition-type="backSlide" href="#all"
                            data-toggle="tab">{{ __('masseges.All') }}</a></li>
                    @foreach ($categories as $category)
                        <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                                data-toggle="tab">{{ $category->catName }}</a></li>
                    @endforeach
                </ul>
                <!-- /.nav-tabs -->
            </div>
            <div class="tab-content outer-top-xs">

                <div class="tab-pane in active" id="all">
                    <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                            @foreach ($products as $product)
                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = 100 - ($amount / $product->selling_price) * 100;

                                    $reviews = App\Models\Review::where('product_id',$product->id)
                                                    ->where('status',1)
                                                    ->latest()
                                                    ->get();

                                    if ($reviews->count() > 0) {
                                        $review_rate = $reviews->sum('product_rating') / $reviews->count();
                                    }
                                @endphp
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a
                                                        href="{{ url('/product/' . $product->proSlug . '/' . $product->id) }}"><img
                                                            src="{{ asset($product->product_thambnail) }}" alt=""></a>
                                                </div>
                                                <!-- /.image -->

                                                <div class="tag sale">
                                                    <span>-{{ $product->discount_price == null ? __('masseges.New') : round($discount) }}%</span>
                                                </div>
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a
                                                        href="{{ url('/product/' . $product->proSlug . '/' . $product->id) }}">{{ $product->ProName }}</a>
                                                </h3>
                                                <div class="rating">
                                                    @if ($reviews->count() != 0)
                                                        @for ($i = 1 ; $i <= number_format($review_rate); $i++)
                                                            <i class="fa fa-star" style="color: #ffe400"></i>
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
                                                <div class="description"></div>
                                                <div class="product-price"> <span class="price">
                                                        ${{ $product->selling_price }} </span> <span
                                                        class="price-before-discount"
                                                        style="color: rgb(126, 125, 125); display: {{ $amount == $product->selling_price ? 'none' : '' }}">$
                                                        {{ $amount }}</span> </div>
                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon"
                                                                type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i
                                                                    class="fa fa-shopping-cart"></i> </button>
                                                            <button class="btn btn-primary cart-btn"
                                                                type="button">{{ __('masseges.Add to cart') }}</button>
                                                        </li>
                                                        <li class="lnk wishlist">
                                                            <a data-toggle="tooltip" class="add-to-cart" title="" id="{{ $product->id }}" onclick="addToWhishlist(this.id)" data-original-title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li class="lnk"> <a data-toggle="tooltip"
                                                                class="add-to-cart" href="detail.html" title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                            @endforeach


                        </div>
                        <!-- /.home-owl-carousel -->
                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.tab-pane -->
                @foreach ($categories as $category)
                    <div class="tab-pane" id="category{{ $category->id }}">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                @php
                                    $pros = App\Models\Product::where('category_id', $category->id)
                                        ->where('status', 1)
                                        ->select('id', 'product_name_' . LaravelLocalization::getCurrentLocale() . ' as ProName', 'product_slug_' . LaravelLocalization::getCurrentLocale() . ' as proSlug', 'discount_price', 'product_thambnail', 'selling_price', 'category_id')
                                        ->get();
                                @endphp
                                @forelse ($pros as $pro)
                                    @php
                                        $amount = $pro->selling_price - $pro->discount_price;
                                        $discount = 100 - ($amount / $pro->selling_price) * 100;


                                    $reviews = App\Models\Review::where('product_id',$pro->id)
                                                    ->where('status',1)
                                                    ->latest()
                                                    ->get();

                                    if ($reviews->count() > 0) {
                                        $review_rate = $reviews->sum('product_rating') / $reviews->count();
                                    }
                                    @endphp
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ url('/product/' . $pro->proSlug . '/' . $pro->id) }}"><img
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
                                                            href="{{ url('/product/' . $pro->proSlug . '/' . $pro->id) }}">{{ $pro->ProName }}</a>
                                                    </h3>
                                                    <div class="rating">
                                                        @if ($reviews->count() != 0)
                                                            @for ($i = 1 ; $i <= number_format($review_rate); $i++)
                                                                <i class="fa fa-star" style="color: #ffe400"></i>
                                                            @endfor
                                                            @for ($j = number_format($review_rate)+1; $j <= 5; $j++ )
                                                                <i class="fa fa-star"></i>
                                                            @endfor

                                                        @else
                                                            @for ($i = 1; $i <= 5; $i++ )
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                        @endif

                                                    </div>                                                    <div class="description"></div>
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
                                                                <button class="btn btn-primary icon"
                                                                type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $pro->id }}" onclick="productView(this.id)"> <i
                                                                    class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">{{ __('masseges.Add to cart') }}</button>
                                                            </li>
                                                            <li class="lnk wishlist">
                                                                <a data-toggle="tooltip" class="add-to-cart" title="" id="{{ $pro->id }}" onclick="addToWhishlist(this.id)" data-original-title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>
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


                            </div>
                            <!-- /.home-owl-carousel -->
                        </div>
                        <!-- /.product-slider -->
                    </div>
                    <!-- /.tab-pane -->
                @endforeach
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============================================== SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive"
                                src="{{ asset('fontend/assets/images/banners/home-banner1.jpg') }}" alt=""> </div>
                    </div>
                    <!-- /.wide-banner -->
                </div>
                <!-- /.col -->
                <div class="col-md-5 col-sm-5">
                    <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive"
                                src="{{ asset('fontend/assets/images/banners/home-banner2.jpg') }}" alt=""> </div>
                    </div>
                    <!-- /.wide-banner -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.wide-banners -->

        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">{{ __('masseges.Featured products') }}</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                @foreach ($featureies as $featured)
                    @php
                        $amount = $featured->selling_price - $featured->discount_price;
                        $discount = 100 - ($amount / $featured->selling_price) * 100;
                        $reviews = App\Models\Review::where('product_id',$featured->id)
                                                    ->where('status',1)
                                                    ->latest()
                                                    ->get();

                                    if ($reviews->count() > 0) {
                                        $review_rate = $reviews->sum('product_rating') / $reviews->count();
                                    }


                    @endphp
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a
                                            href="{{ url('/product/' . $featured->proSlug . '/' . $featured->id) }}"><img
                                                src="{{ asset($featured->product_thambnail) }}" alt=""></a> </div>
                                    <!-- /.image -->

                                    <div class="tag hot">
                                        <span>-{{ $featured->discount_price == null ? __('masseges.New') : round($discount) }}%</span>
                                    </div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a
                                            href="{{ url('/product/' . $featured->proSlug . '/' . $featured->id) }}">{{ $featured->ProName }}</a>
                                    </h3>
                                    <div class="rating">
                                        @if ($reviews->count() != 0)
                                            @for ($i = 1 ; $i <= number_format($review_rate); $i++)
                                                <i class="fa fa-star" style="color: #ffe400"></i>
                                            @endfor
                                            @for ($j = number_format($review_rate)+1; $j <= 5; $j++ )
                                                <i class="fa fa-star"></i>
                                            @endfor

                                        @else
                                            @for ($i = 1; $i <= 5; $i++ )
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        @endif

                                    </div>                                     <div class="description"></div>
                                    <div class="product-price"> <span class="price"> $
                                            {{ $featured->selling_price }} </span> <span class="price-before-discount"
                                            style="color: rgb(126, 125, 125);display: {{ $amount == $featured->selling_price ? 'none' : '' }}">$
                                            {{ $amount }}</span> </div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon"
                                                type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $featured->id }}" onclick="productView(this.id)"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn"
                                                    type="button">{{ __('masseges.Add to cart') }}</button>
                                            </li>
                                            <li class="lnk wishlist">
                                                    <a data-toggle="tooltip" class="add-to-cart" title="" id="{{ $featured->id }}" onclick="addToWhishlist(this.id)" data-original-title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                            </li>

                                            <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                    title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                @endforeach

            </div>
            <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        <!-- ============================================== Skip_0 PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">
                {{ LaravelLocalization::getCurrentLocale() === 'ar'? $category_skip_0->category_name_ar: $category_skip_0->category_name_en }}
            </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                @foreach ($product_skip_0 as $featured)
                    @php
                        $amount = $featured->selling_price - $featured->discount_price;
                        $discount = 100 - ($amount / $featured->selling_price) * 100;

                        $reviews = App\Models\Review::where('product_id',$featured->id)
                                                    ->where('status',1)
                                                    ->latest()
                                                    ->get();

                                    if ($reviews->count() > 0) {
                                        $review_rate = $reviews->sum('product_rating') / $reviews->count();
                                    }
                    @endphp
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a
                                            href="{{ url('/product/' . $featured->product_slug_en . '/' . $featured->id) }}"><img
                                                src="{{ asset($featured->product_thambnail) }}" alt=""></a> </div>
                                    <!-- /.image -->

                                    <div class="tag hot">
                                        <span>-{{ $featured->discount_price == null ? __('masseges.New') : round($discount) }}%</span>
                                    </div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a
                                            href="{{ url('/product/' . $featured->product_slug_en . '/' . $featured->id) }}">{{ LaravelLocalization::getCurrentLocale() === 'ar' ? $featured->product_name_ar : $featured->product_name_en }}</a>
                                    </h3>
                                    <div class="rating">
                                        @if ($reviews->count() != 0)
                                            @for ($i = 1 ; $i <= number_format($review_rate); $i++)
                                                <i class="fa fa-star" style="color: #ffe400"></i>
                                            @endfor
                                            @for ($j = number_format($review_rate)+1; $j <= 5; $j++ )
                                                <i class="fa fa-star"></i>
                                            @endfor

                                        @else
                                            @for ($i = 1; $i <= 5; $i++ )
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        @endif

                                    </div>                                     <div class="description"></div>
                                    <div class="product-price"> <span class="price"> $
                                            {{ $featured->selling_price }} </span> <span class="price-before-discount"
                                            style="color: rgb(126, 125, 125);display: {{ $amount == $featured->selling_price ? 'none' : '' }}">$
                                            {{ $amount }}</span> </div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon"
                                                type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $featured->id }}" onclick="productView(this.id)"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn"
                                                    type="button">{{ __('masseges.Add to cart') }}</button>
                                            </li>
                                            <li class="lnk wishlist">
                                                <a data-toggle="tooltip" class="add-to-cart" title="" id="{{ $featured->id }}" onclick="addToWhishlist(this.id)" data-original-title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                    title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                @endforeach

            </div>
            <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->


        <!-- ============================================== Skip_0 PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">
                {{ LaravelLocalization::getCurrentLocale() === 'ar'? $category_skip_1->category_name_ar: $category_skip_1->category_name_en }}
            </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                @foreach ($product_skip_1 as $featured)
                    @php
                        $amount = $featured->selling_price - $featured->discount_price;
                        $discount = 100 - ($amount / $featured->selling_price) * 100;

                        $reviews = App\Models\Review::where('product_id',$featured->id)
                                                    ->where('status',1)
                                                    ->latest()
                                                    ->get();

                                    if ($reviews->count() > 0) {
                                        $review_rate = $reviews->sum('product_rating') / $reviews->count();
                                    }

                    @endphp
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a
                                            href="{{ url('/product/' . $featured->product_slug_en . '/' . $featured->id) }}"><img
                                                src="{{ asset($featured->product_thambnail) }}" alt=""></a> </div>
                                    <!-- /.image -->

                                    <div class="tag hot">
                                        <span>-{{ $featured->discount_price == null ? __('masseges.New') : round($discount) }}%</span>
                                    </div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a
                                            href="{{ url('/product/' . $featured->product_slug_en . '/' . $featured->id) }}">{{ LaravelLocalization::getCurrentLocale() === 'ar' ? $featured->product_name_ar : $featured->product_name_en }}</a>
                                    </h3>
                                    <div class="rating">
                                        @if ($reviews->count() != 0)
                                            @for ($i = 1 ; $i <= number_format($review_rate); $i++)
                                                <i class="fa fa-star" style="color: #ffe400"></i>
                                            @endfor
                                            @for ($j = number_format($review_rate)+1; $j <= 5; $j++ )
                                                <i class="fa fa-star"></i>
                                            @endfor

                                        @else
                                            @for ($i = 1; $i <= 5; $i++ )
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        @endif

                                    </div>                                     <div class="description"></div>
                                    <div class="product-price"> <span class="price"> $
                                            {{ $featured->selling_price }} </span> <span class="price-before-discount"
                                            style="color: rgb(126, 125, 125);display: {{ $amount == $featured->selling_price ? 'none' : '' }}">$
                                            {{ $amount }}</span> </div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon"
                                                type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $featured->id }}" onclick="productView(this.id)"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn"
                                                    type="button">{{ __('masseges.Add to cart') }}</button>
                                            </li>
                                            <li class="lnk wishlist">
                                                <a data-toggle="tooltip" class="add-to-cart" title="" id="{{ $featured->id }}" onclick="addToWhishlist(this.id)" data-original-title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                    title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                @endforeach

            </div>
            <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->


        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
                <div class="col-md-12">
                    <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive"
                                src="{{ asset('fontend/assets/images/banners/home-banner.jpg') }}" alt=""> </div>
                        <div class="strip strip-text">
                            <div class="strip-inner">
                                <h2 class="text-right">New Mens Fashion<br>
                                    <span class="shopping-needs">Save up to 40% off</span>
                                </h2>
                            </div>
                        </div>
                        <div class="new-label">
                            <div class="text">NEW</div>
                        </div>
                        <!-- /.new-label -->
                    </div>
                    <!-- /.wide-banner -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== Skip_0 PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">
                {{ LaravelLocalization::getCurrentLocale() === 'ar'? $brand_skip_1->brand_name_ar: $brand_skip_1->brand_name_en }}
            </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                @foreach ($brand_product_skip_1 as $featured)
                    @php
                        $amount = $featured->selling_price - $featured->discount_price;
                        $discount = 100 - ($amount / $featured->selling_price) * 100;

                        $reviews = App\Models\Review::where('product_id',$featured->id)
                                                    ->where('status',1)
                                                    ->latest()
                                                    ->get();

                                    if ($reviews->count() > 0) {
                                        $review_rate = $reviews->sum('product_rating') / $reviews->count();
                                    }

                    @endphp
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image"> <a
                                            href="{{ url('/product/' . $featured->product_slug_en . '/' . $featured->id) }}"><img
                                                src="{{ asset($featured->product_thambnail) }}" alt=""></a> </div>
                                    <!-- /.image -->

                                    <div class="tag hot">
                                        <span>-{{ $featured->discount_price == null ? __('masseges.New') : round($discount) }}%</span>
                                    </div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                    <h3 class="name"><a
                                            href="{{ url('/product/' . $featured->product_slug_en . '/' . $featured->id) }}">{{ LaravelLocalization::getCurrentLocale() === 'ar' ? $featured->product_name_ar : $featured->product_name_en }}</a>
                                    </h3>
                                    <div class="rating">
                                        @if ($reviews->count() != 0)
                                            @for ($i = 1 ; $i <= number_format($review_rate); $i++)
                                                <i class="fa fa-star" style="color: #ffe400"></i>
                                            @endfor
                                            @for ($j = number_format($review_rate)+1; $j <= 5; $j++ )
                                                <i class="fa fa-star"></i>
                                            @endfor

                                        @else
                                            @for ($i = 1; $i <= 5; $i++ )
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        @endif

                                    </div>                                     <div class="description"></div>
                                    <div class="product-price"> <span class="price"> $
                                            {{ $featured->selling_price }} </span> <span class="price-before-discount"
                                            style="color: rgb(126, 125, 125);display: {{ $amount == $featured->selling_price ? 'none' : '' }}">$
                                            {{ $amount }}</span> </div>
                                    <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon"
                                                type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $featured->id }}" onclick="productView(this.id)"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn"
                                                    type="button">{{ __('masseges.Add to cart') }}</button>
                                            </li>
                                            <li class="lnk wishlist">
                                                <a data-toggle="tooltip" class="add-to-cart" title="" id="{{ $featured->id }}" onclick="addToWhishlist(this.id)" data-original-title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                    title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
                @endforeach

            </div>
            <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->

        <!-- ============================================== BEST SELLER ============================================== -->

        <div class="best-deal wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">Best seller</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                    <div class="item">
                        <div class="products best-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a href="#"> <img
                                                            src="{{ asset('fontend/assets/images/products/p20.jpg') }}"
                                                            alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price"> $450.99 </span>
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a href="#"> <img
                                                            src="{{ asset('fontend/assets/images/products/p21.jpg') }}"
                                                            alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price"> $450.99 </span>
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products best-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a href="#"> <img
                                                            src="{{ asset('fontend/assets/images/products/p22.jpg') }}"
                                                            alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price"> $450.99 </span>
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a href="#"> <img
                                                            src="{{ asset('fontend/assets/images/products/p23.jpg') }}"
                                                            alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price"> $450.99 </span>
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products best-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a href="#"> <img
                                                            src="{{ asset('fontend/assets/images/products/p24.jpg') }}"
                                                            alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price"> $450.99 </span>
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a href="#"> <img
                                                            src="{{ asset('fontend/assets/images/products/p25.jpg') }}"
                                                            alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price"> $450.99 </span>
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products best-product">
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a href="#"> <img
                                                            src="{{ asset('fontend/assets/images/products/p26.jpg') }}"
                                                            alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price"> $450.99 </span>
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image"> <a href="#"> <img
                                                            src="{{ asset('fontend/assets/images/products/p27.jpg') }}"
                                                            alt=""> </a> </div>
                                                <!-- /.image -->

                                            </div>
                                            <!-- /.product-image -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price"> <span class="price"> $450.99 </span>
                                                </div>
                                                <!-- /.product-price -->

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.product-micro-row -->
                                </div>
                                <!-- /.product-micro -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== BEST SELLER : END ============================================== -->

        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">latest form blog</h3>
            <div class="blog-slider-container outer-top-xs">
                <div class="owl-carousel blog-slider custom-carousel">
                 @foreach ($posts as $post)
                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image"> <a href="{{ url($post->post_slug_en.'/'.$post->id) }}"><img
                                            src="{{ asset($post->post_image) }}" alt=""></a> </div>
                            </div>
                            <!-- /.blog-post-image -->

                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="{{ url($post->post_slug_en.'/'.$post->id) }}">{{ LaravelLocalization::getCurrentLocale() === 'en' ? $post->post_title_en : $post->post_title_ar }}</a>
                                </h3>
                                <span class="info">By Jone Doe &nbsp;|&nbsp; {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                <p class="text">
                                    {!! LaravelLocalization::getCurrentLocale() === 'en' ? Str::limit($post->post_details_en,200) : Str::limit($post->post_details_ar,200) !!}
                                </p>
                                <a href="{{ url($post->post_slug_en.'/'.$post->id) }}" class="lnk btn btn-primary">Read more</a>
                            </div>
                            <!-- /.blog-post-info -->

                        </div>
                        <!-- /.blog-post -->
                    </div>
                    <!-- /.item -->
                 @endforeach


                </div>
                <!-- /.owl-carousel -->
            </div>
            <!-- /.blog-slider-container -->
        </section>
        <!-- /.section -->
        <!-- ============================================== BLOG SLIDER : END ============================================== -->

        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
            <h3 class="section-title">New Arrivals</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="detail.html"><img
                                            src="{{ asset('fontend/assets/images/products/p19.jpg') }}" alt=""></a> </div>
                                <!-- /.image -->

                                <div class="tag new"><span>new</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"> <span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span> </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="detail.html"><img
                                            src="{{ asset('fontend/assets/images/products/p28.jpg') }}" alt=""></a> </div>
                                <!-- /.image -->

                                <div class="tag new"><span>new</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"> <span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span> </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="detail.html"><img
                                            src="{{ asset('fontend/assets/images/products/p30.jpg') }}" alt=""></a> </div>
                                <!-- /.image -->

                                <div class="tag hot"><span>hot</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"> <span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span> </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="detail.html"><img
                                            src="{{ asset('fontend/assets/images/products/p1.jpg') }}" alt=""></a> </div>
                                <!-- /.image -->

                                <div class="tag hot"><span>hot</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"> <span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span> </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="detail.html"><img
                                            src="{{ asset('fontend/assets/images/products/p2.jpg') }}" alt=""></a> </div>
                                <!-- /.image -->

                                <div class="tag sale"><span>sale</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"> <span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span> </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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

                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"> <a href="detail.html"><img
                                            src="{{ asset('fontend/assets/images/products/p3.jpg') }}" alt=""></a> </div>
                                <!-- /.image -->

                                <div class="tag sale"><span>sale</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"> <span class="price"> $450.99 </span> <span
                                        class="price-before-discount">$ 800</span> </div>
                                <!-- /.product-price -->

                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                                    class="fa fa-shopping-cart"></i> </button>
                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html"
                                                title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
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
            </div>
            <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

    </div>
    <!-- /.homebanner-holder -->
    <!-- ============================================== CONTENT : END ============================================== -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('fontend.body.brand')
@endsection

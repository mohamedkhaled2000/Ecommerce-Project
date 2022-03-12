@php
    $hot_deals = App\Models\Product::where('hot_deals',1)->where('discount_price','!=',null)
        ->select('id','product_name_'.LaravelLocalization::getCurrentLocale().' as ProName','product_slug_'.LaravelLocalization::getCurrentLocale().' as proSlug','discount_price','product_thambnail','selling_price','category_id')
        ->limit(3)->get();

@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">{{ __('masseges.hot deals') }}</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

        @foreach ($hot_deals as $pro)
            @php
                $amount = $pro->selling_price - $pro->discount_price;
                $discount = 100 - ($amount / $pro->selling_price) * 100;
            @endphp
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image"> <img src="{{ asset($pro->product_thambnail) }}" alt="">
                        </div>
                        <div class="sale-offer-tag">
                            <span>-{{ $pro->discount_price == null ? __('masseges.New') : round($discount) }}%<br>
                                off</span></div>
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box"> <span class="key">120</span> <span
                                        class="value">DAYS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="hour box"> <span class="key">20</span> <span
                                        class="value">HRS</span> </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="minutes box"> <span class="key">36</span> <span
                                        class="value">MINS</span> </div>
                            </div>
                            <div class="box-wrapper hidden-md">
                                <div class="seconds box"> <span class="key">60</span> <span
                                        class="value">SEC</span> </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a
                                href="{{ url('/product/' . $pro->proSlug . '/' . $pro->hashid) }}">{{ $pro->ProName }}</a>
                        </h3>
                        <div class="rating rateit-small"></div>
                        <div class="product-price"> <span class="price"> ${{ $pro->selling_price }}
                            </span> <span class="price-before-discount"
                                style="color: rgb(126, 125, 125);display: {{ $amount == $pro->selling_price ? 'none' : '' }}">${{ $amount }}</span>
                        </div>
                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn"
                                    type="button">{{ __('masseges.Add to cart') }}</button>
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach

    </div>
    <!-- /.sidebar-widget -->
</div>

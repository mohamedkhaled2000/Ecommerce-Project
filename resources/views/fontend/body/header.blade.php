<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
                    @if (Auth::guard('admin')->check())
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    @endif
                @auth
                    <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>{{__('masseges.Wishlist')}}</a></li>
                    <li><a href="" type="button" data-toggle="modal" data-target="#exampleModa5">
                        <i class="icon fa fa-check"></i>Track Order</a></li>
                @endauth
              <li><a href="{{ route('my_Cart') }}"><i class="icon fa fa-shopping-cart"></i>{{__('masseges.My Cart')}}</a></li>
              <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>{{__('masseges.Checkout')}}</a></li>
              <li>
                  @auth
                  <a href="{{ url('/dashboard') }}"><i class="icon fa fa-user"></i>{{ Auth::user()->name }}</a>
                  @else
                  <a href="{{ url('/login') }}"><i class="icon fa fa-lock"></i>{{__('masseges.Login/Regster')}}</a>
                  @endauth
                </li>
            </ul>
          </div>
          <!-- /.cnt-account -->

          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">{{ LaravelLocalization::getCurrentLocale() === 'ar' ? 'العربية' : 'English' }} </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <li>
                      <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                          {{ $properties['native'] }}
                      </a>
                  </li>
                @endforeach
                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled -->
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            @php
                $logo = App\Models\SiteSetting::first();
            @endphp
            <div class="logo"> <a href="{{ url('/') }}"> <img src="{{asset($logo->logo)}}" alt="logo"> </a> </div>
            <!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->

          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
            <!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form action="{{ route('product.search') }}" method="POST">
                @csrf
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">{{ __('masseges.Categories') }} <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                          @php
                              $categories = App\Models\Category::select('id','category_name_'.LaravelLocalization::getCurrentLocale().' as catName', 'category_slug_en')
                              ->get();
                          @endphp
                        @foreach ($categories as $category)
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('Category/'.$category->category_slug_en.'/'.$category->id)}}">
                                - {{ $category->catName }}</a></li>
                        @endforeach
                    </ul>
                    </li>
                  </ul>
                  <input class="search-field" name="search" onfocus="search_result_show()" onblur="search_result_hide()" placeholder="{{ __('masseges.Search here') }}" id="search" autocomplete="off"/>

                  <button class="search-button" type="submit" ></button> </div>

              </form>
                  <div class="body-box" id="searchresult" >

                  </div>

            </div>
            <!-- /.search-area -->
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->

          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id="miniQty"></span></div>
                <div class="total-price-basket"> <span class="lbl">{{ __('masseges.cart') }} -</span> <span class="total-price"> <span class="sign">$</span><span class="value" id="subTotal"></span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>

                  {{-- mini card --}}
                  <div id="mini_card">

                  </div>
                  {{-- end mini card --}}

                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total : </span ><span class='price'>$</span><span class='price' id="subTotal"></span> </div>
                    <div class="clearfix"></div>
                    <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">{{__('masseges.Checkout')}}</a> </div>
                  <!-- /.cart-total-->

                </li>
              </ul>
              <!-- /.dropdown-menu-->
            </div>
            <!-- /.dropdown-cart -->

            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw" style="float: {{ LaravelLocalization::getCurrentLocale() === 'ar' ? 'right' : '' }}"> <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{__('masseges.Home')}}</a> </li>

        @foreach ($categories as $category)

        <li class="dropdown yamm mega-menu" style="float: {{ LaravelLocalization::getCurrentLocale() === 'ar' ? 'right' : '' }}"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->catName }}</a>
        <ul class="dropdown-menu container">
            <li>
            <div class="yamm-content ">
                <div class="row">
                    @php
                        $subcategories = App\Models\SubCategory::where('category_id',$category->id)
                        ->select('id','subcategory_name_'.LaravelLocalization::getCurrentLocale().' as subcatName','subcategory_slug_en')
                        ->get();
                    @endphp
                @foreach ($subcategories as $sudcategory)

                <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                    <h2 class="title"><a href="{{url('subCategory/'.$sudcategory->subcategory_slug_en.'/'.$sudcategory->id)}}">{{ $sudcategory->subcatName }}</a></h2>
                    <ul class="links">
                        @php
                            $sub_subcategories = App\Models\SubSubCategory::where('subcategory_id',$sudcategory->id)->
                            select('id','sub_subcategory_name_'.LaravelLocalization::getCurrentLocale().' as sub_subcatName','sub_subcategory_slug_en')
                            ->get();
                        @endphp
                        @foreach ($sub_subcategories as $sub_subcategory)
                        <li><a href="{{url('sub_subCategory/'.$sub_subcategory->sub_subcategory_slug_en.'/'.$sub_subcategory->id)}}">{{ $sub_subcategory->sub_subcatName }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.col -->
                @endforeach

                <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{asset('fontend/assets/images/banners/top-menu-banner.jpg')}}" alt=""> </div>
                <!-- /.yamm-content -->
                </div>
            </div>
            </li>
        </ul>
        </li>
        @endforeach


                  <li class="dropdown  navbar-right special-menu" style="float: {{ LaravelLocalization::getCurrentLocale() === 'en' ? 'right' : 'left' }}"> <a href="#">{{__('masseges.Todays offer')}}</a> </li>
                  <li class="dropdown  navbar-right special-menu" style="float: {{ LaravelLocalization::getCurrentLocale() === 'en' ? 'right' : 'left' }}"> <a href="{{ route('user.blog') }}">{{__('masseges.Blog')}}</a> </li>
                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer -->
            </div>
            <!-- /.navbar-collapse -->

          </div>
          <!-- /.nav-bg-class -->
        </div>
        <!-- /.navbar-default -->
      </div>
      <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

  </header>


  <div class="modal fade" id="exampleModa5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tracking Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('order.tracking') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="e1">Invoice Number</label>
                <input type="text" name="invoice_no"  class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-danger">Track Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <style>

      .search-area{
           position: relative
      }
    #searchresult {
        position: absolute;
        top : 100%;
        left: 0;
        width: 100%;
        z-index: 1000;
        border-radius: 10px;
        background: #ffffff;
        margin-top: 10px

    }
    #searchresult li {
        padding: 20px
    }

  </style>

  

  <script>

    function search_result_show(){
        $('#searchresult').slideDown();
    }
    function search_result_hide(){
        $('#searchresult').slideUp();
    }
</script>
  <!-- ============================================== HEADER : END ============================================== -->


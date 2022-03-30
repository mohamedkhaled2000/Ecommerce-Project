@extends('fontend.home_master')

@section('title')
    {{-- {{ $categories->blog_category_en }} --}}
    Blog Category
@endsection

@section('fontend')
<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="{{ url('/') }}">{{__('masseges.Home')}}</a></li>
          <li class="active">Blog Category</li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.breadcrumb -->

  <div class="body-content">
    <div class="container">
      <div class="row">
        <div class="blog-page">
          <div class="col-md-9">

            @foreach ($posts as $post)
                <div class="blog-post wow fadeInUp">
                <a href="{{ url($post->post_slug_en.'/'.$post->id) }}"
                    ><img
                    class="img-responsive"
                    src="{{ asset($post->post_image) }}"
                    alt=""
                /></a>
                <h1>
                    <a href="blog-details.html"
                    >{{ LaravelLocalization::getCurrentLocale() === 'en' ? $post->post_title_en : $post->post_title_ar }}</a
                    >
                </h1>
                <span class="author">John Doe</span>
                <span class="review">6 Comments</span>
                <span class="date-time">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                <p>
                    {!! LaravelLocalization::getCurrentLocale() === 'en' ? Str::limit($post->post_details_en,400) : Str::limit($post->post_details_ar,400) !!}
                </p>
                <a href="{{ url($post->post_slug_en.'/'.$post->id) }}" class="btn btn-upper btn-primary read-more"
                    >read more</a
                >
                </div>
            @endforeach



            <div
              class="clearfix blog-pagination filters-container wow fadeInUp"
              style="
                padding: 0px;
                background: none;
                box-shadow: none;
                margin-top: 15px;
                border: none;
              "
            >
 
              <!-- /.text-right -->
            </div>
            <!-- /.filters-container -->
          </div>
          <div class="col-md-3 sidebar">
            <div class="sidebar-module-container">
              <div class="search-area outer-bottom-small">
                <form>
                  <div class="control-group">
                    <input
                      placeholder="Type to search"
                      class="search-field"
                    />
                    <a href="#" class="search-button"></a>
                  </div>
                </form>
              </div>

              <div class="home-banner outer-top-n outer-bottom-xs">
                <img src="{{asset('fontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image" />
              </div>
              <!-- ==============================================CATEGORY============================================== -->
              <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                <h3 class="section-title">{{__('masseges.Category')}}</h3>
                <div class="sidebar-widget-body m-t-10">
                  <div class="accordion">
                      <!-- /.accordion-heading -->
                      <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ url('blog/category/post/'.$category->id) }}">{{ LaravelLocalization::getCurrentLocale() === 'en' ? $category->blog_category_en : $category->blog_category_ar }}</a>
                            </li><br>
                        @endforeach
                        </ul>

                        <!-- /.accordion-inner -->
                      <!-- /.accordion-body -->
                    </div>
                    <!-- /.accordion-group -->
                    <!-- /.accordion-group -->
                  </div>
                  <!-- /.accordion -->
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== CATEGORY : END ============================================== -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

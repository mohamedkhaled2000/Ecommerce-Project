@php
    $tags_en = App\Models\Product::groupBy('product_tag_en')->select('product_tag_en')->get();
    $tags_ar = App\Models\Product::groupBy('product_tag_ar')->select('product_tag_ar')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">{{__('masseges.Product Tags')}}</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list">

            @if (LaravelLocalization::getCurrentLocale() === 'ar')
                @foreach ($tags_ar as $pro)
                <a class="item" title="Phone" href="{{ route('tage',$pro->product_tag_ar) }}">{{$pro->product_tag_ar}}</a>
                @endforeach
            @else
                @foreach ($tags_en as $pro)
                <a class="item" title="Phone" href="{{ route('tage',$pro->product_tag_en) }}">{{$pro->product_tag_en}}</a>
                @endforeach
            @endif


      <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
  <!-- /.sidebar-widget -->
</div>

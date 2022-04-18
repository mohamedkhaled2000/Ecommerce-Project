<ul>

    @if ($products->isEmpty())
        <h5 class="text-center text-danger">Product Not Found</h5>
    @else
        @foreach ($products as $product)
            <li>
                <a href="{{ url('/product/' . $product->product_slug_en . '/' . $product->id) }}">
                    <img src="{{  asset($product->product_thambnail) }}" width="30px">
                </a>
                <a href="{{ url('/product/' . $product->product_slug_en . '/' . $product->id) }}" style="margin-left: 10px">{{  $product->product_name_en }}</a> </li>
        @endforeach
    @endif

</ul>

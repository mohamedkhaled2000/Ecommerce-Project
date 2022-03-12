<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>
    @yield('title')
</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('fontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('fontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('fontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('fontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('fontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('fontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('fontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('fontend/assets/css/bootstrap-select.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('fontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
@include('fontend.body.header')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row">
        @yield('fontend')
      </div>
    </div>
</div>

@include('fontend.body.footer')
<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('fontend/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/echo.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/jquery.rateit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('fontend/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/scripts.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;

       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;

       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;

       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break;
    }
    @endif
   </script>

   <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong id="proName"></strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" id="PImg"  width="200px" height="200px">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">{{__('masseges.Product Price')}}: <strong>
                                $<span class="text-danger" id="price"></span>
                                <del id="disprice"></del>
                            </strong></li>
                            <li class="list-group-item">{{__('masseges.Product Code')}}: <strong id="code"></strong></li>
                            <li class="list-group-item">{{__('masseges.Category')}}: <strong id="category"></strong></li>
                            <li class="list-group-item">{{__('masseges.Brand')}}: <strong id="brand"></strong></li>
                            <li class="list-group-item">{{__('masseges.Stock')}}
                                <span id="stock" class="badge badge-pill badge-success" style="background: green"></span>
                                <span id="stockout" class="badge badge-pill badge-danger" style="background: red"></span>
                            </li>
                          </ul>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color">{{__('masseges.Select Color')}}</label>
                            <select class="form-control" id="color">
                            </select>
                        </div>
                        <div class="form-group" id="sizeArea">
                            <label for="size">{{__('masseges.Select Size')}}</label>
                            <select class="form-control" id="size">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty">{{__('masseges.Quantity')}}</label>
                            <input type="number" class="form-control" id="qty" value="1" min="1">
                        </div>

                        <input type="hidden" id="product_id">
                        <button type="submit" class="btn btn-primary" onclick="AddToCart()">{{__('masseges.Add to cart')}}</button>
                    </div>

                </div>
            </div>
            <div class="modal-footer">


            </div>
        </div>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function productView(id){
            $.ajax({
                type: 'GET',
                url: 'product/view/model/'+id,
                dataType: 'json',
                success: function(data){
                    $('#proName').text(data.product.product_name_en);
                    $('#code').text(data.product.product_code);
                    $('#category').text(data.product.category.category_name_en);
                    $('#brand').text(data.product.brand.brand_name_en);
                    $('#PImg').attr('src','/'+data.product.product_thambnail);
                    $('#PImg').attr('alt',data.product.product_name_en);

                    $('#product_id').val(id);
                    $('#qty').val(1);


                    $('#color').empty();
                    $('#size').empty();

                    if(data.product.discount_price == null){
                        $('#price').text(data.product.selling_price	);
                        $('#disprice').hide();
                    }else{
                        $('#price').text(data.product.selling_price);
                        $('#disprice').show();
                        $('#disprice').text(data.product.discount_price);
                    }

                    if(data.product.product_qty > 0){

                        $('#stock').text('');
                        $('#stockout').text('');
                        $('#stock').text('Avelable');

                    }else{

                        $('#stock').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Out Of Stock');
                    }

                    $.each(data.product_color_en,function(key,value){
                        $('#color').append('<option value="'+value+'">'+ value +'</option>');
                    });

                    $.each(data.product_size_en,function(key,value){
                        $('#size').append('<option value="'+value+'">'+ value +'</option>');
                    });

                    if(data.product_size_en == ""){
                        $('#sizeArea').hide();
                    }else{
                        $('#sizeArea').show();
                    }
                }
            });
        }  //// ///////  End Of Product Modal


        function AddToCart(){
            var product_name = $('#proName').text();
            var id           = $('#product_id').val();
            var color        = $('#color option:selected').text();
            var size         = $('#size option:selected').text();
            var quantity     = $('#qty').val();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    product_name:product_name,
                    color:color,
                    size:size,
                    quantity:quantity,
                },
                url: '/cart/data/store/'+id,
                success:function(data){
                    console.log(data);
                }
            });
        }



    </script>
</body>
</html>

@extends('admin.admin_master')


@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Product</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Edit Product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form action="{{ route('update.product',$products->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-12">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <!-- select -->
                                        <label>Brand</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="" >Select Brand</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : '' }} >{{ $brand->brand_name_en }}</option>
                                            @endforeach
                                        </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col-4 --}}


                            <div class="col-md-4">
                                <div class="form-group">
                                    <!-- select -->
                                        <label>Category</label>
                                        <select class="form-control" name="category_id">
                                            <option value="" >Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                            @endforeach
                                        </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div> {{-- end col-4 --}}


                            <div class="col-md-4">

                                <div class="form-group">
                                    <!-- select -->
                                        <label>SubCategory</label>
                                        <select class="form-control" name="subcategory_id">
                                            <option value="" >Select SubCategory</option>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $products->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
                                            @endforeach
                                        </select>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col-4 --}}

                        </div>


                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <!-- select -->
                                        <label>Sub-SubCategory</label>
                                        <select class="form-control" name="sub_subcategory_id" >
                                            <option value="" selected >Select Sub_Subcategory</option>
                                            @foreach ($subsubcategories as $sub_subcategory)
                                            <option value="{{ $sub_subcategory->id }}" {{ $sub_subcategory->id == $products->sub_subcategory_id ? 'selected' : '' }}>{{ $sub_subcategory->sub_subcategory_name_en }}</option>
                                            @endforeach
                                        </select>
                                    @error('sub_subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col-4 --}}


                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" value="{{ $products->product_name_en }}" data-validation-required-message="This field is required">
                                        @error('product_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> {{-- end col-4 --}}


                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Name AR <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_ar" class="form-control" value="{{ $products->product_name_ar }}" data-validation-required-message="This field is required">
                                        @error('product_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}

                        </div> {{-- end row 2 --}}


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" value="{{ $products->product_code }}" data-validation-required-message="This field is required">
                                        @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}


                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" value="{{ $products->product_qty }}" data-validation-required-message="This field is required">
                                        @error('product_qty')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> {{-- end col-4 --}}




                        </div> {{-- end row 3 --}}


                        <div class="row">

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Tag EN<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tag_en" data-role="tagsinput" value="{{ $products->product_tag_en }}" placeholder="add tags" />
                                        @error('product_tag_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Tag AR<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tag_ar" data-role="tagsinput" value="{{ $products->product_tag_ar }}" placeholder="add tags" />
                                        @error('product_tag_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size EN<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" value="{{ $products->product_size_en }}" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_size_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}






                        </div> {{-- end row 4 --}}


                        <div class="row">


                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size AR<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_ar" value="{{ $products->product_size_ar }}" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_size_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> {{-- end col-4 --}}

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Color EN<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $products->product_color_en }}" name="product_color_en" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_color_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color AR<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_ar" value="{{ $products->product_color_ar }}" data-role="tagsinput" placeholder="add tags" />
                                        @error('product_color_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}






                        </div> {{-- end row 5 --}}


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control" value="{{ $products->selling_price }}" data-validation-required-message="This field is required">
                                        @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> {{-- end col-4 --}}


                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Product Discount</h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}" data-validation-required-message="This field is required">
                                        @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}



                        </div> {{-- end row 6 --}}


                        <div class="row">


                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Product Short Desc EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_en" id="textarea" class="form-control" placeholder="Textarea text">{{ $products->short_desc_en }}</textarea>
                                        @error('short_desc_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Short Desc AR <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_ar" id="textarea" class="form-control" placeholder="Textarea text">{{ $products->short_desc_ar }}</textarea>
                                        @error('short_desc_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}



                        </div> {{-- end row 7--}}


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Product Long Desc EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_desc_en" rows="10" cols="80">
                                            {{ $products->long_desc_en }}</textarea>
                                        @error('long_desc_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Product Long Desc AR <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_desc_ar" rows="10" cols="80">
                                            {{ $products->long_desc_ar }}</textarea>
                                        @error('long_desc_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>{{-- end row 8--}}

                    </div>
                  </div>

                  <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $products->featured == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_4">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $products->special_deals == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_5">Special Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-info" value="Update Product">
                    </div>
                </form>



            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->



    {{-- //////////////////////// MUlti Images /////////////////////// --}}

    <section class="content">
        <div class="col-md-12">
            <div class="box bt-3 border-info">
              <div class="box-header">
                <h4 class="box-title">Product Images</h4>
              </div>

              <div class="box-body">

                <form action="{{ route('update.imageProduct') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @foreach ($multi_imag as $multi)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset($multi->photo_name) }}" alt="{{ $products->product_name_en }}"style="width: 150px;height:250px">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('delete.imageProduct',$multi->id) }}" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                    </h5>
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                            <input class="form-control" type="file" name="mulite_img[ {{ $multi->id }} ]" >
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-info" value="Update Image">
                    </div>
                </form>


              </div>
            </div>
          </div>
    </section>

        {{-- //////////////////////// thambnail Images /////////////////////// --}}
        <section class="content">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                  <div class="box-header">
                    <h4 class="box-title">Product thambnail Image</h4>
                  </div>

                  <div class="box-body">

                    <form action="{{ route('update.thambnailProduct',$products->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset($products->product_thambnail) }}" alt="{{ $products->product_name_en }}"style="width: 150px;height:250px">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                                <input class="form-control" type="file" name="product_thambnail" >
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Update Image">
                        </div>
                    </form>


                  </div>
                </div>
              </div>
        </section>

  </div>

  <script>
    $(document).ready(function(){
        $("select[name='category_id']").on('change',function(){
            var category_id = $(this).val();
            if(category_id){

                $.ajax({
                    url: "{{ url('category/subcategory/ajax') }}/" + category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        $("select[name='sub_subcategory_id']").html('');
                        var d = $("select[name='subcategory_id']").empty();
                        $.each(data,function(key,value){
                            $("select[name='subcategory_id']").append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
                        });
                    }
                });

            }else{
                alert('danger');
            }
        });



        $("select[name='subcategory_id']").on('change',function(){
            var subcategory_id = $(this).val();
            if(subcategory_id){

                $.ajax({
                    url: "{{ url('product/sub_subcategory/ajax') }}/" + subcategory_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        var d = $("select[name='sub_subcategory_id']").empty();
                        $.each(data,function(key,value){
                            $("select[name='sub_subcategory_id']").append('<option value="'+value.id+'">'+value.sub_subcategory_name_en+'</option>');
                        });
                    }
                });

            }else{
                alert('danger');
            }
        });


    });
</script>

<script>

    function mainThemURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script>

    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img style="border-radius: 50%"/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

    </script>

@endsection

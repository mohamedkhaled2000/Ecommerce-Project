@extends('admin.admin_master')


@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Add Blog Post</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Add</li>
                            <li class="breadcrumb-item active" aria-current="page">Post</li>
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
          <h4 class="box-title">Add Post</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">



                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-12">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- select -->
                                        <label>Category</label>
                                        <select class="form-control" name="category_id">
                                            <option value="" selected>Select Category</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->blog_category_en }}</option>
                                            @endforeach
                                        </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col-4 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Post title EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="post_title_en" class="form-control" required data-validation-required-message="This field is required">
                                        @error('post_title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> {{-- end col-4 --}}


                        </div> {{-- end row 1 --}}

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Post title AR <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="post_title_ar" class="form-control" required data-validation-required-message="This field is required">
                                        @error('post_title_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}


                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Post Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="post_image" class="form-control" required data-validation-required-message="This field is required" onchange="mainThemURL(this)">
                                        @error('post_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <br>
                                        <img src="" id="mainThmb" style="border-radius: 50%">
                                    </div>
                                </div>
                            </div> {{-- end col-4 --}}



                        </div> {{-- end row 2 --}}



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Post Details EN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="post_details_en" rows="10" cols="80">
                                          Enter Post Details EN.</textarea>
                                        @error('post_details_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Post Details AR <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="post_details_ar" rows="10" cols="80">
                                            Enter Post Details AR.</textarea>
                                        @error('post_details_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>{{-- end row 8--}}

                    </div>
                  </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-info" value="Add Post">
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
  </div>


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


@endsection

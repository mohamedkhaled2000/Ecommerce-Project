@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Blog Post</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Blog</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">

            {{-- Edit Brand --}}

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Post</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">

                                            <div class="form-group">
                                                <!-- select -->
                                                    <label>Category</label>
                                                    <select class="form-control" name="category_id">
                                                        <option value="" selected>Select Category</option>
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $post->category_id ? 'Selected':'' }}>{{ $item->blog_category_en }}</option>
                                                        @endforeach
                                                    </select>
                                                @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Post title EN</label>
                                                <input type="text" value="{{ $post->post_title_en }}" name="post_title_en" class="form-control" placeholder="Brand Name En">
                                            @error('post_title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                </div>


                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label>Post title AR</label>
                                                <input type="text" value="{{ $post->post_title_ar }}" name="post_title_ar" class="form-control" placeholder="Brand Name AR">
                                                @error('post_title_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>





                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Post Details EN <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea id="editor1" name="post_details_en" rows="10" cols="80">
                                                  {{ $post->post_details_en }}</textarea>
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
                                                    {{ $post->post_details_ar }}</textarea>
                                                @error('post_details_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>{{-- end row 8--}}

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- /.box-body -->
                </div>
            </div>

        </div>
    </section>


    <section class="content">
        <div class="col-md-12">
            <div class="box bt-3 border-info">
              <div class="box-header">
                <h4 class="box-title">Post Image</h4>
              </div>

              <div class="box-body">

                <form action="{{ route('update.image',$post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset($post->post_image) }}" alt="{{ $post->post_title_en }}"style="width: 250px;height:250px">
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                            <input class="form-control" type="hidden" value="{{ $post->post_image }}" name="old_image" >
                                            <input class="form-control" type="file" name="post_image" >
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

@endsection

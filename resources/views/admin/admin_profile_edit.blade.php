@extends('admin.admin_master')

@section('admin')
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edite Admin Profile</h4>
            </div>
            <!-- /.box-header -->
            <form class="form" action="{{ route('store.profile',$admin->id) }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>User Name</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                            </div>
                            <input type="text" name="name" value="{{ $admin->name }}" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-email"></i></span>
                            </div>
                            <input type="email" name="email" value="{{ $admin->email }}" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Profile Image</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-image"></i></span>
                            </div>
                            <input type="file" name="profile_image" id="image" class="form-control" placeholder="Photo">
                        </div>
                    </div>

                    <div class="form-group">
                        <img class="rounded-circle" id="showImage" style="width: 150px; height:150px; margin-left: 150px" src="{{ $admin->profile_photo_path == null ? url('upload/admin_images/no_image.jpg') : url('upload/admin_images/'.$admin->profile_photo_path) }}" alt="">
                    </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ url('admin/profile') }}" class="btn btn-rounded btn-warning btn-outline mr-1">
                        <i class="ti-trash"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                        <i class="ti-save-alt"></i> Update
                    </button>
                </div>
            </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection

@extends('admin.admin_master')

@section('admin')
<section class="content">
    <div class="row">

        <div class="col-lg-12 col-12">
            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Site Setting</h4>
            </div>
            <!-- /.box-header -->
            <form action="{{ route('site.update',$setting->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">

                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Change Logo</label>
                                <div class="input-group mb-3">
                                    <input type="file" id="imageLogo" name="logo" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <img id="showImageLogo" src="{{ asset($setting->logo) }}" alt="Logo">
                        </div>

                    </div> {{-- // row 1 --}}

                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Phone One</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-phone"></i></span>
                                    </div>
                                    <input type="text" name="phone_one" class="form-control" value="{{ $setting->phone_one }}">
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Phone Two</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-phone"></i></span>
                                    </div>
                                    <input type="text" name="phone_two" class="form-control" value="{{ $setting->phone_two }}">
                                </div>
                            </div>
                        </div>

                    </div> {{-- // row 2 --}}

                    <div class="row">

                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label>Company Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Company Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-name"></i></span>
                                    </div>
                                    <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}">
                                </div>
                            </div>
                        </div>

                    </div> {{-- // row 3 --}}

                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Company Address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-address"></i></span>
                                    </div>
                                    <input type="text" name="company_address" class="form-control" value="{{ $setting->company_address }}">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Facebook Link</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-facebook"></i></span>
                                    </div>
                                    <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
                                </div>
                            </div>
                        </div>

                    </div> {{-- // row 4 --}}

                    <div class="row">

                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label>Twitter Link</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-twitter"></i></span>
                                    </div>
                                    <input type="text" name="twitter" class="form-control" value="{{ $setting->twitter }}">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>LinkedIn Link</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-linkedin"></i></span>
                                    </div>
                                    <input type="text" name="linkedin" class="form-control" value="{{ $setting->linkedin }}">
                                </div>
                            </div>
                        </div>

                    </div> {{-- // row 5 --}}

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Youtube Link</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-youtube"></i></span>
                                    </div>
                                    <input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}">
                                </div>
                            </div>
                        </div>

                    </div>{{-- // row 6 --}}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
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
        $('#imageLogo').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImageLogo').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection

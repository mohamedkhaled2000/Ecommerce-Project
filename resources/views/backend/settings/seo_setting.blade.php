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
            <form action="{{ route('seo.update',$setting->id) }}" method="post">
                @csrf
                <div class="box-body">

                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="meta_title" class="form-control" value="{{ $setting->meta_title }}">
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Author</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="meta_author" class="form-control" value="{{ $setting->meta_author }}">
                                </div>
                            </div>
                        </div>

                    </div> {{-- // row 2 --}}

                    <div class="row">

                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label>Meta Keyword</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="meta_keyword" class="form-control" value="{{ $setting->meta_keyword }}">
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Meta Description</label>
                                <div class="input-group mb-3">
                                    <textarea name="meta_description" class="form-control" >{{ $setting->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div> {{-- // row 3 --}}

                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Google Analytics</label>
                                <div class="input-group mb-3">
                                    <textarea name="google_analytics" class="form-control">{{ $setting->google_analytics }}</textarea>
                                </div>
                            </div>
                        </div>


                    </div> {{-- // row 4 --}}

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

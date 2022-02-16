@extends('admin.admin_master')

@section('admin')
<section class="content">
    <div class="row">

        <div class="col-lg-12 col-12">
            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Admin Password</h4>
            </div>
            <!-- /.box-header -->
            <form action="{{ route('admin.updatePass') }}" method="post">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Current Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" id="current_password" name="current_pass" class="form-control" placeholder="Current Password">
                        </div>
                        @error('current_pass')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        @error('new_pass')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div>
                        @error('confirm_pass')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
@endsection

@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Coupon</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Coupon</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
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
                        <h3 class="box-title">Edit Coupon</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('coupon.update',$coupons->id) }}" method="post">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label>Coupon Name</label>
                                        <input type="text" value="{{ $coupons->coupon_name }}" name="coupon_name" class="form-control" placeholder="Brand Name En">
                                    @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Coupon Discount</label>
                                        <input type="text" value="{{ $coupons->coupon_discount }}" name="coupon_discount" class="form-control" placeholder="Brand Name AR">
                                        @error('coupon_discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Coupon Validity</label>
                                        <input type="date" value="{{ $coupons->coupon_validity }}" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                        @error('coupon_validity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Update Coupon
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
</div>

@endsection

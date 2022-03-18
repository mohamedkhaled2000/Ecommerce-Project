@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Coupons</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Coupon</li>
                            <li class="breadcrumb-item active" aria-current="page">All Coupons</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">

            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Coupon</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Coupon Discount</th>
                                        <th>Coupon Validity</th>
                                        <th>Coupon Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->coupon_name }}</td>
                                        <td>{{ $coupon->coupon_discount }}%</td>
                                        <td>{{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D,d F Y') }}</td>
                                        <td>
                                            @if ($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                <span class="badge badge-pill badge-success">Valid</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">InValid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('coupon.edit',$coupon->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{ route('coupon.delete',$coupon->id) }}" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Coupon Discount</th>
                                        <th>Coupon Validity</th>
                                        <th>Coupon Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            {{-- Add Brand --}}

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Coupons</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('coupon.store') }}" method="post">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label>Coupon Name</label>
                                        <input type="text"  name="coupon_name" class="form-control">
                                    @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Coupon Discount (%)</label>
                                        <input type="text" name="coupon_discount" class="form-control">
                                        @error('coupon_discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Coupon Validity</label>
                                        <input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                        @error('coupon_validity')
                                        <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Add Coupon
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

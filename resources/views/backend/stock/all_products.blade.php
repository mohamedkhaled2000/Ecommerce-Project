@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Stock Products</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Products</li>
                            <li class="breadcrumb-item active" aria-current="page">All Stock Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Stock Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product En</th>
                                        <th>Product Price</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td><img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name_en }}" style="width:60px;height:70px"></td>
                                        <td>{{ $product->product_name_en }}</td>
                                        <td>{{ $product->selling_price }} $</td>
                                        <td>
                                            @if ($product->discount_price == null)
                                            <span class="badge badge-pill badge-danger">No Discount</span>
                                            @else
                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = 100 - ($amount / $product->selling_price * 100);
                                                @endphp
                                                <span class="badge badge-pill badge-danger">{{ round( $discount) }}%</span>
                                            @endif
                                        </td>
                                        <td>
                                        @if ($product->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">InActive</span>
                                        @endif
                                        </td>
                                        <td>{{ $product->product_qty }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Product En</th>
                                        <th>Product Price</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Quantity</th>
                                        <th>Image</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
    </section>
</div>

@endsection

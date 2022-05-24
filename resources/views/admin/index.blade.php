@extends('admin.admin_master')

@section('admin')

@php

    $today = DB::table('orders')->where('order_date',date('d-m-y'))->sum('amount');
    $month = DB::table('orders')->where('order_month',date('F'))->sum('amount');
    $year = DB::table('orders')->where('order_year',date('Y'))->sum('amount');
    $products = DB::table('products')->whereProduct_qty(0)->get();
    $pending = DB::table('orders')->whereStatus('Pending')->get();
@endphp
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="fa fa-handshake-o"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Today's Orders</p>
                            <h3 class="text-white mb-0 font-weight-500">$ {{ number_format($today) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="fa fa-handshake-o"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Monlay Orders</p>
                            <h3 class="text-white mb-0 font-weight-500">$ {{ number_format($month) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="fa fa-handshake-o"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Yearly Orders</p>
                            <h3 class="text-white mb-0 font-weight-500">$ {{ number_format($year) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                            <h3 class="text-white mb-0 font-weight-500">{{count($pending)}} Order</h3>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            Out Of Stock Products
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 250px"><span class="text-white">Image</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Product Nmae</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Price</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">Product Code</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">Status</span></th>
                                        <th style="min-width: 120px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                <img src="{{ asset($item->product_thambnail) }}" width="80px">
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                {{ $item->product_name_en }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                {{ $item->selling_price }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                {{ $item->product_code }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-danger">
                                                Out Of Stock
                                            </span>
                                        </td>

                                        <td class="text-right">
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


@stop

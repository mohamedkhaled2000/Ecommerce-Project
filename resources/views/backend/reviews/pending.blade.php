@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Pending Review</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Review</li>
                            <li class="breadcrumb-item active" aria-current="page">Pending Review</li>
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
                        <h3 class="box-title">Pending Review</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Product</th>
                                        <th>Summary</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->user->name }}</td>
                                        <td>{{ $review->product->product_name_en }}</td>
                                        <td>{{ $review->summary }}</td>
                                        <td>{{ $review->comment }}</td>
                                        <td>
                                            @if ($review->status == 0)
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #490bda">Pending</span>
                                            @elseif ($review->status == 1)
                                                <span class="badge badge-pill badge-info"
                                                    style="background: #0bda15">Publish</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('approve.review',$review->id) }}">
                                             Approve
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Product</th>
                                        <th>Summary</th>
                                        <th>Comment</th>
                                        <th>Status</th>
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


        </div>
    </section>
</div>

@endsection

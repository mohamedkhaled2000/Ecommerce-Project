@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Blog Posts</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Blog</li>
                            <li class="breadcrumb-item active" aria-current="page">All Posts</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">

            <div class="col-md-12 col-sm-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Posts</h3>
                        <a href="{{ route('add.post') }}" class="btn btn-success" style="float: right">Add Post</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Post Category</th>
                                        <th>Post Image</th>
                                        <th>Post Title En</th>
                                        <th>Post Title AR</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $items)
                                    <tr>
                                        <td>{{ $items->category->blog_category_en }}</td>
                                        <td><img src="{{ asset($items->post_image) }}" height="60px"></td>
                                        <td>{{ $items->post_title_en }}</td>
                                        <td>{{ $items->post_title_ar }}</td>
                                        <td width="15%">
                                            <a class="btn btn-info" href="{{ route('edit.post',$items->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{ route('post.delete',$items->id) }}" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Post Category</th>
                                        <th>Post Image</th>
                                        <th>Post Title En</th>
                                        <th>Post Title AR</th>
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

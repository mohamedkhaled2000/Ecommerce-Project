@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Sliders</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Sliders</li>
                            <li class="breadcrumb-item active" aria-current="page">All Sliders</li>
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
                        <h3 class="box-title">All Sliders</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title EN</th>
                                        <th>Description EN</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <td><img src="{{ asset($slider->slider_image) }}" alt="" style="width:70px;height:40px"></td>
                                        <td>

                                            @if ($slider->title_en == null)
                                                <span class="badge badge-pill badge-danger">No Title</span>
                                            @else
                                                {{ $slider->title_en }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($slider->description_en == null)
                                                <span class="badge badge-pill badge-danger">No Description</span>
                                            @else
                                                {{ $slider->description_en }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($slider->status == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td width="25%">
                                            <a class="btn btn-info btn-sm" href="">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @if ($slider->status == 1)
                                            <a class="btn btn-danger btn-sm" href="{{ route('inactive.slider',$slider->id) }}" title="InActive">
                                                <i class="fa fa-arrow-down"></i>
                                            </a>
                                            @else
                                            <a class="btn btn-success btn-sm" href="{{ route('active.slider',$slider->id) }}" title="Active">
                                                <i class="fa fa-arrow-up"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title EN</th>
                                        <th>Description EN</th>
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

            {{-- Add Brand --}}

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label>Slider Title En</label>
                                        <input type="text"  name="title_en" class="form-control" >
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Title AR</label>
                                        <input type="text" name="title_ar" class="form-control" >
                                        @error('title_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Description EN</label>
                                        <input type="text" name="description_en" class="form-control" >
                                        @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Description AR</label>
                                        <input type="text" name="description_ar" class="form-control" >
                                        @error('description_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Image</label>
                                        <input type="file" name="slider_image" class="form-control">
                                        @error('slider_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <!-- select -->
                                            <label>SubCategory</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Add Slider
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

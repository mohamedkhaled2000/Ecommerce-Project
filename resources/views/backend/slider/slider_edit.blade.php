@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Slider</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Slider</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
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
                        <h3 class="box-title">Edit Slider</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('slider.update',$sliders->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label>Slider Title En</label>
                                        <input type="text"  name="title_en" class="form-control" value="{{ $sliders->title_en }}" >
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Title AR</label>
                                        <input type="text" name="title_ar" class="form-control" value="{{ $sliders->title_ar }}">
                                        @error('title_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Description EN</label>
                                        <input type="text" name="description_en" class="form-control" value="{{ $sliders->description_en}}">
                                        @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Slider Description AR</label>
                                        <input type="text" name="description_ar" class="form-control" value="{{ $sliders->description_ar }}">
                                        @error('description_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Slider Image</label>
                                                <input type="file" name="slider_image" class="form-control" value="{{ $sliders->slider_image }}">
                                                @error('slider_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ asset($sliders->slider_image ) }}" width="200px" height="100px">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- select -->
                                            <label>SubCategory</label>
                                            <select class="form-control" name="status">

                                                <option value="1" {{ $sliders->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $sliders->status == 0 ? 'selected' : '' }}>InActive</option>
                                            </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Update Slider
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

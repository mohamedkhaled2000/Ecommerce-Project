@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit SubCategory</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">SubCategory</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit SubCategories</li>
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
                        <h3 class="box-title">Edit SubCategory</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('subcategory.update',$subcategories->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label>SubCategory Name En</label>
                                        <input type="text" value="{{ $subcategories->subcategory_name_en }}" name="subcategory_name_en" class="form-control" placeholder="SubCategory Name En">
                                    @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>SubCategory Name AR</label>
                                        <input type="text" value="{{ $subcategories->subcategory_name_ar }}" name="subcategory_name_ar" class="form-control" placeholder="SubCategory Name AR">
                                        @error('subcategory_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <!-- select -->
                                            <label>Category</label>
                                            <select class="form-control" name="category_id">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $subcategories->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Update SubCategory
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

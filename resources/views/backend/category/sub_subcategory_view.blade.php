@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Sub->SubCategory</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Sub->SubCategory</li>
                            <li class="breadcrumb-item active" aria-current="page">All Sub->SubCategory</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">

            <div class="col-md-8 col-sm-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Sub->SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sub->SubCategory En</th>
                                        <th>Sub->SubCategory AR</th>
                                        <th>Category</th>
                                        <th>SubCategory</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subsubcategories as $sub_subcategory)
                                    <tr>
                                        <td>{{ $sub_subcategory->sub_subcategory_name_en }}</td>
                                        <td>{{ $sub_subcategory->sub_subcategory_name_ar }}</td>
                                        <td>{{ $sub_subcategory->category->category_name_en }}</td>
                                        <td>{{ $sub_subcategory->subcategory->subcategory_name_en }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('subsubcategory.edit',$sub_subcategory->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{ route('subsubcategory.delete',$sub_subcategory->id) }}" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sub->SubCategory En</th>
                                        <th>Sub->SubCategory AR</th>
                                        <th>Category</th>
                                        <th>SubCategory</th>
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

            <div class="col-md-4 col-sm-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Sub->SubCategory</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('subsubcategory.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label>Sub->SubCategory Name En</label>
                                        <input type="text"  name="sub_subcategory_name_en" class="form-control" placeholder="Sub->SubCategory Name En">
                                    @error('sub_subcategory_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sub->SubCategory Name AR</label>
                                        <input type="text" name="sub_subcategory_name_ar" class="form-control" placeholder="Sub->SubCategory Name AR">
                                        @error('sub_subcategory_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <!-- select -->
                                            <label>Category</label>
                                            <select class="form-control" name="category_id">
                                                <option value="" selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <!-- select -->
                                            <label>SubCategory</label>
                                            <select class="form-control" name="subcategory_id">
                                                <option value="" selected>Select SubCategory</option>
                                            </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Add Sub->SubCategory
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

<script>
    $(document).ready(function(){
        $("select[name='category_id']").on('change',function(){
            var category_id = $(this).val();
            if(category_id){

                $.ajax({
                    url: "{{ url('category/subcategory/ajax') }}/" + category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        var d = $("select[name='subcategory_id']").empty();
                        $.each(data,function(key,value){
                            $("select[name='subcategory_id']").append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
                        });
                    }
                });

            }else{
                alert('danger');
            }
        });
    });
</script>

@endsection

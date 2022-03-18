@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Shipping District</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Shipping District</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Shipping District</li>
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
                        <h3 class="box-title">Edit Shipping District</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('district.update',$districts->id) }}" method="post">
                                @csrf
                                <div>

                                    <div class="form-group">
                                        <!-- select -->
                                            <label>Shipping Divition Name</label>
                                            <select class="form-control" name="divition_id">
                                                @foreach ($divitions as $divition)
                                                <option value="{{ $divition->id }}" {{ $divition->id == $districts->divition_id ? 'selected' : '' }}>{{ $divition->shipping_name }}</option>
                                                @endforeach
                                            </select>
                                        @error('divition_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Shipping District Name</label>
                                        <input type="text" value="{{ $districts->district_name }}" name="district_name" class="form-control">
                                    @error('district_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Update
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

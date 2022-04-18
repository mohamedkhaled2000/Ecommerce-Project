@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Role</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Role</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
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
                        <h3 class="box-title">Edit Role</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                            <form action="{{ route('update.role',$role->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <hr>

                                <div class="row">
                                    @foreach (config('global.permission') as $name => $value)
                                    <div class="col-md-2">
                                        <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_{{$name}}" name="permission[]" value="{{ $name }}"
                                                            {{ in_array($name , $role->permission) ? 'checked' : '' }}
                                                        >
                                                        <label for="checkbox_{{$name}}">{{ $value }}</label>
                                                    </fieldset>
                                                </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                    </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>


        </div>
    </section>
</div>

@endsection

@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Shipping States</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Shipping States</li>
                            <li class="breadcrumb-item active" aria-current="page">All Shipping States</li>
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
                        <h3 class="box-title">All Shipping States</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Shipping Divition Name</th>
                                        <th>Shipping District Name</th>
                                        <th>Shipping States Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($states as $state)
                                    <tr>
                                        <td>{{ $state->division->shipping_name }}</td>
                                        <td>{{ $state->district->district_name }}</td>
                                        <td>{{ $state->state_name }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('state.edit',$state->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger" href="{{ route('state.delete',$state->id) }}" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Shipping Divition Name</th>
                                        <th>Shipping District Name</th>
                                        <th>Shipping States Name</th>
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
                        <h3 class="box-title">Add Shipping States</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('state.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <!-- select -->
                                        <label>Shipping Divition Name</label>
                                        <select class="form-control" name="divition_id">
                                            <option value="" selected>Select Divition</option>
                                            @foreach ($divitions as $divition)
                                            <option value="{{ $divition->id }}">{{ $divition->shipping_name }}</option>
                                            @endforeach
                                        </select>
                                    @error('divition_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <!-- select -->
                                        <label>Shipping District Name</label>
                                        <select class="form-control" name="district_id">
                                            <option value="" selected>Select District</option>
                                        </select>
                                    @error('district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label>Shipping states Name</label>
                                        <input type="text"  name="state_name" class="form-control">
                                    @error('state_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Add
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

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="divition_id"]').on('change', function(){
          var divition_id = $(this).val();
          if(divition_id) {
              $.ajax({
                  url: "{{  url('shipping-division/district/ajax') }}/"+divition_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                      $('select[name="state_id"]').empty();
                     var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

  });
  </script>
@endsection

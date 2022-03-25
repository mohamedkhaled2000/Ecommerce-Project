@extends('fontend.home_master')

@section('fontend')
<div class="body-cotent">
    <div class="container">
        <div class="row">

            @include('fontend.body.dash_sidbar')


            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3>Update <strong>{{ Auth::user()->name }}</strong> Password</h3>

                    <div class="card-body">


                        <form method="POST" action="{{ route('user.update.password') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Current Password</label>
                                <input type="password" class="form-control unicase-form-control text-input" id="current_password" name="current_password" >
                            @error('current_password')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password</label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" >
                                @error('password')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation " name="password_confirmation" >
                                @error('password_confirmation ')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                        </form>
                        <br><br>

                    </div>
                </div>
            </div>
</div>
</div>
</div>

@endsection

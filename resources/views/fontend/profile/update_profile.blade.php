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
                    <h3>Update <strong>{{ Auth::user()->name }}</strong> Profile</h3>

                    <div class="card-body">


                        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" value="{{ $user->email }}" required autofocus >
                            @error('email')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" value="{{ $user->name }}" required >
                                @error('name')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone" value="{{ $user->phone }}" required >
                                @error('phone')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Profile Image <span>*</span></label>
                                <input type="file" class="form-control unicase-form-control text-input" name="profile_photo_path" >
                                @error('phone')
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

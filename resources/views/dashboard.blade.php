
@extends('fontend.home_master')

@section('fontend')

<div class="body-cotent">
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <br>
                <img class="card-img-top rounded-circle" style="height: 150px; width:150px; border-radius:50% ;"
                src="{{ Auth::user()->profile_photo_path == null ? url('upload/admin_images/no_image.jpg') : url('upload/user_images/'.Auth::user()->profile_photo_path) }}" >
                <br><br>
                <ul class="list-group list-group-flush">
                    <li>
                        <a class="btn btn-primary btn-sm btn-block" href="{{ url('/') }}">Home</a>
                        <a class="btn btn-primary btn-sm btn-block" href="{{ route('user.profile') }}">Profile Update</a>
                        <a class="btn btn-primary btn-sm btn-block" href="{{ route('user.change.password') }}">Change Password</a>
                        <a class="btn btn-danger btn-sm btn-block" href="{{ route('user.logout') }}">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h3><span>Hi...</span><strong>{{ Auth::user()->name }} Welcom Back To Easy Shop</strong></h3>

            </div>


        </div>
    </div>
</div>

@endsection

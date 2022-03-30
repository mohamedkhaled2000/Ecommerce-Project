<div class="col-md-2">
    <br>
    <img class="card-img-top rounded-circle" style="height: 150px; width:150px; border-radius:50% ;"
    src="{{ Auth::user()->profile_photo_path == null ? url('upload/admin_images/no_image.jpg') : url('upload/user_images/'.Auth::user()->profile_photo_path) }}" >
    <br><br>
    <ul class="list-group list-group-flush">
        <li>
            <a class="btn btn-primary btn-sm btn-block" href="{{ url('/') }}">{{__('masseges.Home')}}</a>
            <a class="btn btn-primary btn-sm btn-block" href="{{ route('user.profile') }}">{{__('masseges.Profile Update')}}</a>
            <a class="btn btn-primary btn-sm btn-block" href="{{ route('user.change.password') }}">{{__('masseges.Change Password')}}</a>
            <a class="btn btn-primary btn-sm btn-block" href="{{ route('my.orders') }}">{{__('masseges.My Orders')}}</a>
            <a class="btn btn-primary btn-sm btn-block" href="{{ route('returned.orders') }}">{{__('masseges.Returned Orders')}}</a>
            <a class="btn btn-primary btn-sm btn-block" href="{{ route('canceled.orders') }}">{{__('masseges.Canceled Orders')}}</a>
            <a class="btn btn-danger btn-sm btn-block" href="{{ route('user.logout') }}">{{__('masseges.Logout')}}</a>
        </li>
    </ul>
</div>

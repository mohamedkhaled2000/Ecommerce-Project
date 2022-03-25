
@extends('fontend.home_master')

@section('fontend')

<div class="body-cotent">
    <div class="container">
        <div class="row">

            @include('fontend.body.dash_sidbar')

            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h3><span>Hi...</span><strong>{{ Auth::user()->name }} {{__('masseges.Welcom Back To Easy Shop')}}</strong></h3>

            </div>


        </div>
    </div>
</div>

@endsection

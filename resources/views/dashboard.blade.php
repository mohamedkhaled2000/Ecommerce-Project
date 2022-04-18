
@extends('fontend.home_master')

@section('title')
    My Profile
@endsection

@section('fontend')
@php
$dev = \DB::table('sessions')->where('user_id','!=',null)->where('user_id',Auth::id())->get();

@endphp
<div class="body-cotent">
    <div class="container">
        <div class="row">
            @include('fontend.body.dash_sidbar')


            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h3><span>Hi...</span><strong>{{ Auth::user()->name }} {{__('masseges.Welcom Back To Easy Shop')}}</strong></h3>
            </div>

            <div class="col-md-2">

            </div>

            <div class="col-md-8" style="margin-top: 25px">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">IP</th>
                        <th scope="col">Type Device</th>
                        <th scope="col">Type Browser</th>
                        <th scope="col">Last Seen</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dev as $bro)



                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $bro->ip_address }}</td>

                            @if(Browser::isDesktop())

                                    @if(Str::contains($bro->user_agent,'Windows'))
                                        <td>
                                            <svg fill="none" stroke-linecap="round" width="50px" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>Windows
                                            <span class="text-success"><b>This Device</b></span>
                                        </td>
                                    @elseif(Str::contains($bro->user_agent,'Mac'))
                                        <td>
                                            <svg fill="none" stroke-linecap="round" width="50px" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            Mac
                                            <span class="text-success"><b>This Device</b></span>
                                        </td>
                                        @elseif(Str::contains($bro->user_agent,'ios'))
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50px" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                                    <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                                </svg>
                                                ios
                                                <span class="text-success"><b>This Device</b></span>
                                            </td>
                                    @elseif(Str::contains($bro->user_agent,'Android'))
                                        <td>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50px" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                                <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                            </svg>
                                            Android
                                            <span class="text-success"><b>This Device</b></span>
                                        </td>
                                    @endif

                            @else


                                @if(Str::contains($bro->user_agent,'Windows'))
                                        <td>
                                            <svg fill="none" stroke-linecap="round" width="50px" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>Windows
                                        </td>
                                    @elseif(Str::contains($bro->user_agent,'Mac'))
                                        <td>
                                            <svg fill="none" stroke-linecap="round" width="50px" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            Mac
                                        </td>
                                        @elseif(Str::contains($bro->user_agent,'ios'))
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50px" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                                    <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                                </svg>
                                                ios
                                            </td>
                                    @elseif(Str::contains($bro->user_agent,'Android'))
                                        <td>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50px" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                                <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                            </svg>
                                            Android
                                        </td>
                                    @endif


                            @endif

                            @if(Str::contains($bro->user_agent,'Firefox'))
                                <td>Firefox</td>
                            @elseif(Str::contains($bro->user_agent,'Edg'))
                                <td>Edge</td>
                            @elseif(Str::contains($bro->user_agent,'OPR'))
                                <td>Opera</td>
                            @elseif(Str::contains($bro->user_agent,'Chrome'))
                                <td>Chrome</td>
                            @endif
                            <td>{{ \Carbon\Carbon::parse($bro->last_activity)->diffForHumans() }}</td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>

@endsection

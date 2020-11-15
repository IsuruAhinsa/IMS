@extends('layouts.app')

{{-- page title --}}
@section('title', 'Change Password')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if(Auth::user()->avatar)
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{ asset(Auth::user()->avatar) }}"
                                         alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{ asset('img/profile/avatar/default.png') }}"
                                         alt="User profile picture">
                                @endif
                            </div>

                            @if(Auth::user()->first_name && Auth::user()->last_name)
                                <h3 class="profile-username text-center">
                                    {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
                                </h3>
                            @endif

                            <p class="text-muted text-center">
                                {{ Auth::user()->email }}
                            </p>

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

                            @if(session()->has('success'))
                                <x-Alert type="success" :message="session()->get('success')"></x-Alert>
                            @endif

                            @include('forms.profile.password')

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

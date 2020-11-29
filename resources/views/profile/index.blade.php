@extends('layouts.app')

{{-- page title --}}
@section('title', 'Profile')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if(Auth::user()->image)
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{ asset('uploads/user/image/' . Auth::user()->image) }}"
                                         alt="{{ Auth::user()->image }}">
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

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>

                            <a href="{{ route('show.password') }}" class="btn bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }} btn-block"><b>Change Password</b></a>
                        </div>

                    </div>

                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>

                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>

                    </div>

                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body p-5">

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

                            @if(session()->has('success'))
                                <x-Alert type="success" :message="session()->get('success')"></x-Alert>
                            @endif

                            @include('forms.users.create', [
                                "route" => route('profile.update'),
                                "firstnameVal" => Auth::user()->first_name,
                                "lastnameVal" => Auth::user()->last_name,
                                "emailVal" => Auth::user()->email,
                                "phoneVal" => Auth::user()->phone,
                                "websiteVal" => Auth::user()->website,
                                "addressVal" => Auth::user()->address,
                                "cityVal" => Auth::user()->city,
                                "stateVal" => Auth::user()->state,
                                "zipVal" => Auth::user()->zip,
                                "countryVal" => Auth::user()->country,
                                "notesVal" => Auth::user()->notes,
                                "imageVal" => Auth::user()->image,
                                "btnText" => "Save Profile",
                            ])

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection

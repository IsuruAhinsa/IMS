@extends('layouts.app')

{{-- page title --}}
@section('title', 'Create User')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-user-tag mr-2"></i>
                        View User
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">View User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="container">

            <div class="row d-flex justify-content-center">

                <div class="col-md-10">

                    <div class="card bg-light card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">

                        <div class="card-header text-muted border-bottom-0">
                            Administrator
                        </div>

                        <div class="card-body pt-0">

                            <div class="row">

                                <div class="col-7">

                                    @if($user->first_name && $user->last_name)
                                        <h2 class="lead">
                                            <i class="far fa-user-circle mr-2"></i>
                                            <b>{{ $user->first_name . " " . $user->last_name }}</b> <br>
                                        </h2>
                                    @endif

                                    <p class="text-muted text-sm">
                                        <b>Registered At: </b>
                                        {{ $user->created_at }}
                                    </p>

                                    <ul class="ml-4 mb-0 fa-ul text-muted">

                                        @if($user->email)
                                            <li>
                                                <span class="fa-li">
                                                    <i class="far fa-envelope mr-2"></i>
                                                </span>
                                                {{ $user->email }}
                                            </li>
                                        @endif

                                        @if($user->phone)
                                            <li>
                                                <span class="fa-li">
                                                    <i class="fas fa-mobile-alt mr-2"></i>
                                                </span>
                                                {{ $user->phone }}
                                            </li>
                                        @endif

                                        @if($user->address && $user->city && $user->state && $user->zip && $user->country)
                                            <li>
                                                <span class="fa-li">
                                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                                </span>
                                                {{ $user->address . ", " . $user->city . ", " . $user->state . ", " . $user->zip . ", " . $user->country  }}
                                            </li>
                                        @endif

                                        @if($user->website)
                                            <li>
                                                <span class="fa-li">
                                                    <i class="fas fa-globe mr-2"></i>
                                                </span>
                                                {{ $user->website }}
                                            </li>
                                        @endif

                                        @if($user->notes)
                                            <li>
                                                <span class="fa-li">
                                                    <i class="fas fa-newspaper mr-2"></i>
                                                </span>
                                                {{ $user->notes }}
                                            </li>
                                        @endif

                                    </ul>

                                </div>

                                <div class="col-5 text-center">
                                    <img src="{{ asset('uploads/user/image/'.$user->image) }}" alt="" class="img-circle img-fluid">
                                </div>

                            </div>

                        </div>

                        <div class="card-footer">

                            <div class="text-right">

                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-flat btn-sm btn-outline-primary">
                                    <i class="fas fa-pencil-alt mr-2"></i> Edit User
                                </a>

                                <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-flat btn-sm btn-outline-danger">
                                    <i class="fas fa-trash mr-2"></i> Delete User
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

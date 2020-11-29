@extends('layouts.app')

{{-- page title --}}
@section('title', 'Edit User')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-user-edit mr-2"></i>
                        Edit User
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card card-{{ $commonSetting->skin ? $commonSetting->skin : 'primary' }} card-outline">
                        <div class="card-body p-5">

                            @include('forms.users.create', [
                               "route" => route('users.update', [$user->id]),
                               "firstnameVal" => $user->first_name,
                               "lastnameVal" => $user->last_name,
                               "emailVal" => $user->email,
                               "phoneVal" => $user->phone,
                               "websiteVal" => $user->website,
                               "addressVal" => $user->address,
                               "cityVal" => $user->city,
                               "stateVal" => $user->state,
                               "zipVal" => $user->zip,
                               "countryVal" => $user->country,
                               "notesVal" => $user->notes,
                               "avatarVal" => $user->avatar,
                               "btnText" => "Update User",
                           ])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

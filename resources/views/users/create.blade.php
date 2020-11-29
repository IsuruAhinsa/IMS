@extends('layouts.app')

{{-- page title --}}
@section('title', 'Create User')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-user-plus mr-2"></i>
                        Create User
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create User</li>
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
                               "route" => route('users.store'),
                               "firstnameVal" => old('first_name'),
                               "lastnameVal" => old('last_name'),
                               "emailVal" => old('email'),
                               "phoneVal" => old('phone'),
                               "websiteVal" => old('website'),
                               "addressVal" => old('address'),
                               "cityVal" => old('city'),
                               "stateVal" => old('state'),
                               "zipVal" => old('zip'),
                               "countryVal" => old('country'),
                               "notesVal" => old('notes'),
                               "avatarVal" => old('avatar'),
                               "btnText" => "Create User",
                           ])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

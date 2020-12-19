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
                        <i class="fas fa-user-plus mr-2"></i>
                        Create User
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Create User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">

                        <div class="card-header">
                            <i class="fas fa-user-plus mr-2"></i>
                            Create New User
                        </div>

                        <div class="card-body p-5">

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

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
                               "imageVal" => old('image'),
                               "btnText" => "Create User",
                           ])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

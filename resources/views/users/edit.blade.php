@extends('layouts.app')

{{-- page title --}}
@section('title', 'Edit User')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-user-edit mr-2"></i>
                        Edit User
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
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
                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">
                        <div class="card-header">
                            <i class="fas fa-user-edit mr-2"></i>
                            Edit User
                        </div>
                        <div class="card-body p-5">

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

                            @include('forms.users.create', [
                               "route" => route('users.update', [$user->id]),
                               "firstnameVal" => $user->first_name ? $user->first_name : old('first_name'),
                               "lastnameVal" => $user->last_name ? $user->last_name : old('last_name'),
                               "emailVal" => $user->email ? $user->email : old('email'),
                               "phoneVal" => $user->phone ? $user->phone : old('phone'),
                               "websiteVal" => $user->website ? $user->website : old('website'),
                               "addressVal" => $user->address ? $user->address : old('address'),
                               "cityVal" => $user->city ? $user->city : old('city'),
                               "stateVal" => $user->state ? $user->state : old('state'),
                               "zipVal" => $user->zip ? $user->zip : old('zip'),
                               "countryVal" => $user->country ? $user->country : old('country'),
                               "notesVal" => $user->notes ? $user->notes : old('notes'),
                               "imageVal" => $user->image ? $user->image : old('image'),
                               "btnText" => "Update User",
                           ])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

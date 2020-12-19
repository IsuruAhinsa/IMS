@extends('layouts.app')

{{-- page title --}}
@section('title', 'Edit Role')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-user-shield mr-2"></i>
                        Edit Role - {{ $role->name }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Edit Role - {{ $role->name }}</li>
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
                        <div class="card-body p-5">

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

                            @include('forms.roles.create', [
                               "route" => route('roles.update', $role->id),
                               "nameVal" => $role->name,
                               "btnText" => "Update Role",
                           ])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

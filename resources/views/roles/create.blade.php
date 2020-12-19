@extends('layouts.app')

{{-- page title --}}
@section('title', 'Create Role')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-user-plus mr-2"></i>
                        Create Role
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Role</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">
                        <div class="card-body p-5">

                            @include('forms.roles.create', [
                               "route" => route('roles.store'),
                               "nameVal" => old('role'),
                               "btnText" => "Save Role",
                           ])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

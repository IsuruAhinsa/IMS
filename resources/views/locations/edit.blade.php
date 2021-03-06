@extends('layouts.app')

{{-- page title --}}
@section('title', 'Edit Location')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-location-arrow mr-2"></i>
                        Edit Location
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('locations.index') }}">Locations</a></li>
                        <li class="breadcrumb-item active">Edit Location</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">

                        <div class="card-header">
                            <i class="fas fa-location-arrow mr-2"></i>
                            Edit Location
                            <div class="badge bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}">{{ $location->location_id }}</div>
                        </div>

                        <div class="card-body p-5">

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

                            @include('forms.locations.create', [
                                'route' => route('locations.update', $location->location_id),
                                'btnText' => 'Update Location',
                            ])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

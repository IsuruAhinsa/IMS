@extends('layouts.app')

{{-- page title --}}
@section('title', 'Locations')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-location-arrow mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Locations' : 'Deleted Locations' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('locations.index') }}">Locations</a></li>
                            <li class="breadcrumb-item active">Deleted Locations</li>
                        @else
                            <li class="breadcrumb-item active">Locations</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">
                        <div class="card-body">

                            <div class="text-right mb-2">

                                @if(request('status') == 'deleted')

                                    <a href="{{ route('locations.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Locations</a>

                                @else

                                    <a href="{{ route('locations.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Locations</a>

                                @endif

                                <a href="{{ route('locations.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Location</a>

                            </div>

                            @if(session()->has('success'))
                                <x-Alert type="success" :message="session()->get('success')"></x-Alert>
                            @endif

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

                            <table id="example" class="table table-sm table-hover table-borderless" style="width:100%">
                                <thead>
                                <tr>
                                    <th>
                                        <i class="fas fa-search-location text-primary mr-2"></i>
                                        Location Code
                                    </th>
                                    <th>
                                        <i class="fas fa-sticky-note text-primary mr-2"></i>
                                        Description
                                    </th>
                                    <th>
                                        <i class="fas fa-barcode text-primary mr-2"></i>
                                        Assets
                                    </th>
                                    <th class="text-center">
                                        <i class="fas fa-ellipsis-v text-primary mr-2"></i>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($locations as $location)
                                    <tr>
                                        <td>{{ $location->first_name ? $location->first_name : '-' }}</td>
                                        <td>{{ $location->first_name ? $location->first_name : '-' }}</td>
                                        <td>{{ $location->last_name ? $location->last_name : '-' }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('locations.show', $location->id)"
                                                :editRoute="route('locations.edit', $location->id)"
                                                :deleteRoute="route('locations.destroy', $location->id)"
                                                :forceDeleteRoute="route('locations.fdelete', $location->id)"
                                                :restoreRoute="route('locations.restore', $location->id)"
                                            ></x-ActionButtonGroup>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@extends('layouts.app')

{{-- page title --}}
@section('title', 'Hospitals')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-hospital-symbol mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Hospitals' : 'Deleted Hospitals' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('hospitals.index') }}">Hospitals</a></li>
                            <li class="breadcrumb-item active">Deleted Hospitals</li>
                        @else
                            <li class="breadcrumb-item active">Hospitals</li>
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

                                    <a href="{{ route('hospitals.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Hospitals</a>

                                @else

                                    <a href="{{ route('hospitals.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Hospitals</a>

                                @endif

                                <a href="{{ route('hospitals.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Hospital</a>

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
                                        <i class="fas fa-sort-numeric-down text-primary mr-2"></i>
                                        ID
                                    </th>
                                    <th>
                                        Code
                                    </th>
                                    <th>
                                        <i class="fas fa-signature text-primary mr-2"></i>
                                        Name
                                    </th>
                                    <th>
                                        Region
                                    </th>
                                    <th>
                                        <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                                        Address
                                    </th>
                                    <th>
                                        <i class="fas fa-phone text-primary mr-2"></i>
                                        Telephone
                                    </th>
                                    <th>
                                        <i class="fas fa-fax text-primary mr-2"></i>
                                        Fax
                                    </th>
                                    <th>
                                        <i class="fas fa-envelope text-primary mr-2"></i>
                                        Email
                                    </th>
                                    <th>
                                        WO Prefix
                                    </th>
                                    <th>
                                        WOCM SL No
                                    </th>
                                    <th>
                                        WOPM SL No
                                    </th>
                                    <th>
                                        Hospital Code Prefix
                                    </th>
                                    <th class="text-center">
                                        <i class="fas fa-ellipsis-v text-primary mr-2"></i>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hospitals as $hospital)
                                    <tr>
                                        <td>{{ $hospital->hospital_id ? $hospital->hospital_id : '-' }}</td>
                                        <td>{{ $hospital->hospital_code ? $hospital->hospital_code : '-' }}</td>
                                        <td>{{ $hospital->hospital_name ? $hospital->hospital_name : '-' }}</td>
                                        <td>{{ $hospital->region ? $hospital->region : '-' }}</td>
                                        <td>{{ $hospital->address ? $hospital->address : '-' }}</td>
                                        <td>{{ $hospital->telephone ? $hospital->telephone : '-' }}</td>
                                        <td>{{ $hospital->fax ? $hospital->fax : '-' }}</td>
                                        <td>{{ $hospital->email ? $hospital->email : '-' }}</td>
                                        <td>{{ $hospital->wo_prefix ? $hospital->wo_prefix : '-' }}</td>
                                        <td>{{ $hospital->wocm_slno ? $hospital->wocm_slno : '-' }}</td>
                                        <td>{{ $hospital->wopm_slno ? $hospital->wopm_slno : '-' }}</td>
                                        <td>{{ $hospital->hospital_code_prefix ? $hospital->hospital_code_prefix : '-' }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('hospitals.show', $hospital->hospital_id)"
                                                :editRoute="route('hospitals.edit', $hospital->hospital_id)"
                                                :deleteRoute="route('hospitals.destroy', $hospital->hospital_id)"
                                                :forceDeleteRoute="route('hospitals.fdelete', $hospital->hospital_id)"
                                                :restoreRoute="route('hospitals.restore', $hospital->hospital_id)"
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

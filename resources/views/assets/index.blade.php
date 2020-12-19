@extends('layouts.app')

{{-- page title --}}
@section('title', 'Assets')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-barcode mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Assets' : 'Deleted Assets' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('assets.index') }}">Assets</a></li>
                            <li class="breadcrumb-item active">Deleted Assets</li>
                        @else
                            <li class="breadcrumb-item active">Assets</li>
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

                                    <a href="{{ route('assets.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Assets</a>

                                @else

                                    <a href="{{ route('assets.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Assets</a>

                                @endif

                                <a href="{{ route('assets.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Asset</a>

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
                                        Asset Id
                                    </th>
                                    <th>
                                        <i class="fas fa-copyright text-primary mr-2"></i>
                                        Brand
                                    </th>
                                    <th>
                                        Model
                                    </th>
                                    <th>
                                        <i class="fas fa-barcode text-primary mr-2"></i>
                                        Serial No
                                    </th>
                                    <th>
                                        <i class="fas fa-dollar-sign text-primary mr-2"></i>
                                        Cost
                                    </th>
                                    <th>
                                        Variation
                                    </th>
                                    <th>
                                        Contract
                                    </th>
                                    <th>
                                        Asset Condition
                                    </th>
                                    <th>
                                        <i class="far fa-sticky-note text-primary mr-2"></i>
                                        Description
                                    </th>
                                    <th>
                                        <i class="far fa-images text-primary mr-2"></i>
                                        Photos
                                    </th>
                                    <th class="text-center">
                                        <i class="fas fa-ellipsis-v text-primary mr-2"></i>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assets as $asset)
                                    <tr>
                                        <td>{{ $asset->first_name ? $asset->first_name : '-' }}</td>
                                        <td>{{ $asset->first_name ? $asset->first_name : '-' }}</td>
                                        <td>{{ $asset->last_name ? $asset->last_name : '-' }}</td>
                                        <td>{{ $asset->email ? $asset->email : '-' }}</td>
                                        <td>{{ $asset->phone ? $asset->phone : '-' }}</td>
                                        <td>{{ $asset->website ? $asset->website : '-' }}</td>
                                        <td>{{ $asset->getFullAddress() ? $asset->getFullAddress() : '-' }}</td>
                                        <td></td>
                                        <td>
                                            @foreach($asset->roles as $role)
                                                <span class="badge bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $asset->created_at->toDateString() }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('assets.show', $asset->id)"
                                                :editRoute="route('assets.edit', $asset->id)"
                                                :deleteRoute="route('assets.destroy', $asset->id)"
                                                :forceDeleteRoute="route('assets.fdelete', $asset->id)"
                                                :restoreRoute="route('assets.restore', $asset->id)"
                                            ></x-ActionButtonGroup>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            @if(request('status') != 'deleted')
                                <div class="text-right font-weight-bold mt-3 p-2 bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}">
                                    Total Assets Cost : 0.00
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

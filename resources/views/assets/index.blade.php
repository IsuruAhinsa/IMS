@extends('layouts.app')

{{-- page title --}}
@section('title', 'Assets')

@push('css')

    <style>

        .table > tbody > tr > td {
            vertical-align: middle;
        }

    </style>

@endpush

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
                                        Purchase Date
                                    </th>
                                    <th>
                                        Warranty Period
                                    </th>
                                    <th>
                                        Warranty End
                                    </th>
                                    <th>
                                        Warranty Status
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
                                        Remarks
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
                                        <td>{{ $asset->asset_id ? $asset->asset_id : '-' }}</td>
                                        <td>{{ $asset->brand ? $asset->brand : '-' }}</td>
                                        <td>{{ $asset->model ? $asset->model : '-' }}</td>
                                        <td>{{ $asset->serial_no ? $asset->serial_no : '-' }}</td>
                                        <td>{{ $asset->purchase_date ? $asset->purchase_date->toDateString() : '-' }}</td>
                                        <td>{{ $asset->warranty_period ? $asset->warranty_period : '-' }}</td>
                                        <td>{{ $asset->warranty_end ? $asset->warranty_end->toDateString() : '-' }}</td>
                                        <td>{{ $asset->warranty_status ? $asset->warranty_status : '-' }}</td>
                                        <td>{{ $asset->cost ? $asset->cost : '-' }}</td>
                                        <td>{{ $asset->variation ? $asset->variation : '-' }}</td>
                                        <td>{{ $asset->contract ? $asset->contract : '-' }}</td>
                                        <td>{{ $asset->asset_condition ? $asset->asset_condition : '-' }}</td>
                                        <td>{{ $asset->remarks ? $asset->remarks : '-' }}</td>
                                        <td>{{ $asset->description ? $asset->description : '-' }}</td>
                                        <td>
                                            @foreach ($asset->images as $image)
                                                <img class="img-fluid m-1" width="50" src="{{ asset('uploads/assets/image/'.$image->image) }}" alt="{{ $image->image }}">
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('assets.show', $asset->asset_id)"
                                                :editRoute="route('assets.edit', $asset->asset_id)"
                                                :deleteRoute="route('assets.destroy', $asset->asset_id)"
                                                :forceDeleteRoute="route('assets.fdelete', $asset->asset_id)"
                                                :restoreRoute="route('assets.restore', $asset->asset_id)"
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

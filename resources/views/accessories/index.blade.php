@extends('layouts.app')

{{-- page title --}}
@section('title', 'Accessories')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-keyboard mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Accessories' : 'Deleted Accessories' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('accessories.index') }}">Accessories</a></li>
                            <li class="breadcrumb-item active">Deleted Accessories</li>
                        @else
                            <li class="breadcrumb-item active">Accessories</li>
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

                                    <a href="{{ route('accessories.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Accessories</a>

                                @else

                                    <a href="{{ route('accessories.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Accessories</a>

                                @endif

                                <a href="{{ route('accessories.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Accessory</a>

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
                                        Asset Tag ID
                                    </th>
                                    <th>
                                        <i class="fas fa-tag text-primary mr-2"></i>
                                        Asset Tag
                                    </th>
                                    <th>
                                        <i class="fas fa-signature text-primary mr-2"></i>
                                        Asset Name
                                    </th>
                                    <th>
                                        <i class="fas fa-sticky-note text-primary mr-2"></i>
                                        Asset Disacription
                                    </th>
                                    <th>
                                        Asset Model
                                    </th>
                                    <th>
                                        <i class="fas fa-barcode text-primary mr-2"></i>
                                        Asset Serial
                                    </th>
                                    <th>
                                        Asset Manufacture
                                    </th>
                                    <th class="text-center">
                                        <i class="fas fa-ellipsis-v text-primary mr-2"></i>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($accessories as $accessory)
                                    <tr>
                                        <td>{{ $accessory->asset_tag_id ? $accessory->asset_tag_id : '-' }}</td>
                                        <td>{{ $accessory->asset_tag ? $accessory->asset_tag : '-' }}</td>
                                        <td>{{ $accessory->asset_name ? $accessory->asset_name : '-' }}</td>
                                        <td>{{ $accessory->asset_disacription ? $accessory->asset_disacription : '-' }}</td>
                                        <td>{{ $accessory->asset_model ? $accessory->asset_model : '-' }}</td>
                                        <td>{{ $accessory->asset_serial ? $accessory->asset_serial : '-' }}</td>
                                        <td>{{ $accessory->asset_manufacture ? $accessory->asset_manufacture : '-' }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('accessories.show', $accessory->asset_tag_id)"
                                                :editRoute="route('accessories.edit', $accessory->asset_tag_id)"
                                                :deleteRoute="route('accessories.destroy', $accessory->asset_tag_id)"
                                                :forceDeleteRoute="route('accessories.fdelete', $accessory->asset_tag_id)"
                                                :restoreRoute="route('accessories.restore', $accessory->asset_tag_id)"
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

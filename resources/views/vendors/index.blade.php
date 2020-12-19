@extends('layouts.app')

{{-- page title --}}
@section('title', 'Vendors')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-user-tie mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Vendors' : 'Deleted Vendors' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('vendors.index') }}">Vendors</a></li>
                            <li class="breadcrumb-item active">Deleted Vendors</li>
                        @else
                            <li class="breadcrumb-item active">Vendors</li>
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

                                    <a href="{{ route('vendors.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Vendors</a>

                                @else

                                    <a href="{{ route('vendors.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Vendors</a>

                                @endif

                                <a href="{{ route('vendors.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Vendor</a>

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
                                        Code
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Contact Person
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        State/Province
                                    </th>
                                    <th>
                                        Postal Code
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Fax
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vendors as $vendor)
                                    <tr>
                                        <td>{{ $vendor->first_name ? $vendor->first_name : '-' }}</td>
                                        <td>{{ $vendor->first_name ? $vendor->first_name : '-' }}</td>
                                        <td>{{ $vendor->last_name ? $vendor->last_name : '-' }}</td>
                                        <td>{{ $vendor->email ? $vendor->email : '-' }}</td>
                                        <td>{{ $vendor->phone ? $vendor->phone : '-' }}</td>
                                        <td>{{ $vendor->website ? $vendor->website : '-' }}</td>
                                        <td>{{ $vendor->getFullAddress() ? $vendor->getFullAddress() : '-' }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $vendor->created_at->toDateString() }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('vendors.show', $vendor->id)"
                                                :editRoute="route('vendors.edit', $vendor->id)"
                                                :deleteRoute="route('vendors.destroy', $vendor->id)"
                                                :forceDeleteRoute="route('vendors.fdelete', $vendor->id)"
                                                :restoreRoute="route('vendors.restore', $vendor->id)"
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

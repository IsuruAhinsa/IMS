@extends('layouts.app')

{{-- page title --}}
@section('title', 'Manufacturers')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-industry mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Manufacturers' : 'Deleted Manufacturers' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('manufacturers.index') }}">Manufacturers</a></li>
                            <li class="breadcrumb-item active">Deleted Manufacturers</li>
                        @else
                            <li class="breadcrumb-item active">Manufacturers</li>
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

                                    <a href="{{ route('manufacturers.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Manufacturers</a>

                                @else

                                    <a href="{{ route('manufacturers.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Manufacturers</a>

                                @endif

                                <a href="{{ route('manufacturers.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Manufacture</a>

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
                                        ID
                                    </th>
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
                                @foreach($manufacturers as $manufacturer)
                                    <tr>
                                        <td>{{ $manufacturer->manufacturer_id }}</td>
                                        <td>{{ $manufacturer->manufacturer_code }}</td>
                                        <td>{{ $manufacturer->manufacturer_name }}</td>
                                        <td>{{ $manufacturer->contact_person  }}</td>
                                        <td>{{ $manufacturer->address  }}</td>
                                        <td>{{ $manufacturer->city  }}</td>
                                        <td>{{ $manufacturer->state_or_province  }}</td>
                                        <td>{{ $manufacturer->postal_code }}</td>
                                        <td>{{ $manufacturer->country }}</td>
                                        <td>{{ $manufacturer->phone_number }}</td>
                                        <td>{{ $manufacturer->fax_number }}</td>
                                        <td>{{ $manufacturer->email }}</td>
                                        <td class="text-center">

                                            <x-ActionButtonGroup

                                                :viewRoute="route('manufacturers.show', $manufacturer->manufacturer_id)"

                                                :editRoute="route('manufacturers.edit', $manufacturer->manufacturer_id)"

                                                :deleteRoute="route('manufacturers.destroy', $manufacturer->manufacturer_id)"

                                                :restoreRoute="route('manufacturers.restore', $manufacturer->manufacturer_id)"

                                                :forceDeleteRoute="route('manufacturers.fdelete', $manufacturer->manufacturer_id)"

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

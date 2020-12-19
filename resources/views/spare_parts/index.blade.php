@extends('layouts.app')

{{-- page title --}}
@section('title', 'Spares Used')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-retweet mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Spares Used' : 'Deleted Spares Used' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('spare-parts.index') }}">Spares Used</a></li>
                            <li class="breadcrumb-item active">Deleted Spares Used</li>
                        @else
                            <li class="breadcrumb-item active">Spares Used</li>
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

                                    <a href="{{ route('spare-parts.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Spares Used</a>

                                @else

                                    <a href="{{ route('spare-parts.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Spares Used</a>

                                @endif

                                <a href="{{ route('spare-parts.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Spares Used</a>

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
                                @foreach($spare_parts as $spare_part)
                                    <tr>
                                        <td>{{ $spare_part->first_name ? $spare_part->first_name : '-' }}</td>
                                        <td>{{ $spare_part->first_name ? $spare_part->first_name : '-' }}</td>
                                        <td>{{ $spare_part->last_name ? $spare_part->last_name : '-' }}</td>
                                        <td>{{ $spare_part->email ? $spare_part->email : '-' }}</td>
                                        <td>{{ $spare_part->phone ? $spare_part->phone : '-' }}</td>
                                        <td>{{ $spare_part->website ? $spare_part->website : '-' }}</td>
                                        <td>{{ $spare_part->getFullAddress() ? $spare_part->getFullAddress() : '-' }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $spare_part->created_at->toDateString() }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('spare_parts.show', $spare_part->id)"
                                                :editRoute="route('spare_parts.edit', $spare_part->id)"
                                                :deleteRoute="route('spare_parts.destroy', $spare_part->id)"
                                                :forceDeleteRoute="route('spare_parts.fdelete', $spare_part->id)"
                                                :restoreRoute="route('spare_parts.restore', $spare_part->id)"
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

@extends('layouts.app')

{{-- page title --}}
@section('title', 'Users')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-user-friends mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Users' : 'Deleted Users' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">Deleted Users</li>
                        @else
                            <li class="breadcrumb-item active">Users</li>
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

                                    <a href="{{ route('users.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Users</a>

                                @else

                                    <a href="{{ route('users.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Users</a>

                                @endif

                                <a href="{{ route('users.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create User</a>

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
                                        <i class="fas fa-image text-primary mr-2"></i>
                                        Image
                                    </th>
                                    <th>
                                        <i class="far fa-user-circle text-primary mr-2"></i>
                                        First Name
                                    </th>
                                    <th>
                                        <i class="far fa-user-circle text-primary mr-2"></i>
                                        Last Name
                                    </th>
                                    <th>
                                        <i class="far fa-envelope text-primary mr-2"></i>
                                        Email
                                    </th>
                                    <th>
                                        <i class="fas fa-mobile-alt text-primary mr-2"></i>
                                        Phone
                                    </th>
                                    <th>
                                        <i class="fab fa-internet-explorer text-primary mr-2"></i>
                                        Website
                                    </th>
                                    <th>
                                        <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                                        Address
                                    </th>
                                    <th>
                                        <i class="fas fa-user-shield mr-2 text-primary"></i>
                                        Role
                                    </th>
                                    <th>
                                        <i class="far fa-clock text-primary mr-2"></i>
                                        Registered At
                                    </th>
                                    <th class="text-center">
                                        <i class="fas fa-ellipsis-v text-primary mr-2"></i>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('uploads/user/image/' . $user->image) }}" alt="" class="img-fluid" width="32">
                                            </td>
                                            <td>{{ $user->first_name ? $user->first_name : '-' }}</td>
                                            <td>{{ $user->last_name ? $user->last_name : '-' }}</td>
                                            <td>{{ $user->email ? $user->email : '-' }}</td>
                                            <td>{{ $user->phone ? $user->phone : '-' }}</td>
                                            <td>{{ $user->website ? $user->website : '-' }}</td>
                                            <td>{{ $user->getFullAddress() ? $user->getFullAddress() : '-' }}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    <span class="badge bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $user->created_at->toDateString() }}</td>
                                            <td class="text-center">
                                                <x-ActionButtonGroup
                                                    :viewRoute="route('users.show', $user->id)"
                                                    :editRoute="route('users.edit', $user->id)"
                                                    :deleteRoute="route('users.destroy', $user->id)"
                                                    :forceDeleteRoute="route('users.fdelete', $user->id)"
                                                    :restoreRoute="route('users.restore', $user->id)"
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

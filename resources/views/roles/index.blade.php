@extends('layouts.app')

{{-- page title --}}
@section('title', 'Roles')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-user-shield mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Roles' : 'Deleted Roles' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                            <li class="breadcrumb-item active">Deleted Roles</li>
                        @else
                            <li class="breadcrumb-item active">Roles</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">

                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">
                        <div class="card-body">

                            <div class="text-right mb-2">

                                @if(request('status') == 'deleted')

                                    <a href="{{ route('roles.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Roles</a>

                                @else

                                    <a href="{{ route('roles.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Roles</a>

                                @endif

                                <a href="{{ route('roles.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Role</a>

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
                                        <i class="fas fa-shield-alt text-primary mr-2"></i>
                                        Role Name
                                    </th>
                                    <th width="500px">
                                        <i class="far fa-check-square text-primary mr-2"></i>
                                        Permissions
                                    </th>
                                    <th class="text-center">
                                        <i class="fas fa-ellipsis-v text-primary mr-2"></i>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td class="align-middle">{{ $loop->index + 1 }}</td>
                                            <td class="align-middle">{{ $role->name }}</td>
                                            <td class="align-middle">
                                                @foreach($role->permissions as $permission)
                                                    <span class="badge bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}">
                                                        {{ ucwords(\Illuminate\Support\Str::replaceFirst('.', ' ', $permission->name)) }}
                                                    </span>
                                                @endforeach
                                            </td>
                                            <td class="text-center align-middle">
                                                <x-ActionButtonGroup
                                                    :viewRoute="null"
                                                    :editRoute="route('roles.edit', $role->id)"
                                                    :deleteRoute="route('roles.destroy', $role->id)"
                                                    :forceDeleteRoute="null"
                                                    :restoreRoute="null"
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

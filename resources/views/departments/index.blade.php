@extends('layouts.app')

{{-- page title --}}
@section('title', 'Departments')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-building mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Departments' : 'Deleted Departments' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Departments</a></li>
                            <li class="breadcrumb-item active">Deleted Departments</li>
                        @else
                            <li class="breadcrumb-item active">Departments</li>
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

                                    <a href="{{ route('departments.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Departments</a>

                                @else

                                    <a href="{{ route('departments.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Departments</a>

                                @endif

                                <a href="{{ route('departments.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Department</a>

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
                                        Description
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{ $department->department_id ? $department->department_id : '-' }}</td>
                                        <td>{{ $department->department_code ? $department->department_code : '-' }}</td>
                                        <td>{{ $department->description ? $department->description : '-' }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('departments.show', $department->department_id)"
                                                :editRoute="route('departments.edit', $department->department_id)"
                                                :deleteRoute="route('departments.destroy', $department->department_id)"
                                                :forceDeleteRoute="route('departments.fdelete', $department->department_id)"
                                                :restoreRoute="route('departments.restore', $department->department_id)"
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

@extends('layouts.app')

{{-- page title --}}
@section('title', 'Contractors')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-hard-hat mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Contractors' : 'Deleted Contractors' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('contractors.index') }}">Contractors</a></li>
                            <li class="breadcrumb-item active">Deleted Contractors</li>
                        @else
                            <li class="breadcrumb-item active">Contractors</li>
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

                                    <a href="{{ route('contractors.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Contractors</a>

                                @else

                                    <a href="{{ route('contractors.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Contractors</a>

                                @endif

                                <a href="{{ route('contractors.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Contractor</a>

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
                                        Reference ID
                                    </th>
                                    <th>
                                        Reference Code
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        NO
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Start Date
                                    </th>
                                    <th>
                                        End Date
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Value
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contractors as $contractor)
                                    <tr>
                                        <td>{{ $contractor->first_name ? $contractor->first_name : '-' }}</td>
                                        <td>{{ $contractor->first_name ? $contractor->first_name : '-' }}</td>
                                        <td>{{ $contractor->last_name ? $contractor->last_name : '-' }}</td>
                                        <td>{{ $contractor->email ? $contractor->email : '-' }}</td>
                                        <td>{{ $contractor->phone ? $contractor->phone : '-' }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $contractor->created_at->toDateString() }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('contractors.show', $contractor->id)"
                                                :editRoute="route('contractors.edit', $contractor->id)"
                                                :deleteRoute="route('contractors.destroy', $contractor->id)"
                                                :forceDeleteRoute="route('contractors.fdelete', $contractor->id)"
                                                :restoreRoute="route('contractors.restore', $contractor->id)"
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

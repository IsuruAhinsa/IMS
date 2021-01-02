@extends('layouts.app')

{{-- page title --}}
@section('title', 'Categories')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-sitemap mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Categories' : 'Deleted Categories' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Deleted Categories</li>
                        @else
                            <li class="breadcrumb-item active">Categories</li>
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

                                    <a href="{{ route('categories.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Categories</a>

                                @else

                                    <a href="{{ route('categories.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Categories</a>

                                @endif

                                <a href="{{ route('categories.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Category</a>

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
                                        ECRI Code
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Asset Definition
                                    </th>
                                    <th>
                                        Asset Type
                                    </th>
                                    <th>
                                        Classification
                                    </th>
                                    <th>
                                        PM Hours
                                    </th>
                                    <th>
                                        Task No
                                    </th>
                                    <th>
                                        PM Frequency
                                    </th>
                                    <th>
                                        FDA Risk
                                    </th>
                                    <th>
                                        Proficiency Level
                                    </th>
                                    <th>
                                        Tools Required
                                    </th>
                                    <th>
                                        Safety Instructions
                                    </th>
                                    <th>
                                        EST Service Life
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->ecri_code ? $category->ecri_code : '-' }}</td>
                                        <td>{{ $category->asset_category ? $category->asset_category : '-' }}</td>
                                        <td>{{ $category->asset_definition ? $category->asset_definition : '-' }}</td>
                                        <td>{{ $category->asset_type ? $category->asset_type : '-' }}</td>
                                        <td>{{ $category->classification ? $category->classification : '-' }}</td>
                                        <td>{{ $category->pm_hours ? $category->pm_hours : '-' }}</td>
                                        <td>{{ $category->task_no ? $category->task_no : '-' }}</td>
                                        <td>{{ $category->pm_frequency ? $category->pm_frequency : '-' }}</td>
                                        <td>{{ $category->fda_risk ? $category->fda_risk : '-' }}</td>
                                        <td>{{ $category->proficiency_level ? $category->proficiency_level : '-' }}</td>
                                        <td>{{ $category->tools_required ? $category->tools_required : '-' }}</td>
                                        <td>{{ $category->safety_instructions ? $category->safety_instructions : '-' }}</td>
                                        <td>{{ $category->est_service_life ? $category->est_service_life : '-' }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('categories.show', $category->asset_category_id)"
                                                :editRoute="route('categories.edit', $category->asset_category_id)"
                                                :deleteRoute="route('categories.destroy', $category->asset_category_id)"
                                                :forceDeleteRoute="route('categories.fdelete', $category->asset_category_id)"
                                                :restoreRoute="route('categories.restore', $category->asset_category_id)"
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

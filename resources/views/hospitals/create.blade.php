@extends('layouts.app')

{{-- page title --}}
@section('title', 'Create Hospital')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-hospital-symbol mr-2"></i>
                        Create Hospital
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <i class="fas fa-hospital-symbol mr-2"></i>
                            Create Hospital
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card card-{{ \App\Http\Controllers\Controller::setting()->skin }}">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase">
                            <i class="fas fa-hospital-symbol mr-2"></i>
                            Create New Hospital
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('forms.hospitals.create')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

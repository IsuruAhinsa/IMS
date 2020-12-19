@extends('layouts.app')

{{-- page title --}}
@section('title', 'Manufacture - ' . $manufacturer->manufacturer_code)

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-industry mr-2"></i>
                        Manufacture - {{ $manufacturer->manufacturer_code }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('manufacturers.index') }}">Manufacturers</a></li>
                        <li class="breadcrumb-item active">Manufacture - {{ $manufacturer->manufacturer_code }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">
                        <div class="card-body p-5">



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

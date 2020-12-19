@extends('layouts.app')

{{-- page title --}}
@section('title', 'Edit Manufacture')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-industry mr-2"></i>
                        Edit Manufacture
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('manufacturers.index') }}">Manufacturers</a></li>
                        <li class="breadcrumb-item active">Edit Manufacture</li>
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

                        <div class="card-header">
                            <i class="fas fa-pencil-alt mr-2"></i>
                            Edit Manufacture
                        </div>

                        <div class="card-body p-5">

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

                            @include('forms.manufacturers.create', [
                                "route" => route('manufacturers.update', $manufacturer->manufacturer_id),
                                "manufacturer_id" => old('manufacturer_id', $manufacturer->manufacturer_id),
                                "manufacturer_code" => old('manufacturer_code', $manufacturer->manufacturer_code),
                                "manufacturer_name" => old('manufacturer_name', $manufacturer->manufacturer_name),
                                "contact_person" => old('contact_person', $manufacturer->contact_person),
                                "address" => old('address', $manufacturer->address),
                                "city"  => old('city', $manufacturer->city),
                                "state_or_province" => old('state_or_province', $manufacturer->state_or_province),
                                "postal_code" => old('postal_code', $manufacturer->postal_code),
                                "country" => old('country', $manufacturer->country),
                                "phone_number" => old('phone_number', $manufacturer->phone_number),
                                "fax_number" => old('fax_number', $manufacturer->fax_number),
                                "email" => old('email', $manufacturer->email),
                                "btnText" => "Update Manufacturer",
                            ])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@extends('layouts.app')

{{-- page title --}}
@section('title', 'Settings')

{{-- page content --}}
@section('content')

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">
                <div class="card-body">
                    <h4>
                        Settings
                    </h4>
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            @include('settings.nav-link')
                        </div>
                        <div class="col-7 col-sm-9">

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

                            @if(session()->has('success'))
                                <x-Alert type="success" :message="session()->get('success')"></x-Alert>
                            @endif

                            <div class="tab-content" id="vert-tabs-tabContent">

                                <div class="tab-pane text-left fade show active" id="vert-tabs-general" role="tabpanel" aria-labelledby="vert-tabs-general-tab">

                                    <div class="p-3 w-75">
                                        <h4>
                                            <i class="fas fa-cog mr-2"></i>
                                            General Settings
                                        </h4>
                                        <br>
                                        @include('settings.general')
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="vert-tabs-branding" role="tabpanel" aria-labelledby="vert-tabs-branding-tab">

                                    <div class="p-3 w-75">
                                        <h4>
                                            <i class="fas fa-copyright mr-2"></i>
                                            Branding Settings
                                        </h4>
                                        <br>
                                        @include('settings.branding')
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="vert-tabs-security" role="tabpanel" aria-labelledby="vert-tabs-security-tab">

                                    <div class="p-3 w-75">
                                        <h4>
                                            <i class="fas fa-lock mr-2"></i>
                                            Security Settings
                                        </h4>
                                        <br>
                                        @include('settings.security')
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="vert-tabs-localization" role="tabpanel" aria-labelledby="vert-tabs-localization-tab">

                                    <div class="p-3 w-75">
                                        <h4>
                                            <i class="fas fa-globe-asia mr-2"></i>
                                            Localization Settings
                                        </h4>
                                        <br>
                                        @include('settings.localization')
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

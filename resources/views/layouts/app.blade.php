<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">

    <div class="wrapper">

        @include('partials.navbar')

        @include('partials.main-sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('partials.control-sidebar')

        @include('partials.footer')

    </div>

    @include('partials.scripts')
</body>
</html>

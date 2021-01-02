<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="apple-mobile-web-app-capable" content="yes">

<link rel="apple-touch-icon" href="{{ ($commonSetting) && ($commonSetting->favicon != '') ?  asset('uploads/settings/'.$commonSetting->logo) : asset('img/logo.png') }}">
<link rel="apple-touch-startup-image" href="{{ ($commonSetting) && ($commonSetting->favicon != '') ?  asset('uploads/settings/'.$commonSetting->logo) : asset('img/logo.png') }}">
<link rel="shortcut icon" type="image/ico" sizes="32" href="{{ ($commonSetting) && ($commonSetting->favicon != '') ?  asset('uploads/settings/'.$commonSetting->favicon) : asset('favicon.ico') }} ">

<title>
    @yield('title') | {{ isset($commonSetting) ? $commonSetting->site_name : config('app.name', 'IMS') }}
</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!--  Datatable  -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.css') }}">
<!--  Seletct 2  -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
@stack('css')

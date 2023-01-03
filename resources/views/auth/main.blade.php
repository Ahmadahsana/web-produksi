<!doctype html>
<html lang="en" data-layout="twocolumn" data-sidebar="light" data-sidebar-size="lg">

<head>

    <meta charset="utf-8" />
    <title>{{ $tittlePage }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

    <!-- dropzone css -->
    <link rel="stylesheet" href="{{ url('assets/libs/dropzone/dropzone.css') }}" type="text/css" />

    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ url('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ url('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">

    <!-- Layout config Js -->
    <script src="{{ url('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ url('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />


</head>

<body>

    @yield('container')

    <!-- JAVASCRIPT -->
    <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ url('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ url('assets/js/plugins.js') }}"></script>

    <!-- password-addon init -->
    <script src="{{ url('assets/js/pages/password-addon.init.js') }}"></script>
</body>

</html>
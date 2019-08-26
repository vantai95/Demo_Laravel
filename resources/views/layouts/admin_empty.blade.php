<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ trans('app.title') }}</title>
    
    <!-- Icons-->
    <link rel="icon" type="image/ico" href="{{asset('/images/app/favicon.ico')}}" sizes="any" />

     <!-- Styles -->
    <link href="{{ asset('css/admin/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/admin/theme.js') }}" defer></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
</body>

</html>

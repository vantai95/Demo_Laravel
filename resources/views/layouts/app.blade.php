<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ trans('app.title') }} | {{ $title ?? '' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('/images/app/favicon.ico')}}"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/app/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app/revolution.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app/app.css') }}" rel="stylesheet">
</head>
<body class="animsition">

<div class="{{ $layout_class ?? 'home-1' }}" id="page">
    @include('layouts.app._header')

    @yield('content')
</div>

@include('layouts.app._footer')

<!-- Scripts -->
<script type="text/javascript">
    window.spin_image_path = '{{ asset('images/app/icons/spin.svg') }}';
    window.logo_image_path = '{{ asset('images/app/logo.png') }}';
</script>
<script src="{{ asset('js/app/vendor.js') }}"></script>
<script src="{{ asset('js/app/revolution.js') }}"></script>
<script src="{{ asset('js/app/theme.js') }}"></script>
@yield('extra_scripts')
</body>
</html>

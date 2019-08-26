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

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    @include('layouts.admin._header')
    <div class="app-body">
        @include('layouts.admin._sidebar')
        <main class="main">
            @yield('content')
        </main>
    </div>
    @include('layouts.admin._footer')
    
    <!-- Scripts -->
    <script src="{{ asset('js/admin/theme.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>

    <script type="text/javascript">
        @if (session('flash_message'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.success("{{ session('flash_message') }}");
        });
        @endif

        @if (session('flash_error'))
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("{{ session('flash_error') }}");
        });
        @endif
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 150
            });
        });

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
    @yield('extra_scripts')
</body>

</html>

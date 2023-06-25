<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{config('app.name')}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->
    <link href="{{asset('NiceAdmin/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('NiceAdmin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('NiceAdmin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('NiceAdmin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('NiceAdmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('NiceAdmin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Template Main CSS File -->
    <link href="{{asset('NiceAdmin/assets/css/style.css')}}" rel="stylesheet">

{{--    Select2--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
{{--    <!-- Or for RTL support -->--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />--}}
{{--Flat Picker--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



    <livewire:styles />

{{--    Datatables--}}
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.css" rel="stylesheet"/>
    @yield('style')
    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: May 30 2023 with Bootstrap v5.3.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<x-header></x-header>

<x-sidebar></x-sidebar>

<main id="main" class="main">

    @yield('pagetitle')

    @yield('content')

</main>


@yield('outmain')
<x-footer></x-footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/php-email-form/validate.js')}}"></script>

{{--Datatables--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/r-2.4.1/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.js"></script>
<!-- Template Main JS File -->
<script src="{{asset('NiceAdmin/assets/js/main.js')}}"></script>

<livewire:scripts />

{{--Sweet Alert RealRashid--}}
@include('sweetalert::alert')

{{--Select 2--}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--FlatPicker--}}

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

{{--Toaster--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{--TinyMCE--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.2/tinymce.min.js" referrerpolicy="origin"></script>--}}

{{--<script>--}}
{{--    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');--}}

{{--    function logoutUser() {--}}
{{--        $.ajax({--}}
{{--            url: '{{route("logout")}}', // Replace with your logout route URL--}}
{{--            method: 'POST', // Use the appropriate HTTP method--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers--}}
{{--            },--}}
{{--            success: function(response) {--}}
{{--                window.location.href="{{route('login')}}";--}}
{{--            },--}}
{{--            error: function(xhr, status, error) {--}}
{{--                console.error(error);--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}

{{--    var inactivityTimeout = null;--}}
{{--    var sessionLifetime = {{ config('session.lifetime') * 58999 }};--}}
{{--    function startInactivityTimer() {--}}
{{--        clearTimeout(inactivityTimeout);--}}
{{--        inactivityTimeout = setTimeout(logoutUser, sessionLifetime);--}}
{{--    }--}}

{{--    $(document).ready(function() {--}}
{{--        startInactivityTimer();--}}
{{--    });--}}

{{--    $(document).on('click keypress', function() {--}}
{{--        console.log(sessionLifetime);--}}
{{--        startInactivityTimer();--}}
{{--    });--}}
{{--</script>--}}


@yield('script')
@stack('scripts')

</body>

</html>

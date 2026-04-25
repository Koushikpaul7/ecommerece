<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from demo.snstheme.com/html/simen/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Apr 2026 17:15:20 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Home Page3</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins:300,700' rel='stylesheet' type='text/css'>
    <!-- Style Sheet-->
    <link rel="stylesheet" type="text/css" href="{{ asset('font/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.theme.css') }}">
    <!-- Toastr Notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- META TAGS -->
    <meta name="viewport" content="width=device-width" />
</head>

<body id="bd" class=" cms-index-index3 header-style3 header-prd cms-index-index  products-grid1 cms-simen-home-page-v2 default cmspage">
    <main>
        <div id="sns_wrapper">
            <!-- HEADER -->
            @include('frontend.partials.header')
            <!-- AND HEADER -->
            @yield('content')
            <!-- FOOTER -->
            @include('frontend.partials.footer')
        </div>
    </main>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/less.min.js') }}"></script>
    <script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/sns-extend.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Toastr Notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        // Display toast notifications
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
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

            @if(session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if(session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        });
    </script>
</body>

<!-- Mirrored from demo.snstheme.com/html/simen/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Apr 2026 17:22:34 GMT -->

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>De Earth Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/lineawesome/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
</head>

<body>

    <div class="logo ps-3">
        <h1><a href="{{ url('/') }}"><img src="{{ asset('img/logo.svg') }}" width="130" height="35"></a></h1>
    </div>

    <section class="p-3 mt-5">

        <h1 class="d-flex justify-content-center align-items-center my-4">Admin Login</h1>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form id="login-form" method="post" action="{{ route('admin.login') }}">
                    @csrf
                    <input type="text" name="username" id="username" class="mb-4 form-control" placeholder="Username">
                    <input type="password" name="password" id="password" class="mb-4 form-control" placeholder="Password">
                    <div class="g-recaptcha mb-4" data-sitekey="6Ld4yO8nAAAAAE3Y9hgj2oCTvaGTIDiUuXesdD3a"></div>
                    <button type="submit" name="submit" class="btn btn-all w-100">Login</button>
                    <div class="go-back">
                        <a href="{{ url('/') }}">
                            <p class="mt-3">
                                <i class="las la-long-arrow-alt-left" style="font-size: 18px;"></i> Go to <b>deearth.com</b>
                            </p>
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </section>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- reCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('admin/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('admin/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('admin/js/custom-js.js') }}"></script>

</body>

</html>
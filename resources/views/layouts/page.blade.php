<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title', 'Home') - {{ config('app.name') }}</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
  ================================================== -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    <!-- CSS
  ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animate-css/animate.css') }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick-theme.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/colorbox/colorbox.css') }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=1.15">
    <link rel="stylesheet" href="{{ asset('assets/css/extra.css') }}">

    @yield('styles')

</head>

<body>
    <div class="body-inner">
        <!-- Header start -->
        <header id="header" class="header-one" style="margin-bottom: 90px">
            <div class="bg-white">
                <div class="container">
                    <div class="logo-area">
                        <div class="row align-items-center">
                            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                                <a class="d-block" href="{{ url('/') }}">
                                    <img loading="lazy" src="{{ asset('assets/img/logo.png') }}" alt="Constra">
                                </a>
                            </div><!-- logo end -->

                            <div class="col-lg-9 header-right">
                                <ul class="top-info-box">
                                    <li>
                                        <div class="info-box">
                                            <div class="info-box-content">
                                                <p class="info-box-title">Call Us</p>
                                                <p class="info-box-subtitle"><a
                                                        href="tel:{{ $contactSettings->phone }}">{{ $contactSettings->phone }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info-box">
                                            <div class="info-box-content">
                                                <p class="info-box-title">Email Us</p>
                                                <p class="info-box-subtitle"><a
                                                        href="mailto:{{ $contactSettings->email }}">{{ $contactSettings->email }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul><!-- Ul end -->
                            </div><!-- header right end -->
                        </div><!-- logo area end -->

                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div>

            <div class="site-navigation navbar-fixed" style="margin-bottom: 0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('partials.frontend-menu')
                        </div>
                        <!--/ Col end -->
                    </div>
                </div>
                <!--/ Navigation end -->
        </header>
        <!--/ Header end -->

        @yield('content')

        <footer id="footer" class="footer bg-overlay">
            <div class="footer-main">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6 footer-widget footer-about">
                            <h3 class="widget-title">About Us</h3>
                            <img loading="lazy" width="200px" class="footer-logo"
                                src="{{ asset('assets/img/logo.png') }}" alt="Constra">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="https://facebook.com/themefisher" aria-label="Facebook"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/themefisher" aria-label="Twitter"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a href="https://instagram.com/themefisher" aria-label="Instagram"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://github.com/themefisher" aria-label="Github"><i
                                                class="fab fa-github"></i></a></li>
                                </ul>
                            </div><!-- Footer social end -->
                        </div><!-- Col end -->

                        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Services</h3>
                            <ul class="list-arrow">
                                <li><a href="#">Service 1</a></li>
                                <li><a href="#">Service 2</a></li>
                                <li><a href="#">Service 3</a></li>
                                <li><a href="#">Service 4</a></li>
                            </ul>
                        </div><!-- Col end -->

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                            <h3 class="widget-title">Others</h3>
                            <ul class="list-arrow">
                                <li><a href="#">Others 1</a></li>
                                <li><a href="#">Others 2</a></li>
                                <li><a href="#">Others 3</a></li>
                                <li><a href="#">Others 4</a></li>
                                <li><a href="#">Others 5</a></li>
                            </ul>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Footer main end -->

            <div class="copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-info text-center text-md-left">
                                <span>Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>, Designed &amp; Developed by <a
                                        href="https://hansofttechnologies.com/">Hansoft Technologies Pvt Ltd</a>
                                </span>
                            </div>
                        </div>
                    </div><!-- Row end -->

                    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                        <button class="btn btn-primary" title="Back to Top">
                            <i class="fa fa-angle-double-up"></i>
                        </button>
                    </div>

                </div><!-- Container end -->
            </div><!-- Copyright end -->
        </footer><!-- Footer end -->

        <!-- Javascript Files -->

        <!-- initialize jQuery Library -->
        <script src="{{ asset('assets/plugins/jQuery/jquery.min.js') }}"></script>
        <!-- Bootstrap jQuery -->
        <script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
        <!-- Slick Carousel -->
        <script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/slick/slick-animation.min.js') }}"></script>
        <!-- Color box -->
        <script src="{{ asset('assets/plugins/colorbox/jquery.colorbox.js') }}"></script>
        <!-- shuffle -->
        <script src="{{ asset('assets/plugins/shuffle/shuffle.min.js') }}" defer></script>


        <!-- Google Map API Key-->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNfRe7yyUi4LJryLiOXA6Vjxm2YvNdI8g&loading=async&callback=initMap"
            defer></script>
        <!-- Google Map Plugin-->
        <script src="{{ asset('assets/plugins/google-map/map.js') }}?v=1.0" defer></script>

        <!-- Template custom -->
        <script src="{{ asset('assets/js/script.js') }}?v=1.01"></script>

        @yield('scripts')

    </div><!-- Body inner end -->
</body>


</html>

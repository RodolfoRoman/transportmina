<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>TransportMINA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700%7COpen+Sans:400,600,700%7CSource+Code+Pro:300,400,500,600,700,900%7CNothing+You+Could+Do%7CPoppins:400,500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .ie-panel {
            display: none;
            background: #FAB552;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
</head>

<body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
        </div>
    </div>
    <div class="page">
        <!-- Page Header-->
        <header class="section page-header">
            <!--RD Navbar-->
            <div class="rd-navbar-wrap" style="position: absolute">
                <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <!--RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!--RD Navbar Toggle-->
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!--RD Navbar Brand-->
                                <div class="rd-navbar-brand">
                                    <!--Brand--><a class="brand" href="index.html"><img src="images/logo.png" alt="" width="50" height="25" /></a>
                                </div>
                            </div>
                            <div class="rd-navbar-collapse">
                               <h3>TransPortMINA</h3>
                            </div>

                            @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                <a href="{{ url('/inicio') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Nuestro ERP</a>
                                @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>

                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                                @endauth
                            </div>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--Swiper-->
        <section class="section swiper-container swiper-slider swiper-slider-1" data-loop="true" data-autoplay="3892" data-simulate-touch="false">
            <div class="swiper-wrapper text-center">
                <div class="swiper-slide context-dark" data-slide-bg="images/home1-01-1920x950.jpg">
                    <div class="swiper-slide-caption section-md">
                        <div class="container">
                            <div class="row justify-content-lg-center">
                                <div class="col-lg-8">
                                    <h5 data-caption-animate="fadeInUp" data-caption-delay="100">Expertos en extracción de minerales</h5>
                                    <h1 data-caption-animate="fadeInUp" data-caption-delay="200">Transport</h1>
                                    <img src="images/mina.png" alt="" width="550" height="350" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide context-dark" data-slide-bg="images/home1-02-1920x950.jpg">
                    <div class="swiper-slide-caption section-md">
                        <div class="container">
                            <div class="row justify-content-lg-center">
                                <div class="col-lg-8">
                                    <h5 data-caption-animate="fadeInUp" data-caption-delay="100">Exportando desde</h5>
                                    <h1 data-caption-animate="fadeInUp" data-caption-delay="200">1986</h1>
                                    <img src="images/carbon.png" alt="" width="550" height="350" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide context-dark" data-slide-bg="images/home1-03-1920x950.jpg">
                    <div class="swiper-slide-caption section-md">
                        <div class="container">
                            <div class="row justify-content-lg-center">
                                <div class="col-lg-8">
                                    <h5 data-caption-animate="fadeInUp" data-caption-delay="100">generando más de </h5>
                                    <h1 data-caption-animate="fadeInUp" data-caption-delay="200">2,000</h1>
                                    <h5 data-caption-animate="fadeInUp" data-caption-delay="100">empleos</h5>
                                    <img src="images/empleo.png" alt="" width="550" height="350" >

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Swiper Pagination-->
            <div class="swiper-pagination"></div>
        </section>



        <footer class="section footer-classic bg-default">
            <div class="container">
                <div class="row row-15">
                    <div class="col-sm-6">
                        <p class="rights"><span>DJ Fox</span><span>&nbsp;</span><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>\&nbsp;</span>All Rights Reserved
                            \ Design by <a href="https://www.templatemonster.com/">TemplateMonster</a>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <div class="footer-contact"><a href="contacts.html">
                                <div class="icon novi-icon mdi mdi-email-outline"></div>Contact Me
                            </a></div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <!--coded by houdini-->
</body>

</html>
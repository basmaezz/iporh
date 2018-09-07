<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>

    <title>CharityFund - Charity & Crowdfunding HTML Template</title>

    <!-- Favicon and Touch Icons -->
    <link href="/front/images/favicon.png" rel="shortcut icon" type="image/png">
    <link href="/front/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="/front/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="/front/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="/front/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    @include('front.layouts.css')

</head>
<body class="has-side-panel side-panel-right fullwidth-page side-push-panel rtl">
<div class="body-overlay"></div>
<div id="side-panel" class="dark" data-bg-img="/front/images/bg/bg8.jpg">
    <div class="side-panel-wrap">
        <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon_close font-30"></i></a>
        </div>
        <a href="javascript:void(0)"><img alt="logo" src="/front/images/logo-wide.png"></a>
        <div class="side-panel-nav mt-30">
            <div class="widget no-border">
                <nav>
                    <ul class="nav nav-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a class="tree-toggler nav-header">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="nav nav-list tree">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="side-panel-widget mt-30">
            <div class="widget no-border">
                <ul>
                    <li class="font-14 mb-5"><i class="fa fa-phone text-theme-colored"></i> <a href="#"
                                                                                               class="text-gray">123-456-789</a>
                    </li>
                    <li class="font-14 mb-5"><i class="fa fa-clock-o text-theme-colored"></i> Mon-Fri 8:00 to 2:00</li>
                    <li class="font-14 mb-5"><i class="fa fa-envelope-o text-theme-colored"></i> <a href="#"
                                                                                                    class="text-gray">contact@yourdomain.com</a>
                    </li>
                </ul>
            </div>
            <div class="widget">
                <ul class="styled-icons icon-dark icon-theme-colored icon-sm">
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
            <p>Copyright &copy;2016 ThemeMascot</p>
        </div>
    </div>
</div>
<div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <div class="preloader-dot-loading">
                <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
            </div>
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>

    <!-- Header -->
     @include('front.layouts.header')

<!-- Start main-content -->
    <div class="main-content">
        <!-- Section: home -->

        @yield('content')


    </div>
    <!-- end main-content -->

    <!-- Footer -->
    @include('front.layouts.footer')
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
@include('front.layouts.js')

</body>

<!-- Mirrored from thememascot.net/demo/html/nonprofit/charity/charityfund-html/v3.4/demo/index-rtl-mp-layout1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Sep 2018 12:39:26 GMT -->
</html>
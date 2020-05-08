<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sublime</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/styles/bootstrap4/bootstrap.min.css') !!}">
    <link href="{!! url('public/user/plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/plugins/OwlCarousel2-2.2.1/owl.carousel.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/user/plugins/OwlCarousel2-2.2.1/animate.css')!!}">
    @yield('linkTagHead')
</head>
<body>

<div class="super_container">

    <!-- Header -->

    @include('user.blocks.header')

    <!-- Menu -->

{{--    @include('user.blocks.menu')--}}

    <!-- Home -->

    @yield('slider')

    @yield('contact')

    <!-- Ads -->

    @yield('ads')

    <!-- Products -->

    @yield('productdetail')

    @yield('product')

    <!-- Ad -->

    @yield('ad')

    <!-- Icon Boxes -->

    @yield('iconboxes')

    <!-- Newsletter -->

    @yield('newsletter')

    <!-- Footer -->

    <div class="footer_overlay"></div>

    @include('user.blocks.footer')

</div>

<script src="{!! url('public/user/js/jquery-3.2.1.min.js')!!}"></script>
<script src="{!! url('public/user/styles/bootstrap4/popper.js')!!}"></script>
<script src="{!! url('public/user/styles/bootstrap4/bootstrap.min.js')!!}"></script>
<script src="{!! url('public/user/plugins/greensock/TweenMax.min.js')!!}"></script>
<script src="{!! url('public/user/plugins/greensock/TimelineMax.min.js')!!}"></script>
<script src="{!! url('public/user/plugins/scrollmagic/ScrollMagic.min.js')!!}"></script>
<script src="{!! url('public/user/plugins/greensock/animation.gsap.min.js')!!}"></script>
<script src="{!! url('public/user/plugins/greensock/ScrollToPlugin.min.js')!!}"></script>
<script src="{!! url('public/user/plugins/OwlCarousel2-2.2.1/owl.carousel.js')!!}"></script>
<script src="{!! url('public/user/plugins/Isotope/isotope.pkgd.min.js')!!}"></script>
<script src="{!! url('public/user/plugins/easing/easing.js')!!}"></script>
<script src="{!! url('public/user/plugins/parallax-js-master/parallax.min.js')!!}"></script>
<script src="{!! url('public/user/js/custom.js')!!}"></script>
@yield('addjs')
</body>
</html>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>{{$Settings->title}}</title>
    <meta name="keywords" content="{{$Settings->meta_keywords}}"/>
    <meta name="description" content="{{$Settings->meta_description}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/newfont.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/swiper.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/jquery.bxslider.min.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/odometer-theme-default.css">
    <link rel="stylesheet" href="{{ URL::asset('public/front')}}/assets/css/style.css">

    @yield('style')
</head>

<body class="app-eight-home" data-spy="scroll" data-target=".navigation-eight" data-offset="50">
    <!-- preloader - start -->
    <div id="ei-preloader"></div>
    <div class="ei-up">
        <a href="#" class="ei-scrollup text-center"><i class="fas fa-angle-up"></i></a>
    </div>
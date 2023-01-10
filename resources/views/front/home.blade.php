@extends('front.layout.master')
@section('content')

    <section id="eight-banner" class="eight-banner-section position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="eight-banner-content">
                        <div class="banner-content-box appeight-headline pera-content">
                            <h1 class="cd-headline clip is-full-width">
                                {{$Settings->title}} <br>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">مميز جدا</b>
                                    <b>بسيط وسهل</b>
                                    <b>خدمي</b>
                                </span>
                            </h1>
                            <div class="eight-section-title appeight-headline pera-content text-center">
                                <h2 style="color: #ffffff;">حمل التطبيق الأن
                                </h2>
                            </div>
                            <div class="app-down-btn text-center">
                                <a href="#"><img src="{{ URL::asset('public/front')}}/assets/img/app-s/shape/btn1.png" style="margin-bottom: 30px;"></a>
                                <a href="#"><img src="{{ URL::asset('public/front')}}/assets/img/app-s/shape/btn2.png" style="margin-bottom: 30px;"></a>
                            </div>
                        </div>
                        <div class="ei-banner-mbl-mockup wow fadeInRight" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <img src="{{$Settings->breadcrumb}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="waveWrapper waveAnimation">
            <div class="waveWrapperInner bgTop">
                <div class="wave waveTop" style="background-image: url('{{ URL::asset('public/front')}}/assets/img/app-s/shape/b-shapeup.png')"></div>
            </div>
            <div class="waveWrapperInner bgMiddle">
                <div class="wave waveMiddle" style="background-image: url('{{ URL::asset('public/front')}}/assets/img/app-s/shape/b-shapemiddle.png')"></div>
            </div>
            <div class="waveWrapperInner bgBottom">
                <div class="wave waveBottom" style="background-image: url('{{ URL::asset('public/front')}}/assets/img/app-s/shape/b-shapemiddle.png')"></div>
            </div>
        </div>
    </section>

    <section id="ei-screenshots" class="ei-screenshots-section position-relative">
        <div class="container">
            <div class="eight-section-title appeight-headline pera-content text-center">
                <span class="eg-title-tag">  <i class="square-shape"> <i></i><i></i><i></i><i></i></i></span>
                <h2>لقطات شاشة التطبيق </h2>
            </div>
                <!-- /title -->

            <div class="row ei-appScreenshotCarousel-container swiper-container">
                <div class="ei-screen-mobile-image"></div>
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide" style="background-image:url({{$slider->background}})"></div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
            </div>
            <!-- Navigations -->
            <div class="banner-navigation">
                <div class="swiper-button-prev"><span class="fas fa-chevron-left"></span></div>
                <div class="swiper-button-next"><span class="fas fa-chevron-right"></span></div>
            </div>
        </div>
        <div class="screenshoot-vector screenshoot-shape1 position-absolute"> <img src="assets/img/app-s/shape/ss-shape1.png" alt=""></div>
        <div class="screenshoot-vector screenshoot-shape2 position-absolute"> <img src="assets/img/app-s/shape/ss-shape2.png" alt=""></div>
    </section>

@endsection

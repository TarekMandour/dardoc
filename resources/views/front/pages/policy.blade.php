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
                                <h2>حمل التطبيق الأن
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

    <section id="feature-eight" class="feature-eight-section position-relative" style="padding: 75px 0px 165px;">
        <div class="container">
            <div class="eight-section-title appeight-headline pera-content text-center">
                <span class="eg-title-tag">
                    {{$Settings->title}}  <i class="square-shape"><i></i><i></i> <i></i> <i></i> </i>
                </span>
                <h2>{{$data->title}}
                </h2>
            </div>
            <!-- /title -->

            <div class="eight-feature-content">
                <div class="row justify-content-md-center">
                    <div class="col-lg-12 col-md-12  wow fadeFromUp">
                        {!! $data->content !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="ei-feature-shape"><img src="assets/img/app-s/shape/f-shape1.png" alt=""></div>
    </section>

@endsection

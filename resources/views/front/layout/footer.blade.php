
    <section id="ei-footer" class="ei-footer-section position-relative" style="padding-top: 0px;">
        <div class="ei-footer-copyright">
            <div class="container">
                <div class="ei-footer-copyright-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="ei-copyright-menu">
                                <a href="{{url('/policy')}}">الشروط والأحكام </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <div class="ei-copyright-text text-right">
                                <p>© {{date('Y')}} <a href="https://uramit-eg.com"> Uramit-eg.com </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ei-footer-shape1 position-absolute" data-parallax='{"x" : 60}'><img src="{{ URL::asset('public/front')}}/assets/img/app-s/shape/fo-shape1.png" alt=""></div>
        <div class="ei-footer-shape2 position-absolute" data-parallax='{"y" : 60}'><img src="{{ URL::asset('public/front')}}/assets/img/app-s/shape/fo-shape2.png" alt=""></div>
        <div class="ei-footer-shape3 position-absolute"><img src="{{ URL::asset('public/front')}}/assets/img/app-s/shape/eimap.png" alt=""></div>
    </section>
    <!-- End of Footer  section
    ============================================= -->            

    <!-- JS library -->
    <script src="{{ URL::asset('public/front')}}/assets/js/jquery.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/popper.min.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/appear.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/owl.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/wow.min.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/pagenav.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/odometer.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/bxslider.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/parallax-scroll.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/swiper.min.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/typer-new.js"></script>
    <script src="{{ URL::asset('public/front')}}/assets/js/custom.js"></script>

    @yield('script')

</body>
</html>
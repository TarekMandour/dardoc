@extends('admin.layouts.master-without-nav')

@section('css')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-cover" style="background-image: url({{asset('public/admin/assets/media/illustrations/sketchy-1/14-2.png')}}">

    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{url('admin/login')}}">
                <!--begin::Heading-->@csrf
                <div class="text-center mb-10">
                    <!--begin::Logo-->
                    <a href="../../demo16/dist/index.html" class="mb-12">
                        <img alt="Logo" src="{{asset('public/admin/assets/media/logos/logo-1.svg')}}" class="h-40px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h1 class="text-primary mt-3">تسجيل الدخول</h1>
                    <!--end::Title-->
                </div>
                <!--begin::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label fs-6 fw-bolder text-dark">البريد الالكتروني</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control-lg form-control-solid" name="email" type="text" placeholder="ادخل البريد الالكتروني" autocomplete="off" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-2">
                        <!--begin::Label-->
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">كلمة المرور</label>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Input-->
                    <input class="form-control form-control-lg form-control-solid" type="password" name="password" placeholder="ادخل كلمة المرور" autocomplete="off" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <!--begin::Submit button-->
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">دخول</span>
                        <span class="indicator-progress">انتظر لحظات...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Submit button-->

                    <div class="text-center text-muted text-uppercase fw-bolder mb-5"></div>
                    <div class="m-t-40 text-center">
                        <p class="text-dark">© {{date('Y')}} {{ $Settings->title }},<br> Crafted with <i class="mdi mdi-heart text-danger"></i> by Arabiacode.com</p>
                    </div>

                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>

</div>
@endsection

@section('script')
    <script src="{{asset('public/admin/assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/custom/authentication/sign-in/general.js')}}"></script>
@endsection


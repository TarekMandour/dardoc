@extends('admin.layouts.master-without-nav')

@section('css')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<div class="d-flex flex-column flex-center flex-column-fluid p-10">
    <!--begin::Illustration-->
    <img src="{{asset('public/admin/assets/media/logos/404.svg')}}" alt="" class="mw-100  mb-10 h-lg-250px" />
{{--    <img src="{{asset('admin/assets/media/illustrations/sketchy-1/18.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />--}}
    <!--end::Illustration-->
    <!--begin::Message-->
    <h1 class="fw-bold mb-10" style="color: #A3A3C7">هذه الصفحة غير متوفره  !</h1>
    <!--end::Message-->
    <!--begin::Link-->
    <a href="javascript:;" onclick="goBack()" class="btn btn-primary">للرجوع للرئيسية</a>
    <!--end::Link-->
</div>
@endsection

@section('script')
    <script>
        function goBack() {
          window.history.back();
        }
        </script>
@endsection



@extends('admin.layouts.master')

@section('css')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Dashboard</h1>
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="text-center mb-10">
                <!--begin::Logo-->
                <a href="{{url('/admin')}}" class="mb-12">
                    <img alt="Logo" src="{{$Settings->logo1}}" class="h-200px" />
                </a>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection


@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">الاجراءات</h1>
@endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card mb-10 g-5">
                <!--begin::Content-->

                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" action="{{url('admin/store-detail-vacation')}}" class="form"
                                  method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->

                                    <div class="row mb-7">
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">اضف بيان</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea name="note" class="form-control form-control-solid mb-3 mb-lg-0" cols="30" rows="6"></textarea>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <div class="col-lg-6">

                                            
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">ارفع مرفق</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('public/admin')}}/assets/media/avatars/blank.png)"></div>
                                                        
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعديل">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Cancel-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="الغاء">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="حذف">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove-->
                                                    </div>
                                                    <!--end::Image input-->
                                                    <!--begin::Hint-->
                                                    <div class="form-text">الانواع المسموح بها: png, jpg, jpeg.</div>
                                                    <!--end::Hint-->
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                        </div>
                                    </div>        
        
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->
                                <input type="hidden" name="admin_vacation_id" value="{{$data->id}}" />
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">الغاء</button>
                                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">حفظ
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                    
                <!--end::Content-->
            </div>
            <!--end::Card-->

            <div class="card mb-5 g-5 g-xl-8">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bold text-dark">الاجراءات</span>
                    </h3>

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-3">
                    @foreach ($data->vacationdetails as $item)
                        <!--begin::Item-->
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-60px symbol-2by3 me-4">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-60px symbol-2by3 me-4">
                                <a class="d-block overlay" data-fslightbox="lightbox-basic" href="{{$item->photo}}">
                                    <div class="symbol-label" style="background-image: url('{{$item->photo}}')"></div>
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                            </div>
                            <!--begin::Action-->
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Content-->
                        <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                            <!--begin::Title-->
                            <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                <a href="#" class="text-muted fw-semibold text-hover-primary fs-6">{{$item->created_at}}</a>
                                <span class="text-gray-800 fw-bold d-block pt-1">{{$item->note}}</span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">

                                <a href="{{url("admin/delete-vacation-detail/" . $item->id)}}" class="btn btn-icon btn-danger btn-sm border-0">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Item-->
                    @endforeach
                    
                </div>
                <!--end::Body-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection

@section('js')
<script src="{{ URL::asset('public/admin/assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
@endsection
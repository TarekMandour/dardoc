@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">لائحة النادي</h1>
@endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">

                <!--begin::Content-->


                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" action="{{url('admin/update-partner')}}" class="form"
                                  method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{$data->id}}" required/>

                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">عنوان</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="title" class="form-control mb-2" placeholder="عنوان" value="{{$data->title}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">عنوان EN</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="title_en" class="form-control mb-2" placeholder="عنوان EN" value="{{$data->title_en}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">الوظيفه</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="link" class="form-control mb-2" placeholder="الوظيفه" value="{{$data->link}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <div class="col-6">

                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 col-form-label fw-bold fs-6">صورة</label>
                                                        <!--end::Label-->
                                                        <!--begin::Col-->
                                                        <div class="col-lg-8">
                                                            <!--begin::Image input-->
                                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                                <!--begin::Preview existing avatar-->
                                                                @if ($data->photo == Null)
                                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('public/admin')}}/assets/media/avatars/blank.png)"></div>
                                                                @else  
                                                                    <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{$data->photo}}" data-holder-rendered="true">
                                                                @endif
                                                                
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
                                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                            <!--end::Hint-->
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Tab content-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <a href="{{url('admin/partner')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">الغاء</a>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                            <span class="indicator-label">حفظ</span>
                                            <span class="indicator-progress">برجاء الانتظار
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                           
                            </form>
                            <!--end::Form-->

                    
                <!--end::Content-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->


@endsection

@section('js')
<script src="{{ URL::asset('public/admin/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
@endsection

@section('script')
<script>
    var options = {selector: "#kt_docs_tinymce_basic"};

    if (KTApp.isDarkMode()) {
        options["skin"] = "oxide-dark";
        options["content_css"] = "dark";
    }

    tinymce.init(options);

    var options2 = {selector: "#kt_docs_tinymce_basic2"};

    if (KTApp.isDarkMode()) {
        options2["skin"] = "oxide-dark";
        options2["content_css"] = "dark";
    }

    tinymce.init(options2);

</script>
@endsection

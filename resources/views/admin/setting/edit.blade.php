@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">الاعدادات</h1>
@endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Content-->

                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" action="{{url('admin/update-setting')}}" class="form"
                                  method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->

                                    <div class="row mb-7">
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">اسم المشروع</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="title"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="اسم المشروع" value="{{$data->title}}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">اسم المشروع EN</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="title_en"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="اسم المشروع انجليزي" value="{{$data->title_en}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">رقم الموبايل 1</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" name="phone1"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="رقم الموبايل 1" value="{{$data->phone1}}" required />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">رقم الموبايل 2</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" name="phone2"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="رقم الموبايل 2" value="{{$data->phone2}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">البريد الالكترونى 1</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="email1"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="البريد الالكتروني" value="{{$data->email1}}"
                                                       required />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">البريد الالكترونى 2</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="email2"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="البريد الالكتروني" value="{{$data->email2}}"
                                                       />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">العنوان</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="address"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="العنوان" value="{{$data->address}}" required />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">العنوان EN</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="address_en"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="العنوان EN" value="{{$data->address_en}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">الموقع الالكتروني</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="website"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="الموقع الالكتروني" value="{{$data->website}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">موقعتا على الخريطة</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="location"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="موقعتا على الخريطة" value="{{$data->location}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Whatsapp</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="whatsapp"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Whatsapp" value="{{$data->whatsapp}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Facebook</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="facebook"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Facebook" value="{{$data->facebook}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Twitter</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="twitter"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Twitter" value="{{$data->twitter}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Youtube</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="youtube"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Youtube" value="{{$data->youtube}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Linkedin</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="linkedin"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Linkedin" value="{{$data->linkedin}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Instagram</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="instagram"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Instagram" value="{{$data->instagram}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Snapchat</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="snapchat"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Snapchat" value="{{$data->snapchat}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Meta Keywords</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="meta_keywords"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Meta Keywords" value="{{$data->meta_keywords}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Meta Description</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="meta_description"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Meta Description" value="{{$data->meta_description}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">Meta Description EN</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="meta_description_en"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="Meta Description EN" value="{{$data->meta_description_en}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">اوقات العمل</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="work_time"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="اوقات العمل" value="{{$data->work_time}}" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">Main Logo</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        @if ($data->logo1 == Null)
                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('public/admin')}}/assets/media/avatars/blank.png)"></div>
                                                        @else  
                                                            <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{$data->logo1}}" data-holder-rendered="true">
                                                        @endif
                                                        
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعديل">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="logo1" accept=".png, .jpg, .jpeg" />
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

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">light Logo</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        @if ($data->logo2 == Null)
                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('public/admin')}}/assets/media/avatars/blank.png)"></div>
                                                        @else  
                                                            <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{$data->logo2}}" data-holder-rendered="true">
                                                        @endif
                                                        
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعديل">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="logo2" accept=".png, .jpg, .jpeg" />
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

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">Fav Icon</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        @if ($data->fav == Null)
                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('public/admin')}}/assets/media/avatars/blank.png)"></div>
                                                        @else  
                                                            <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{$data->fav}}" data-holder-rendered="true">
                                                        @endif
                                                        
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعديل">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="fav" accept=".png, .jpg, .jpeg" />
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

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">Breadcrumb</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        @if ($data->breadcrumb == Null)
                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('public/admin')}}/assets/media/avatars/blank.png)"></div>
                                                        @else  
                                                            <img class="img-thumbnail" id="get_photo_link" style="width: 200px;" src="{{$data->breadcrumb}}" data-holder-rendered="true">
                                                        @endif
                                                        
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعديل">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="breadcrumb" accept=".png, .jpg, .jpeg" />
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

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">PDF</label>
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
                                                            <input type="file" name="pdf" accept=".pdf" />
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
                                                    <div class="form-text">Allowed file types: PDF.</div>
                                                    <!--end::Hint-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                        </div>
                                    </div>        
        
                                </div>
                                <!--end::Scroll-->
                                <!--begin::Actions-->
        
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
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection

@section('js')
@endsection
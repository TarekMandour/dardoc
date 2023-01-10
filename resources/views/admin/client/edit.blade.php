@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">العملاء | {{$data->name}}</h1>
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


                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                    @if($data->type == 0)
                        <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                   href="#client_data" onclick="">بيانات العميل </a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#Followers" onclick="followers()">التابعين</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#Cards" onclick="cards()">الكروت</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#Debts" onclick="debits()">الديون</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#payment" onclick="payment()">المدفوعات</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#notification" onclick="notification()">الاشعارات</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                    @endif
                    <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->

                        <div class="tab-pane fade show active" id="client_data" role="tab-panel">
                            <form id="kt_account_profile_details_form" action="{{url('admin/update-client')}}"
                                  class="form"
                                  method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label fw-bold fs-6">صورة
                                                    البروفايل</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline"
                                                         data-kt-image-input="true"
                                                         style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                             style="background-image: url({{$data->photo}})"></div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="تعديل">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="photo" accept=".png, .jpg, .jpeg"/>
                                                            <input type="hidden" name="avatar_remove"/>
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Cancel-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="الغاء">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                            title="حذف">
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
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">الاسم بالكامل</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="الاسم" value="{{$data->name}}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->  <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">البريد الالكترونى</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="email"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="البريد الالكتروني" value="{{$data->email}}"
                                                />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">رقم الجوال</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel" name="phone"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="رقم الجوال" value="{{$data->phone}}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">كلمة المرور</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="كلمة المرور" value=""/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">تأكيد كلمة المرور</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password_confirmation"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="تأكيد كلمة المرور" value=""/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">رقم العضوية</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="membership_no"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="رقم العضوية" value="{{$data->membership_no}}"
                                                       required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">الرقم القومي</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="national_no"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="الرقم القومي" value="{{$data->national_no }}"
                                                       required/>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">الوظيفة</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="jop"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="الوظيفة" value="{{$data->jop }}" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class=" fw-bold fs-6 mb-2">اسم المفوض</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="delegate_name"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="اسم المفوض" value="{{$data->delegate_name }}" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">تاريخ الميلاد</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="date" name="birth_date"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="تاريخ الميلاد"
                                                       value="{{Carbon\Carbon::parse($data->birth_date)->format("Y-m-d")}}"
                                                       />
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">تاريخ التسجيل</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="date" name="register_date"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                                       placeholder="تاريخ التسجيل"
                                                       value="{{Carbon\Carbon::parse($data->register_date)->format("Y-m-d")}}"
                                                       />

                                                <input type="hidden" name="type" value="{{$data->type}}">
                                                <input type="hidden" name="parent_id" value="{{$data->parent_id}}">
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <div
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <label class="form-check-label" for="flexSwitchDefault">مفعل
                                                        ؟</label>
                                                    <input class="form-check-input" name="is_active" type="hidden"
                                                           value="0" id="flexSwitchDefault"
                                                           @if($data->is_active == 0) checked @endif/>
                                                    <input
                                                        class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                                        name="is_active" type="checkbox"
                                                        value="1" id="flexSwitchDefault"
                                                        @if($data->is_active == 1) checked @endif/>
                                                </div>
                                            </div>
                                            <!--end::Input group-->


                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                    <div class="d-flex justify-content-end">

                                        <!--begin::Button-->
                                        <a href="{{url('admin/client')}}"
                                           id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">الغاء</a>
                                        <!--end::Button-->
                                        <button type="submit" id="kt_ecommerce_add_product_submit"
                                                class="btn btn-primary">
                                            <span class="indicator-label">حفظ</span>
                                            <span class="indicator-progress">برجاء الانتظار
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>


                                <!--begin::Button-->
                            </form>
                        </div>

                        <div class="tab-pane fade" id="Followers" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_followers">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                               data-kt-check="true"
                                                               data-kt-check-target="#data_table .form-check-input"
                                                               value=""/>
                                                    </div>
                                                </th>

                                                <th class="min-w-125px">الاسم</th>
                                                <th class="min-w-125px">رقم الجوال</th>
                                                <th class="min-w-125px">رقم العضوية</th>
                                                <th class="min-w-125px">الوظيفة</th>
                                                <th class="min-w-125px">الحالة</th>
                                                <th class="min-w-125px">تاريخ الانشاء</th>
                                                <th class=" min-w-100px">الاجراءات</th>
                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="Cards" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_cards">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                               data-kt-check="true"
                                                               data-kt-check-target="#data_table_cards .form-check-input"
                                                               value=""/>
                                                    </div>
                                                </th>

                                                <th class="min-w-125px">اسم الكارت</th>
                                                <th class="min-w-125px">تاريخ الانشاء</th>

                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Debts" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_debts">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                               data-kt-check="true"
                                                               data-kt-check-target="#data_table_debts .form-check-input"
                                                               value=""/>
                                                    </div>
                                                </th>

                                                <th class="min-w-125px">التاريخ</th>
                                                <th class="min-w-125px">المبلغ</th>
                                                <th class="min-w-125px">تاريخ الانشاء</th>
                                                <th class="min-w-125px">الاجرائات</th>

                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_payment">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                               data-kt-check="true"
                                                               data-kt-check-target="#data_table_payment .form-check-input"
                                                               value=""/>
                                                    </div>
                                                </th>

                                                <th class="min-w-125px">التاريخ</th>
                                                <th class="min-w-125px">المبلغ</th>
                                                <th class="min-w-125px">تاريخ الانشاء</th>
                                                <th class="min-w-125px">الاجرائات</th>

                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="notification" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <table class="table align-middle table-row-dashed fs-4 gy-5"
                                               id="data_table_notification">
                                            <!--begin::Table head-->
                                            <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                               data-kt-check="true"
                                                               data-kt-check-target="#data_table_notification .form-check-input"
                                                               value=""/>
                                                    </div>
                                                </th>

                                                <th class="min-w-125px">العنوان</th>
                                                <th class="min-w-125px">التفاصيل</th>
                                                <th class="min-w-125px">تاريخ الانشاء</th>
{{--                                                <th class="min-w-125px">الاجرائات</th>--}}

                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->


                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>


                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->

                </div>


                <!--end::Form-->


                <!--end::Content-->
                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">اضف جديد</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                     data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="black"/>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="black"/>
                                </svg>
                            </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="" class="form" method="post" action="{{url('admin/store-client')}}"
                                      enctype="multipart/form-data">
                                @csrf

                                <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                         id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                         data-kt-scroll-activate="{default: false, lg: true}"
                                         data-kt-scroll-max-height="auto"
                                         data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                         data-kt-scroll-offset="300px">

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">صورة البروفايل</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                     style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                         style="background-image: url({{asset('public/admin')}}/assets/media/avatars/blank.png)"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="تعديل">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="photo" accept=".png, .jpg, .jpeg"
                                                               />
                                                        <input type="hidden" name="avatar_remove"/>
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="الغاء">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="حذف">
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
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الاسم بالكامل</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="name"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الاسم" value="{{old('name')}}" required/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->  <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fw-bold fs-6 mb-2">البريد الالكترونى</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="email" name="email"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="البريد الالكتروني" value="{{old('email')}}"
                                            />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">رقم الجوال</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="tel" name="phone"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="رقم الجوال" value="{{old('phone')}}" required/>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">كلمة المرور</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="password" name="password"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="كلمة المرور" value="" required/>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">تأكيد كلمة المرور</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="password" name="password_confirmation"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="تأكيد كلمة المرور" value="" required/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">رقم العضوية</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="membership_no"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="رقم العضوية"
                                                   value="{{$data->membership_no}}-{{$count_followers+1}}" required
                                                   readonly/>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">الرقم القومي</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="national_no"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الرقم القومي"
                                                   value="{{$data->national_no}}-{{$count_followers+1}}" required/>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">الوظيفة</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="jop"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الوظيفة" value="{{old('jop')}}" />
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">اسم المفوض</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="delegate_name"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="اسم المفوض" value="{{old('delegate_name')}}" />
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">تاريخ الميلاد</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" name="birth_date"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="تاريخ الميلاد" value="{{old('birth_date')}}" />
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">تاريخ التسجيل</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" name="register_date"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="تاريخ التسجيل" value="{{old('register_date')}}"
                                                   />
                                            <input type="hidden" name="type" value="1">
                                            <input type="hidden" name="parent_id" value="{{$data->id}}">

                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <div
                                                class="form-check form-switch form-check-custom form-check-solid">
                                                <label class="form-check-label" for="flexSwitchDefault">مفعل
                                                    ؟</label>
                                                <input class="form-check-input" name="is_active" type="hidden"
                                                       value="0" id="flexSwitchDefault"/>
                                                <input
                                                    class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                                    name="is_active" type="checkbox"
                                                    value="1" id="flexSwitchDefault" checked/>
                                            </div>
                                        </div>
                                        <!--end::Input group-->


                                    </div>
                                    <!--end::Scroll-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                                data-bs-dismiss="modal">ألغاء
                                        </button>
                                        <button type="submit" class="btn btn-primary"
                                                data-kt-users-modal-action="submit">
                                            <span class="indicator-label">حفظ</span>
                                            <span class="indicator-progress">برجاء الانتظار
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>

                <!--end::Modal - Add task-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->


@endsection

@section('js')
    <script src="{{ URL::asset('public/admin/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script type="text/javascript">
        var check_followers = false;
         function followers(){
             if(check_followers == false){
                 $(function () {
                     var table = $('#data_table_followers').DataTable({
                         processing: true,
                         serverSide: true,
                         autoWidth: false,
                         responsive: true,
                         aaSorting: [],
                         "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                         lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                         "language": {
                             search: '',
                             searchPlaceholder: 'بحث سريع'
                         },
                         buttons: [
                             {
                                 extend: 'print',
                                 className: 'btn btn-light-primary me-3',
                                 text: '<i class="bi bi-printer-fill fs-2x"></i>'
                             },
                             // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                             {
                                 extend: 'excel',
                                 className: 'btn btn-light-primary me-3',
                                 text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                             },
                             // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                         ],
                         ajax: {
                             url: '{{ route('follower.datatable.data',$data->id)}}',
                             data: {}
                         },
                         columns: [
                             {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                             {data: 'name', name: 'name', "searchable": true, "orderable": true},
                             {data: 'phone', name: 'phone', "searchable": true, "orderable": true},
                             {data: 'membership_no', name: 'membership_no', "searchable": true, "orderable": true},
                             {data: 'job', name: 'job', "searchable": true, "orderable": true},
                             {data: 'is_active', name: 'is_active', "searchable": false, "orderable": false},
                             {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},
                             {data: 'actions', name: 'actions', "searchable": false, "orderable": false},
                         ]
                     });
                     $.ajax({
                         url: "{{ URL::to('admin/add-client-button')}}",
                         success: function (data) {
                             $('.add_button').append(data);
                             check_followers = true;
                         },
                         dataType: 'html'
                     });
                 });
             }

        }

    </script>
    <script type="text/javascript">
        var check_cards = false;
        function cards(){
            if(check_cards == false){
                $(function () {
                    var table = $('#data_table_cards').DataTable({
                        processing: true,
                        serverSide: true,
                        autoWidth: false,
                        responsive: true,
                        aaSorting: [],
                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button2'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                        "language": {
                            search: '',
                            searchPlaceholder: 'بحث سريع'
                        },
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-printer-fill fs-2x"></i>'
                            },
                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                            {
                                extend: 'excel',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                            },
                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                        ],
                        ajax: {
                            url: '{{ route('client.cards.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                            {data: 'name', name: 'name', "searchable": true, "orderable": true},
                            {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},

                        ]
                    });
                    $.ajax({
                        url: "{{ URL::to('admin/add-client-card-button/'.$data->id)}}",
                        success: function (data) {
                            $('.add_button2').append(data);
                            check_cards=true;
                        },
                        dataType: 'html'
                    });
                });
            }

        }

    </script>
    <script type="text/javascript">
        var check_debits = false;
        function debits(){
            if (check_debits == false){
                $(function () {
                    var table = $('#data_table_debts').DataTable({
                        processing: true,
                        serverSide: true,
                        autoWidth: false,
                        responsive: true,
                        aaSorting: [],
                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button3'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                        "language": {
                            search: '',
                            searchPlaceholder: 'بحث سريع'
                        },
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-printer-fill fs-2x"></i>'
                            },
                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                            {
                                extend: 'excel',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                            },
                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                        ],
                        ajax: {
                            url: '{{ route('client.debts.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                            {data: 'date', name: 'date', "searchable": true, "orderable": true},
                            {data: 'amount', name: 'amount', "searchable": true, "orderable": true},
                            {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},
                            {data: 'actions', name: 'actions', "searchable": true, "orderable": true},

                        ]
                    });
                    $.ajax({
                        url: "{{ URL::to('admin/add-client-debts-button/'.$data->id)}}",
                        success: function (data) {
                            $('.add_button3').append(data);
                            check_debits = true;
                        },
                        dataType: 'html'
                    });
                });
            }

        }

    </script>
    <script type="text/javascript">
        var check_payment = false;
        function payment(){
            if(check_payment == false ){
                $(function () {
                    var table = $('#data_table_payment').DataTable({
                        processing: true,
                        serverSide: true,
                        autoWidth: false,
                        responsive: true,
                        aaSorting: [],
                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button4'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                        "language": {
                            search: '',
                            searchPlaceholder: 'بحث سريع'
                        },
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-printer-fill fs-2x"></i>'
                            },
                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                            {
                                extend: 'excel',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                            },
                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                        ],
                        ajax: {
                            url: '{{ route('client.payment.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                            {data: 'date', name: 'date', "searchable": true, "orderable": true},
                            {data: 'amount', name: 'amount', "searchable": true, "orderable": true},
                            {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},
                            {data: 'actions', name: 'actions', "searchable": true, "orderable": true},

                        ]
                    });
                    $.ajax({
                        url: "{{ URL::to('admin/add-client-payment-button/'.$data->id)}}",
                        success: function (data) {
                            $('.add_button4').append(data);
                            check_payment =true;
                        },
                        dataType: 'html'
                    });
                });
            }

        }

    </script>
    <script type="text/javascript">
        var check_notification = false;
        function notification(){
            if (check_notification == false){
                $(function () {
                    var table = $('#data_table_notification').DataTable({
                        processing: true,
                        serverSide: true,
                        autoWidth: false,
                        responsive: true,
                        aaSorting: [],
                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button5'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                        lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                        "language": {
                            search: '',
                            searchPlaceholder: 'بحث سريع'
                        },
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-printer-fill fs-2x"></i>'
                            },
                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                            {
                                extend: 'excel',
                                className: 'btn btn-light-primary me-3',
                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                            },
                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                        ],
                        ajax: {
                            url: '{{ route('client.notification.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                            {data: 'title', name: 'title', "searchable": true, "orderable": true},
                            {data: 'body', name: 'body', "searchable": true, "orderable": true},
                            {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},
                            // {data: 'actions', name: 'actions', "searchable": true, "orderable": true},

                        ]
                    });
                    $.ajax({
                        url: "{{ URL::to('admin/add-client-notification-button/'.$data->id)}}",
                        success: function (data) {
                            $('.add_button5').append(data);
                            check_notification = true;
                        },
                        dataType: 'html'
                    });
                });
            }

        }

    </script>
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

        var options3 = {selector: "#kt_docs_tinymce_basic3"};

        if (KTApp.isDarkMode()) {
            options2["skin"] = "oxide-dark";
            options2["content_css"] = "dark";
        }

        tinymce.init(options3);

        var options4 = {selector: "#kt_docs_tinymce_basic4"};

        if (KTApp.isDarkMode()) {
            options2["skin"] = "oxide-dark";
            options2["content_css"] = "dark";
        }

        tinymce.init(options4);

    </script>
@endsection

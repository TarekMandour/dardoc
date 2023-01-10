@extends('admin.layouts.master')

@section('css')
<link href="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />

<style>
    table,
    th,
    td {
      padding: 10px;
      border: 1px solid black !important;
      border-collapse: collapse;
    }
</style>
@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">الحالة</h1>
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
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <button type="button" class="btn btn-info me-3" id="copy_btn">
                        نسـخ
                    </button>

                    <button type="button" class="btn btn-dark me-3" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user">
                        تعديل الملاحظات
                    </button>

                    <br><br>
                    
                    <table>

                        <tr style="background-color:#f9f9f9;">
                        <td width="189" style="border: 1px solid black !important;" height="25">تصنيف الحالة</td>
                        <td width="189" style="border: 1px solid black !important;" height="25" colspan="2">
                            حالة اجازة
                        </td>
                        </tr>
                        <tr style="background-color:#f9f9f9;">
                        <td width="189" style="border: 1px solid black !important;" height="25">اسم</td>
                        <td width="189" style="border: 1px solid black !important;" height="25" colspan="2">{{$admin->name}} </td>
                        </tr>
                        <tr style="background-color:#f9f9f9;">
                        <td width="189" style="border: 1px solid black !important;" height="25">التاريخ</td>
                        <td width="189" style="border: 1px solid black !important;" height="25" colspan="2">{{$data->created_at}}</td>
                        </tr>
                        <tr style="background-color:#f9f9f9;">
                        <td width="189" style="border: 1px solid black !important;" height="25">الحالة</td>
                        <td width="189" style="border: 1px solid black !important;" height="25" colspan="2">{{$data->name}}</td>
                        </tr>
                        <tr style="background-color:#f9f9f9;">
                        <td width="189" style="border: 1px solid black !important;" height="25">بدايتها</td>
                        <td width="189" style="border: 1px solid black !important;" height="25">{{$data->startdate}}</td>
                        <td width="189" style="border: 1px solid black !important;" height="25">ايام الاجازة</td>
                        </tr>
                        <tr style="background-color:#f9f9f9;">
                        <td width="189" style="border: 1px solid black !important;" height="25">نهايتها</td>
                        <td width="189" style="border: 1px solid black !important;" height="25">{{$data->enddate}}</td>
                        <td width="189" style="border: 1px solid black !important;" height="25">
                            <?php 
                                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', date("Y-m-d H:s:i", strtotime($data->enddate)));
                                $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', date("Y-m-d H:s:i", strtotime($data->startdate)));

                                $diff_in_days = $to->diffInDays($from);
                                echo $diff_in_days;
                            ?>
                        </td>
                        </tr>
                        </tr>
                        <tr style="background-color:#f9f9f9;">
                        <td width="189" style="border: 1px solid black !important;" height="25">ملاحظات</td>
                        <td width="189" style="border: 1px solid black !important;" height="25" colspan="2" id="description"></td>
                        </tr>
                        <tr style="background-color:#f9f9f9;">
                        <td width="189" style="border: 1px solid black !important;" height="25">الاجراء المتخذ</td>
                        <td width="189" style="border: 1px solid black !important;" height="25" colspan="2">رصد الحالة في الوحدة المحلية</td>
                        </tr>
                        <tr style="background-color:#f9f9f9;">
                        <td width="189" style="border: 1px solid black !important;" height="25">التوجيهات</td>
                        <td width="189" style="border: 1px solid black !important;" height="25" colspan="2">اعتماد الوحدة الادارية</td>
                        </tr>
                        
                    </table>
                      

                    <!--end::Table-->
                </div>
                <!--end::Card body-->

            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->

<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">الملاحظات</h2>
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

                <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                        id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                        data-kt-scroll-offset="300px">



                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">الملاحظة</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="addcontent" id="addcontent"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="الملاحظة" value=""/>
                            <!--end::Input-->
                        </div>


                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3"
                                data-bs-dismiss="modal">ألغاء
                        </button>
                        <button type="button" class="btn btn-primary"
                        data-bs-dismiss="modal" onclick="addcoment()">
                            <span class="indicator-label">حفظ</span>
                            <span class="indicator-progress">برجاء الانتظار
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->

                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@endsection

@section('js')
<script src="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>

    function addcoment() {
    
        document.getElementById("description").innerHTML = document.getElementById("addcontent").value;
    }
    

    var copyBtn = document.querySelector('#copy_btn');
    copyBtn.addEventListener('click', function () {
    var urlField = document.querySelector('table');
    
    // create a Range object
    var range = document.createRange();  
    // set the Node to select the "range"
    range.selectNode(urlField);
    // add the Range to the set of window selections
    window.getSelection().addRange(range);
    
    // execute 'copy', can't 'cut' in this case
    document.execCommand('copy');
    }, false);
</script>
@endsection
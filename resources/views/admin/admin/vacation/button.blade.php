<div class="dt-buttons flex-wrap">

    <!--end::Filter-->
{{--    <a href="{{url('admin/create-client-card/'.$data->id)}}" class="btn btn-light-primary me-3">--}}
{{--        <i class="bi bi-plus-circle-fill fs-2x"></i>--}}
{{--    </a>--}}
    @can('اضافة اجازة')
    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
            data-bs-target="#kt_modal_add_card">
        <i class="bi bi-plus-circle-fill fs-2x"></i>
    </button>
    @endcan

    @can('حذف اجازة')
    <!--end::Add user-->
    <button id="delete2" class="btn btn-light-danger me-3 font-weight-bolder">
        <i class="bi bi-trash-fill fs-2x"></i>
    </button>
    @endcan

</div>


<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_card" tabindex="-1" aria-hidden="true">
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
                <form id="" class="form" method="post" action="{{url('admin/store-admin-vacation')}}" enctype="multipart/form-data">
                @csrf
                <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                         id="kt_modal_add_user_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_user_header"
                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                         data-kt-scroll-offset="300px">


                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">الاجازات</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid mb-3 mb-lg-0"
                                    name="vacation_id" aria-label=""  id="vacation_id">
                                <option value="">اختر من الاجازات</option>
                                @foreach(\App\Models\Vacation::get() as $state)
                                    <option  value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--begin::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">تاريخ البدء  </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="datetime-local" name="startdate"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="تاريخ البدء " value="{{old('startdate')}}" required/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">تاريخ الانتهاء  </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="datetime-local" name="enddate"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="تاريخ الانتهاء" value="{{old('enddate')}}" required/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <input type="hidden" name="admin_id" value="{{$data->id}}">
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


<script type="text/javascript">

    $("#delete2").on("click", function () {
        var dataList = [];
        $("input:checkbox:checked").each(function (index) {
            dataList.push($(this).val())
        })
        if (dataList.length > 0) {
            Swal.fire({
                title: "تحذير.هل انت متأكد؟!",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url("admin/delete-admin-vacation")}}',
                        type: "get",
                        data: {'id': dataList, _token: CSRF_TOKEN},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                $("input:checkbox:checked").parents("tr").remove();
                                Swal.fire("", "تم الحذف بنجاح", "success");
                                // location.reload();
                            } else {
                                Swal.fire("", "حدث خطأ ما اثناء الحذف", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
                            Swal.fire("", "حدث خطأ ما اثناء الحذف", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("ألغاء", "تم الالغاء", "error");
                }
            });
        }
    });
</script>

<script>

</script>

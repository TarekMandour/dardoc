@extends('admin.layouts.master')

@section('css')
<link href="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">تقرير الموظفين</h1>
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
                    <table class="table align-middle table-row-dashed fs-4 gy-5" id="data_table">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->

                        <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                            <th class="w-10px pe-2">#</th>
                            <th class="min-w-125px">اسم القسـم</th>
                            <th class="min-w-125px">عدد الموظفيـن</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tfoot>
                            <tr class="fs-2">
                             <th colspan="2" class="text-start">اجمالي الموظفين</th>
                             <th id="total_order"></th>
                            </tr>
                        </tfoot>


                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->

                <!--begin::Modal - Add task-->
                <div id="addModel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content" dir="rtl">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">فلتر</h2>
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
                                <form id="" class="form" method="post" action="{{url('admin/store-admin')}}" enctype="multipart/form-data">
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
                                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('public/admin')}}/assets/media/avatars/blank.png)"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="تعديل">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="profile" accept=".png, .jpg, .jpeg" />
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
                                            <label class="required fw-bold fs-6 mb-2">البريد الالكترونى</label>
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
                                            <label class="fw-bold fs-6 mb-2">رقم الموظف</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" name="emp_code"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="رقم الموظف" value="{{old('emp_code')}}"/>
                                            <!--end::Input-->
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">الاقسام</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-control-solid mb-3 mb-lg-0"
                                                    name="cat_id" aria-label=""  id="cat_id">
                                                <option value="">اختر قسم</option>
                                                @foreach(\App\Models\Category::where('parent',0)->get() as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
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
                
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!--end::Modal - Add task-->
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
<script src="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script type="text/javascript">
    $(function () {

        load_data();

        function load_data(todate = '', fromdate='', branch_id = '', type = '', pay_type = '') {
            var table = $('#data_table').DataTable({
                processing: false,
                serverSide: true,
                autoWidth: false,
                searching: true,
                responsive: true,
                aaSorting: [],
                "dom": "<'border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '',
                    searchPlaceholder: 'بحث سريع'
                },
                buttons: [
                    {
                        extend: 'print',
                        className: 'btn btn-info btn-hover-rise me-2 m-1',
                        text: '<i class="bi bi-printer-fill fs-3"></i>'
                    },
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {
                        extend: 'excel',
                        className: 'btn btn-success btn-hover-rise me-2 m-1',
                        text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-3"></i>'
                    },

                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                ],
                ajax: {
                    url: '{{ route("employee.datatable.data") }}',
                    data:{todate:todate, fromdate:fromdate, branch_id:branch_id, type:type, pay_type:pay_type}
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'count', name: 'count', "searchable": false, "orderable": true},
                ],
                drawCallback: function (row, data, start, end, display) {
                    
                },
                initComplete: function (data) {
                    var api = this.api();
        
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                    };

                    // Total over all pages
                    total = api
                    .column('2')
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    pageTotal = api
                    .column(2, { page: 3 })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    // Update footer
                    $(api.column(2).footer()).html(data.json.total);
                }
            });
        }

        $('#filter').click(function(){
            var todate = $('#todate').val();
            var fromdate = $('#fromdate').val();
            var branch_id = $('#branch_id').val();
            var type = $('#type').val();
            var pay_type = $('#pay_type').val();
            
            $('#datatable').DataTable().destroy();
            load_data(todate, fromdate, branch_id, type, pay_type);
        });
    });
</script>
@endsection
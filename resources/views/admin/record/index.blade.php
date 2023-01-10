@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('public/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
          type="text/css"/>
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Records List</h1>
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
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#data_table .form-check-input" value=""/>
                                    </div>
                                </th>

                                <th class="">#</th>
                                <th class="min-w-125px">Name</th>
                                <th class="min-w-125px">Pregnancy</th>
                                <th class="min-w-125px">Created at</th>
                                <th class=" min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->


                            <!--end::Table body-->
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

    <div id="addModel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Filter</h2>
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

                            <div class="row">
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-bold fs-6 mb-2">From Date:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" name="startdate" id="startdate"
                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                            value=""/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-bold fs-6 mb-2">From Age:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" name="from_age" id="from_age"
                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                            value=""/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="form-label">Pregnancy:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-control form-control-solid" name="pregnancy" id="pregnancy" aria-label="">
                                            <option value="1">No communication</option>
                                            <option value="2">Pregnant</option>
                                            <option value="3">Not pregnant</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->  <!--begin::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-bold fs-6 mb-2">To Date:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" name="enddate" id="enddate"
                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                            value=""/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-bold fs-6 mb-2">To Age:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" name="to_age" id="to_age"
                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                            value=""/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->  <!--begin::Input group-->
                                </div>
                            </div>
                            

                            

                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">Cancel
                            </button>
                            <button type="button" class="btn btn-primary"
                                    id="filter" data-bs-dismiss="modal">
                                <span class="indicator-label">Save</span>
                            </button>
                        </div>
                        <!--end::Actions-->

                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
    
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script src="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script type="text/javascript">
        $(function () {
            empolyee();
            function empolyee(startdate='', enddate = ''){
            $('#data_table').DataTable().destroy();

                var table = $('#data_table').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    responsive: true,
                    aaSorting: [],
                    "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                    lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                    "language": {
                        search: '',
                        searchPlaceholder: 'Search'
                    },
                    buttons: [
                        {
                            extend: 'print',
                            className: 'btn btn-light-dark me-3',
                            text: '<i class="bi bi-printer-fill fs-2x"></i>'
                        },
                        // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                        {
                            extend: 'excel',
                            className: 'btn btn-light-dark me-3',
                            text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'
                        },
                        {
                            text: '<i class="bi bi-funnel-fill fs-3"></i>',
                            className: 'btn btn-light-dark me-3',
                            action: function ( e, dt, node, config ) {
                                $('#addModel').modal('show');
                            }
                        },
                        // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                    ],
                    ajax: {
                        url: '{{ route('record.datatable.data') }}',
                        data: {startdate:startdate, enddate:enddate}
                    },
                    columns: [
                        {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                        {data: 'id', name: 'patient_name', "searchable": true, "orderable": true},
                        {data: 'patient_name', name: 'patient_name', "searchable": true, "orderable": true},
                        {data: 'pregnancy', name: 'pregnancy', "searchable": false, "orderable": true},
                        {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},
                        {data: 'actions', name: 'actions', "searchable": false, "orderable": false},
                    ]
                });
            }

            $('#filter').click(function(){
                var startdate = $('#startdate').val();
                var enddate = $('#enddate').val();

                $('#data_table').DataTable().destroy();
                empolyee(startdate, enddate);
                $.ajax({
                url: "{{ URL::to('admin/add-record-button')}}",
                success: function (data) {
                    $('.add_button').append(data);
                },
                dataType: 'html'
            });
            });

            $.ajax({
                url: "{{ URL::to('admin/add-record-button')}}",
                success: function (data) {
                    $('.add_button').append(data);
                },
                dataType: 'html'
            });
        });
    </script>
@endsection

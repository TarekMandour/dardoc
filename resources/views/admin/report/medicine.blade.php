@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Reports </h1>
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
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <div class="card card-flush py-4">
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <table class="table align-middle table-row-dashed fs-4 gy-5"
                                       id="data_table_medicine">
                                    <!--begin::Table head-->
                                    <thead>
                                    <!--begin::Table row-->

                                    <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                        <th class="w-10px pe-2">#</th>
                                        <th class="min-w-125px">Name</th>
                                        <th class="min-w-125px">Count</th>

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
                    <!--end::Tab content-->

                </div>

                <!--begin::Modal - Add task-->
                <div id="addModel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content" dir="rtl">
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


                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fw-bold fs-6 mb-2">From Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" name="startdate" id="startdate"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                value=""/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->  <!--begin::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fw-bold fs-6 mb-2">To Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" name="enddate" id="enddate"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                value=""/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->  <!--begin::Input group-->

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
                </div><!-- /.modal -->
                <!--end::Modal - Add task-->

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
    <script src="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>

    <script type="text/javascript">
        var check_cards = false;
        empolyee();
        function empolyee(startdate='', enddate = ''){
            $('#data_table_medicine').DataTable().destroy();
            if(check_cards == false){
                $(function () {
                    var table = $('#data_table_medicine').DataTable({
                        processing: false,
                        serverSide: true,
                        autoWidth: false,
                        responsive: true,
                        bInfo: false,
                        paginate: false,
                        searching: false,
                        aaSorting: [],
                        "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button2'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                        lengthMenu: [[ 25, 50, 100, 250, -1], [25, 50, 100, 250, "All"]],
                        "language": {
                            search: '',
                            searchPlaceholder: 'Search'
                        },
                        buttons: [
                            {
                                extend: 'print',
                                className: 'btn btn-dark btn-hover-rise me-2 m-1',
                                text: '<i class="bi bi-printer-fill fs-3"></i>'
                            },
                            // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                            {
                                extend: 'excel',
                                className: 'btn btn-dark btn-hover-rise me-2 m-1',
                                text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-3"></i>'
                            },
                            { 
                                text: '<i class="bi bi-funnel-fill fs-3"></i>',
                                className: 'btn btn-dark btn-hover-rise me-2 m-1',
                                action: function ( e, dt, node, config ) {
                                    $('#addModel').modal('show');
                                }
                            },
                            // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
                        ],
                        ajax: {
                            url: '{{ route('medicine_em.datatable.data')}}',
                            data: {startdate:startdate, enddate:enddate}
                        },
                        columns: [
                            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                            {data: 'name', name: 'name', "searchable": true, "orderable": true},
                            {data: 'count', name: 'count', "searchable": false, "orderable": true},

                        ]
                    });

                });
            }

        }

        $('#filter').click(function(){
            var startdate = $('#startdate').val();
            var enddate = $('#enddate').val();

            $('#data_table_medicine').DataTable().destroy();
            empolyee(startdate, enddate);
        });

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














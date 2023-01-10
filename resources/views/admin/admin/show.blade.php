@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Employee | {{$data->name}}</h1>
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
                                   href="#client_data" onclick="">Employee Information </a>
                            </li>
                            <!--end:::Tab item-->
                    @endif
                    <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->

                        <div class="tab-pane fade show active" id="client_data" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        
                                        <!--begin::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Full Name</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <span class="fw-bolder fs-6 text-gray-800">{{$data->name}}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Input group-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Phone</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <span class="fw-bold text-gray-800 fs-6">{{$data->phone}}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <span class="fw-bold text-gray-800 fs-6">{{$data->email}}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Is Active ?</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                @if ($data->is_active == 1)
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">Not Active</span>
                                                @endif
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        
                                        <hr>
                                        <a href="{{url('admin/edit-admin')}}/{{$data->id}}" class="btn btn-primary align-self-center">Edit</a>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>
                        </div>

                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->

                </div>


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
        function status(){
            if(check_cards == false){
                $(function () {
                    $('#data_table_status').DataTable().destroy();
                    var table = $('#data_table_status').DataTable({
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
                            url: '{{ route('admin.status.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                            {data: 'id', name: 'id', "searchable": true, "orderable": true},
                            {data: 'name', name: 'name', "searchable": true, "orderable": true},
                            {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},
                            {data: 'actions', name: 'actions', "searchable": false, "orderable": true},

                        ]
                    });
                    $.ajax({
                        url: "{{ URL::to('admin/add-admin-status-button/'.$data->id)}}",
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
        function vacation(){
            if (check_debits == false){
                $(function () {
                    $('#data_table_vacation').DataTable().destroy();
                    var table = $('#data_table_vacation').DataTable({
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
                            url: '{{ route('admin.vacation.datatable.data',$data->id)}}',
                            data: {}
                        },
                        columns: [
                            {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                            {data: 'startdate', name: 'startdate', "searchable": true, "orderable": true},
                            {data: 'enddate', name: 'startdate', "searchable": true, "orderable": true},
                            {data: 'days', name: 'days', "searchable": false, "orderable": true},
                            {data: 'actions', name: 'actions', "searchable": false, "orderable": true},

                        ]
                    });
                    $.ajax({
                        url: "{{ URL::to('admin/add-admin-vacation-button/'.$data->id)}}",
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














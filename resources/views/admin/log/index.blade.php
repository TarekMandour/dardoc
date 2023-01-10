@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('public/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
          type="text/css"/>
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
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="data_table">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->

                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                <th class="min-w-125px">رقم الحالة</th>
                                <th class="min-w-125px">اسم الموظف</th>
                                <th class="min-w-125px">القسم </th>
                                <th class="min-w-125px">نوع الاجراء</th>
                                <th class="min-w-125px">تاريخ الحالة</th>
                                <th class="min-w-125px">تاريخ البداية</th>
                                <th class="min-w-125px">تاريخ النهاية </th>
                                <th class="min-w-125px">عدد ايام الاجازة</th>
                                <th class="min-w-125px">اسم منشئ الطلب</th>
                                <th class=" min-w-100px">البيان</th>
                                <th class=" min-w-100px">التاريخ</th>
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
@endsection

@section('js')
    <script src="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script type="text/javascript">
        $(function () {
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
                    url: '{{ route('log.datatable.data') }}',
                    data: {}
                },
                columns: [
                    {data: 'num', name: 'num', "searchable": true, "orderable": true},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'category', name: 'category', "searchable": true, "orderable": true},
                    {data: 'type', name: 'type', "searchable": true, "orderable": true},
                    {data: 'action_date', name: 'action_date', "searchable": true, "orderable": true},
                    {data: 'start_date', name: 'start_date', "searchable": true, "orderable": true},
                    {data: 'end_date', name: 'end_date', "searchable": true, "orderable": true},
                    {data: 'days', name: 'days', "searchable": true, "orderable": true},
                    {data: 'admin_name', name: 'admin_name', "searchable": true, "orderable": false},
                    {data: 'description', name: 'description', "searchable": true, "orderable": false},
                    {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},
                ]
            });
        });
    </script>
@endsection

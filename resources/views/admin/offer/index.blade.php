@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('public/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
          type="text/css"/>
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">العروض</h1>
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

                                <th class="min-w-125px">الاسم</th>
                                <th class="min-w-125px">الاسم EN</th>
                                <th class="min-w-125px">تاريخ الانشاء</th>
                                <th class=" min-w-100px">الاجراءات</th>
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
                    url: '{{ route('offer.datatable.data') }}',
                    data: {}
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'name_en', name: 'name_en', "searchable": true, "orderable": true},
                    {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},
                ]
            });
            $.ajax({
                url: "{{ URL::to('admin/add-offer-button')}}",
                success: function (data) {
                    $('.add_button').append(data);
                },
                dataType: 'html'
            });
        });
    </script>
@endsection

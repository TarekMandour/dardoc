@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('public/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
          type="text/css"/>
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">الصلاحيات والادوار</h1>
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
                        <a href="{{ url('/admin/roles/create') }}" class="btn btn-light-primary me-3"><i class="bi bi-plus-circle-fill fs-2x"></i></a>
                        <a href="javascript:;" id="btn_delete" data-token="{{ csrf_token() }}" role="button" class="btn btn-light-danger me-3 font-weight-bolder"><i class="bi bi-trash-fill fs-2x"></i> </a>
                        <br><br>
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-4 gy-5" id="data_table">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    #
                                </th>
                                <th class="w-10px">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#data_table .form-check-input" value=""/>
                                    </div>
                                </th>

                                <th class="min-w-125px">الاسم</th>
                                <th class=" min-w-100px">الاجراءات</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach ($roles as $key =>$role)
                                    <tr>
                                        <td>{{ ($key+1) }}</td>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="{{$role->id}}" />
                                            </div>
                                        </td>
                                        <td>{{ $role->name}}</td>
                                        <td>
                                            <a href="{{route( 'roles.edit' , $role->id )}}"
                                            class="btn btn-icon btn-light-info"><i class="bi bi-pencil-fill"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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
    <script>
        $(document).ready(function () {
            $('#data_table').DataTable({
                ordering: false
            });
            $('#datatable2').DataTable({
                paging: false,
                searching: true,
                ordering: false,
                info: false
            });
        });

        $("#checker").click(function () {
            var items = document.getElementsByTagName("input");

            for (var i = 0; i < items.length; i++) {
                if (items[i].type == 'checkbox') {
                    if (items[i].checked == true) {
                        items[i].checked = false;
                    } else {
                        items[i].checked = true;
                    }
                }
            }

        });

 
        $("#btn_delete").click(function (event) {

            event.preventDefault();
            var checkIDs = $("#data_table input:checkbox:checked").map(function () {
                return $(this).val();
            }).get(); // <----

            if (checkIDs.length > 0) {
                var token = $(this).data("token");

                Swal.fire({
                    title: 'هل انت متأكد ؟',
                    text: "لا يمكن استرجاع البيانات المحذوفه",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger m-l-10',
                    confirmButtonText: 'موافق',
                    cancelButtonText: 'لا'
                }).then(function (isConfirm) {
                    if (isConfirm.value) {
                        $.ajax(
                            {
                                url: "{{route('roles.delete_role')}}",
                                type: "post",
                                data: {'id': checkIDs, _token: token},
                                dataType: "JSON",
                                success: function (data) {
                                    if (data.msg == "Success") {
                                        $("input:checkbox:checked").parents("tr").remove();
                                        location.reload();
                                        alertify.success("تم بنجاح");
                                    } else {
                                        alertify.error("عفوا ! حدث خطأ ما");
                                    }
                                },
                                fail: function (xhrerrorThrown) {

                                }
                            });
                    } else {
                        console.log(isConfirm);
                    }
                });
            }

        });
    </script>
@endsection

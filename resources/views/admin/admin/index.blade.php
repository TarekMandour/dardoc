@extends('admin.layouts.master')

@section('css')
<link href="{{asset('public/admin')}}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Employees List</h1>
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

                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Email</th>
                            <th class="min-w-125px">Phone</th>
                            <th class="min-w-125px">Active</th>
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

                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Add New</h2>
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
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">Profile Photo</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('public/admin')}}/assets/media/avatars/blank.png)"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="edit">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="profile" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="cancel">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="remove">
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
                                            <label class="required fw-bold fs-6 mb-2">Full Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="name"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Full Name" value="{{old('name')}}" required/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->  <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="email" name="email"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Email" value="{{old('email')}}"
                                                />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">Phone</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="tel" name="phone"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Phone" value="{{old('phone')}}" required/>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">Password</label>
                                            <!--end::Label-->
                                            <!--begin::Input--> 
                                            <input type="password" name="password"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Password" value="" required/>
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">Confirm Password</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="password" name="password_confirmation"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Confirm Password" value="" required/>
                                            <!--end::Input--> 
                                        </div>
                                        <!--end::Input group-->

                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">Roles</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-control-solid mb-3 mb-lg-0"
                                                    name="role" aria-label=""  id="cat_id">
                                                    <option value="">Choose role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
            
                                        <div class="fv-row mb-7">
                                            <label class="form-check-label" for="flexSwitchDefault">Is Active
                                                ?</label>
                                            <div
                                                class="form-check form-switch form-check-custom form-check-solid">
                                                
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
                                                data-bs-dismiss="modal">Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary"
                                                data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Save</span>
                                            <span class="indicator-progress">wait few moments ...
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
             lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "All"]],
            "language": {
                search: '',
                searchPlaceholder: 'Search'
            },
            buttons: [
                {extend: 'print', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-printer-fill fs-2x"></i>'},
                // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                {extend: 'excel', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'},
                // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}
            ],
            ajax: {
                url: '{{ route('admins.datatable.data') }}',
                data: {

                }
            },
            columns: [
                {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                {data: 'name', name: 'name', "searchable": true, "orderable": true},
                {data: 'email', name: 'email', "searchable": true, "orderable": true},
                {data: 'phone', name: 'phone', "searchable": true, "orderable": true},
                {data: 'is_active', name: 'is_active', "searchable": true, "orderable": true},
                {data: 'actions', name: 'actions', "searchable": false, "orderable": false},
            ]
        });
        $.ajax({
            url: "{{ URL::to('admin/add-admin-button')}}",
            success: function (data) { $('.add_button').append(data); },
            dataType: 'html'
        });
    });
</script>
@endsection
@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('public/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />

@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0"> ديون العميل  </h1>
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
                <form id="kt_account_profile_details_form" action="{{url('admin/update-client-debts')}}" class="form"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->

                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="arabic" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="row">

                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">التاريخ  </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="date" name="date"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="التاريخ" value="{{$data->date}}" required/>
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <input type="hidden" name="client_id" value="{{$data->client_id}}">
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">المبلغ  </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="amount"
                                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                                           placeholder="المبلغ" value="{{$data->amount}}" required/>

                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                            </div>
                                            <!--begin::Input group-->

                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                </div>
                            </div>





                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="#" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">الغاء</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">حفظ</span>
                                <span class="indicator-progress">برجاء الانتظار
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>

                </form>
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

    </script>
@endsection

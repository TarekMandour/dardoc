@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('public/admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />

@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0"> Record | {{$data->patient_name}}</h1>
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
                <form id="kt_account_profile_details_form" action="{{url('admin/update-record')}}" class="form"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#arabic">Base info</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->

                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#day3">Day 3</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#day5">Day 5</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#vitrification">Vitrification</a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
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
                                                <div class="col-6">
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Patient name:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="patient_name" class="form-control mb-2" placeholder="Patient name" value="{{$data->patient_name ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Husband name:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="husband_name" class="form-control mb-2" placeholder="Husband name" value="{{$data->husband_name ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Referral dr:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="referral_dr" class="form-control mb-2" placeholder="Referral dr" value="{{$data->referral_dr ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Pregnancy:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select class="form-control form-control-solid" name="pregnancy" aria-label="">
                                                            <option value="1" @if($data->pregnancy == 1) selected @endif>No communication</option>
                                                            <option value="2" @if($data->pregnancy == 2) selected @endif>Pregnant</option>
                                                            <option value="3" @if($data->pregnancy == 3) selected @endif>Not pregnant</option>
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                                                </div>
                                                <div class="col-6">

                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">age:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="number" name="patient_age" class="form-control mb-2" placeholder="Patient age" value="{{$data->patient_age ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">age:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="number" name="husband_age" class="form-control mb-2" placeholder="Husband age" value="{{$data->husband_age ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>

                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Retrieval date:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="date" name="retrieval_date" class="form-control mb-2" placeholder="Retrieval date" value="{{$data->retrieval_date ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>

                                                    <div class="mb-5 fv-row">
                                                        <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                            <input class="form-check-input" type="radio" value="1" name="sex" id="flexRadioLg" @if($data->sex == 1) checked @endif/>
                                                            <label class="form-check-label" for="flexRadioLg">
                                                                Sex selection
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                            <input class="form-check-input" type="radio" value="2" name="sex" id="flexRadioLg2" @if($data->sex == 2) checked @endif/>
                                                            <label class="form-check-label" for="flexRadioLg2">
                                                                ICSI
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table align-middle table-row-dashed gy-5">
                                                        <tr>
                                                            <th class="max-w-125px">Amps Name</th>
                                                            <th class="max-w-125px">FSH</th>
                                                            <th class="max-w-125px">HMG</th>
                                                            <th class="max-w-125px">Triggering by</th>
                                                            <th class="max-w-125px">E2</th>
                                                            <th class="max-w-125px">P4</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Trade name</td>
                                                            <td>
                                                                <select class="form-control form-control-solid"
                                                                        name="trade_fsh" aria-label="">
                                                                        <option value="">Choose ...</option>
                                                                        @foreach($medicine as $med)
                                                                        <option value="{{$med->id}}" @if($med->id == $data->trade_fsh) selected @endif >{{$med->name}}</option>
                                                                        @endforeach
                                                                </select>
                                                                <input type="text" name="number_fsh" class="form-control" value="{{$data->number_fsh ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <select class="form-control form-control-solid"
                                                                        name="trade_hmg" aria-label="">
                                                                        <option value="">Choose ...</option>
                                                                        @foreach($medicine as $med)
                                                                        <option value="{{$med->id}}" @if($med->id == $data->trade_hmg) selected @endif >{{$med->name}}</option>
                                                                        @endforeach
                                                                </select>
                                                                <input type="text" name="number_hmg" class="form-control" value="{{$data->number_hmg ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <select class="form-control form-control-solid"
                                                                        name="trade_triggering" aria-label="">
                                                                        <option value="">Choose ...</option>
                                                                        @foreach($medicine as $med)
                                                                        <option value="{{$med->id}}" @if($med->id == $data->trade_triggering) selected @endif >{{$med->name}}</option>
                                                                        @endforeach
                                                                </select>
                                                                <input type="text" name="number_triggering" class="form-control" value="{{$data->number_triggering ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="number_e2" class="form-control" value="{{$data->number_e2 ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="number_p4" class="form-control" value="{{$data->number_p4 ?? ''}}" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Number</td>
                                                            <td>
                                                                <select class="form-control form-control-solid"
                                                                        name="trade_fsh2" aria-label="">
                                                                        <option value="">Choose ...</option>
                                                                        @foreach($medicine as $med)
                                                                        <option value="{{$med->id}}" @if($med->id == $data->trade_fsh2) selected @endif >{{$med->name}}</option>
                                                                        @endforeach
                                                                </select>
                                                                <input type="text" name="number_fsh2" class="form-control" value="{{$data->number_fsh2 ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <select class="form-control form-control-solid"
                                                                        name="trade_hmg2" aria-label="">
                                                                        <option value="">Choose ...</option>
                                                                        @foreach($medicine as $med)
                                                                        <option value="{{$med->id}}" @if($med->id == $data->trade_hmg2) selected @endif >{{$med->name}}</option>
                                                                        @endforeach
                                                                </select>
                                                                <input type="text" name="number_hmg2" class="form-control" value="{{$data->number_hmg2 ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <select class="form-control form-control-solid"
                                                                        name="trade_triggering2" aria-label="">
                                                                        <option value="">Choose ...</option>
                                                                        @foreach($medicine as $med)
                                                                        <option value="{{$med->id}}" @if($med->id == $data->trade_triggering2) selected @endif >{{$med->name}}</option>
                                                                        @endforeach
                                                                </select>
                                                                <input type="text" name="number_triggering2" class="form-control" value="{{$data->number_triggering2 ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table align-middle table-row-dashed gy-5">
                                                        <tr>
                                                            <th class="max-w-125px">Semen</th>
                                                            <th class="max-w-125px">vol</th>
                                                            <th class="max-w-125px">count</th>
                                                            <th class="max-w-125px">total motility</th>
                                                            <th class="max-w-125px">progressive motility</th>
                                                            <th class="max-w-125px">sperm abnormality</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Pre processing</td>
                                                            <td>
                                                                <input type="text" name="vol" class="form-control" value="{{$data->vol ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="count" class="form-control" value="{{$data->count ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="motility" class="form-control" value="{{$data->motility ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="progressive_motility" class="form-control" value="{{$data->progressive_motility ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="abnormality" class="form-control" value="{{$data->abnormality ?? ''}}" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Oocyte no:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="oocyte_no" class="form-control mb-2" placeholder="Oocyte no" value="{{$data->oocyte_no ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Total injected:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="total_injected" class="form-control mb-2" placeholder="Total injected" value="{{$data->total_injected ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">M2:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="m2" class="form-control mb-2" placeholder="M2" value="{{$data->m2 ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    

                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Oocytes comment:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <textarea name="oocytes_comment" class="form-control mb-2">{{$data->oocytes_comment ?? ''}}</textarea>
                                                        <!--end::Input-->
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">M1:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="m1" class="form-control mb-2" placeholder="M1" value="{{$data->m1 ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">GV:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="gv" class="form-control mb-2" placeholder="GV" value="{{$data->gv ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label">M2 abn:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="m2_abn" class="form-control mb-2" placeholder="M2 abn " value="{{$data->m2_abn ?? ''}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                </div>
                            </div>

                            <div class="tab-pane fade" id="day3" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">Day 3</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea name="day3" id="kt_docs_tinymce_basic">
                                                    {{$data->day3 ?? ''}}
                                                </textarea>
                                                <!--end::Editor-->
                                            </div>
                                            <!--end::Input group-->

                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="day5" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">Day 5</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea name="day5" id="kt_docs_tinymce_basic2">
                                                    {{$data->day5 ?? ''}}
                                                </textarea>
                                                <!--end::Editor-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="vitrification" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table align-middle table-row-dashed gy-5">
                                                        <tr>
                                                            <th class="max-w-125px">Embryos</th>
                                                            <th class="max-w-125px">Date</th>
                                                            <th class="max-w-125px">Number of straws </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="embryos" class="form-control" value="{{$data->embryos ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <input type="date" name="date" class="form-control" value="{{$data->date ?? ''}}" />
                                                            </td>
                                                            <td>
                                                                <input type="text" name="straws" class="form-control" value="{{$data->straws ?? ''}}" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                </div>
                            </div>

                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{url('admin/record')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">Save</span>
                                <span class="indicator-progress">wait few moments ...
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

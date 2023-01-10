@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">مقالات | {{$data->title}}</h1>
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
                <form id="kt_account_profile_details_form" action="{{url('admin/update-post')}}" class="form"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#arabic">عربي</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#english">انجليزي</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#more">اخري</a>
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
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">الاسم</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="title" class="form-control mb-2"
                                                       placeholder="ادخل الاسم" value="{{$data->title}}"/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->


                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">ألمحتوى</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea name="content" id="kt_docs_tinymce_basic3">{!! $data->content !!}

                                                            </textarea>
                                                <!--end::Editor-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                </div>
                            </div>

                            <div class="tab-pane fade" id="english" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">الاسم EN</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="title_en" class="form-control mb-2"
                                                       placeholder="ادخل الاسم EN" value="{{$data->title_en}}"/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->


                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">ألمحتوى EN</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <textarea name="content_en" id="kt_docs_tinymce_basic4">
                                                    {!! $data->content_en !!}

                                                            </textarea>
                                                <!--end::Editor-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="more" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">

                                            <div class="row">
                                                <div class="col-6">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">التصنيف</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select class="form-control form-control-solid mb-3 mb-lg-0"
                                                                name="cat_id" aria-label="" required id="state">
                                                            <option value="">اختر التصنيف</option>
                                                            @foreach(\App\Models\Category::all() as $state)
                                                                <option @if($data->cat_id == $state->id) selected @endif
                                                                        value="{{$state->id}}">{{$state->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>

                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Meta Keywords</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="meta_keywords"
                                                               class="form-control mb-2" placeholder="Meta Keywords"
                                                               value="{{$data->meta_keywords}}"/>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Meta Description</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="meta_description"
                                                               class="form-control mb-2" placeholder="Meta Description"
                                                               value="{{$data->meta_description}}"/>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <div class="col-6">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">الصورة</label>
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->

                                                            <!--end::Label-->
                                                            <!--begin::Image input-->
                                                            <div class="image-input image-input-outline"
                                                                 data-kt-image-input="true"
                                                                 style="background-image: url('{{asset('public/admin')}}/assets/media/svg/avatars/blank.svg')">
                                                                <!--begin::Preview existing avatar-->
                                                                <div class="image-input-wrapper w-125px h-125px"
                                                                     style="background-image: url({{$data->photo}})"></div>
                                                                <!--end::Preview existing avatar-->
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                    data-kt-image-input-action="change"
                                                                    data-bs-toggle="tooltip"
                                                                    title="تعديل">
                                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                                    <!--begin::Inputs-->
                                                                    <input type="file" name="photo"
                                                                           accept=".png, .jpg, .jpeg"/>
                                                                    <input type="hidden" name="avatar_remove"/>
                                                                    <!--end::Inputs-->
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Cancel-->
                                                                <span
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                    data-kt-image-input-action="cancel"
                                                                    data-bs-toggle="tooltip"
                                                                    title="الغاء">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                                <!--end::Cancel-->
                                                                <!--begin::Remove-->
                                                                <span
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                    data-kt-image-input-action="remove"
                                                                    data-bs-toggle="tooltip"
                                                                    title="حذف">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                                <!--end::Remove-->
                                                            </div>
                                                            <!--end::Image input-->
                                                            <!--begin::Hint-->
                                                            <div class="form-text">Allowed file types: png, jpg, jpeg.
                                                            </div>
                                                            <!--end::Hint-->
                                                        </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                            </div>

                                            <!--begin::Input group-->
                                            <!--end::Input group-->

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
                            <a href="{{url('admin/post')}}"
                               id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">الغاء</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">حفظ</span>
                                <span class="indicator-progress">برجاء الانتظار
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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

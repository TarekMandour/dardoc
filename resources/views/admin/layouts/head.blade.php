<link rel="shortcut icon" href="{{$Settings->fav}}" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
@yield('css')
<!--end::Page Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{asset('public/admin')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/admin/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->

@yield('style')
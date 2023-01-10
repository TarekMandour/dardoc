<!--begin::Javascript-->
<script>var hostUrl = "{{asset('public/admin/assets/')}}";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('public/admin')}}/assets/plugins/global/plugins.bundle.js"></script>
<script src="{{asset('public/admin')}}/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
@yield('js')
<!--end::Page Vendors Javascript-->
<?php
$message = session()->get("message");
$status = session()->get("status");

?>
@if( session()->has("message"))
@if( $status == 'error')
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr.error("", "{{$message}}");
    </script>
@else
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.success("", "{{$message}}");
</script>
@endif
@endif

@yield('script')
<!--end::Javascript-->

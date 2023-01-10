<div class="dt-buttons flex-wrap">
    
    @can('اضافة موظف')
    <!--end::Filter-->
    <!--begin::Add user-->
    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
            data-bs-target="#kt_modal_add_user">
        <i class="bi bi-plus-circle-fill fs-2x"></i>
    </button>
    @endcan

    @can('حذف موظف')
    <!--end::Add user-->
    <button id="delete" class="btn btn-light-danger me-3 font-weight-bolder">
        <i class="bi bi-trash-fill fs-2x"></i>
    </button>
    @endcan

</div>

<script type="text/javascript">

    $("#delete").on("click", function () {
        var dataList = [];
        $("input:checkbox:checked").each(function (index) {
            dataList.push($(this).val())
        })

        if (dataList.length > 0) {
            Swal.fire({
                title: "Warning. Are you sure ?!",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url("admin/delete-admin")}}',
                        type: "get",
                        data: {'id': dataList, _token: CSRF_TOKEN},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                $("input:checkbox:checked").parents("tr").remove();
                                Swal.fire("", "Deleted successfully", "success");
                                // location.reload();
                            } else {
                                Swal.fire("", "An error occurred while deleting", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
                            Swal.fire("", "An error occurred while deleting", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("Deletion request", "Canceled", "error");
                }
            });
        }
    });
</script>

<script>

</script>

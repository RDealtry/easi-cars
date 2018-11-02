"use strict";

//$warning = Warning::with('tenant_name')->get();

$(function() {
    $("#warnings-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "warnings_data/get_data",
        columns: [
            {
                data: "tenant_id"
                //data: "tenant_id"
            },
            {
                data: "user_id"
            },
            {
                data: "note"
            },
            {
                data: "warning_date"
            },
            {
                data: "reason"
            },
            {
                data: "warning_no"
            },
            {
                data: "manager_yn"
            },
            {
                data: "expiry_date"
            },
            {
                data: "action",
                orderable: false,
                searchable: false
            }
        ]
    });

    function refresh() {
        var table = $("#warnings-table").DataTable();
        table.ajax.reload(null, false);
    }

    function cleaner() {
        $(".id").val("");
        $(".tenant_id").val("");
        $(".user_id").val("");
        $(".note").val("");
        $(".warning_date").val("");
        $(".reason").val("");
        $(".warning_no").val("");
        $(".manager_yn").val("");
        $(".expiry_date").val("");
    }

    function token() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    }

    //create
    $(document).on("click", ".create", function(e) {
        e.preventDefault();

        cleaner();
        $("#modalAdd form :input").val(""); //clear any values before loading?
        $("#modalAdd").modal("show");
        $(".modal-title").text("Create Warning");
    });

    //edit
    $(document).on("click", ".edit", function(e) {
        e.preventDefault();
        var id = $(this).attr("warning_id");

        token();

        $.ajax({
            url: "warnings/" + id + "/edit",
            method: "get",
            success: function(result) {
                if (result.success) {
                    let json = jQuery.parseJSON(result.data);

                    $(".id").val(json.id);
                    $(".tenant_id").val(json.tenant_id);
                    $(".user_id").val(json.user_id);
                    $(".note").val(json.note);
                    $(".warning_date").val(json.warning_date);
                    $(".reason").val(json.reason);
                    $(".warning_no").val(json.warning_no);
                    $(".manager_yn").val(json.manager_yn);
                    $(".expiry_date").val(json.expiry_date);

                    $("#modalEdit").modal("show");
                    $(".modal-title").text("Update Warning");
                }
            }
        });
    });

    //store
    $(document).on("submit", "#modalAdd", function(e) {
        e.preventDefault();

        var formData = $("form#store").serializeArray();

        token();

        var data = {
            tenant_id: formData[0].value,
            user_id: formData[1].value,
            note: formData[2].value,
            warning_date: formData[3].value,
            reason: formData[4].value,
            warning_no: formData[5].value,
            manager_yn: formData[6].value,
            expiry_date: formData[7].value
        };

        $.ajax({
            url: "warnings",
            method: "post",
            data: data,
            success: function(result) {
                if (result.success) {
                    refresh();
                    $("#modalAdd").modal("hide");
                    swal("Good job!", "Successfully Saved!", "success");
                    //return false; //trying to reset the form
                    //$("#modalAdd form :input").val(""); - now clearing on opening the form
                }
            }
        });
    });

    //update
    $(document).on("submit", "#modalEdit", function(e) {
        e.preventDefault();

        var formData = $("form#update").serializeArray();

        token();

        var id = formData[0].value;
        var data = {
            tenant_id: formData[1].value,
            user_id: formData[2].value,
            note: formData[3].value,
            warning_date: formData[4].value,
            reason: formData[5].value,
            warning_no: formData[6].value,
            manager_yn: formData[7].value,
            expiry_date: formData[8].value
        };

        $.ajax({
            url: "warnings/" + id,
            method: "PUT",
            data: data,
            success: function(result) {
                if (result.success) {
                    refresh();
                    cleaner();
                    $("#modalEdit").modal("hide");
                    swal("Updated!", "Successfully Updated!", "success");
                }
            }
        });
    });

    //delete data
    $(document).on("click", ".delete", function(e) {
        e.preventDefault();
        var id = $(this).attr("warning_id");

        swal({
            title: "Are you sure?",
            text: "you want to remove this record?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(result => {
            if (result.value) {
                token();

                $.ajax({
                    url: "warnings/" + id,
                    method: "DELETE",
                    success: function(result) {
                        if (result.success) {
                            refresh();
                            cleaner();
                            swal(
                                "Deleted!",
                                "Successfully Deleted!",
                                "success"
                            );
                        }
                    }
                });
            }
        });
    });
});

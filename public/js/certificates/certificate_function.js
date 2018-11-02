"use strict";

$(function() {
    $("#certificates-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "certificates_data/get_data",
        columns: [
            {
                data: "house_id"
            },
            {
                data: "address"
            },
            {
                data: "type"
            },
            {
                data: "cert_no"
            },
            {
                data: "issued"
            },
            {
                data: "action",
                orderable: false,
                searchable: false
            }
        ]
    });

    function refresh() {
        var table = $("#certificates-table").DataTable();
        table.ajax.reload(null, false);
    }

    function cleaner() {
        $(".id").val("");
        $(".house_id").val("");
        $(".address").val("");
        $(".type").val("");
        $(".cert_no").val("");
        $(".issued").val("");
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
        $(".modal-title").text("Create Certificate");
    });

    //edit
    $(document).on("click", ".edit", function(e) {
        e.preventDefault();
        var id = $(this).attr("certificate_id");

        token();

        $.ajax({
            url: "certificates/" + id + "/edit",
            method: "get",
            success: function(result) {
                if (result.success) {
                    let json = jQuery.parseJSON(result.data);

                    $(".id").val(json.id);
                    $(".house_id").val(json.house_id);
                    $(".type").val(json.type);
                    $(".cert_no").val(json.cert_no);
                    $(".issued").val(json.issued);
                    $("#modalEdit").modal("show");
                    $(".modal-title").text("Update Certificate");
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
            house_id: formData[0].value,
            type: formData[1].value,
            cert_no: formData[2].value,
            issued: formData[3].value
        };

        $.ajax({
            url: "certificates",
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
            house_id: formData[1].value,
            type: formData[2].value,
            cert_no: formData[3].value,
            issued: formData[4].value
        };

        $.ajax({
            url: "certificates/" + id,
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
        var id = $(this).attr("certificate_id");

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
                    url: "certificates/" + id,
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

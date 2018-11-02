"use strict";

$(function() {
    $("#houses-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "houses_data/get_data",
        columns: [
            {
                data: "address"
            },
            {
                data: "postcode"
            },
            {
                data: "live_date"
            },
            {
                data: "no_rooms"
            },
            {
                data: "gender"
            },
            {
                data: "landlord"
            },
            {
                data: "dead_date"
            },
            {
                data: "action",
                orderable: false,
                searchable: false
            }
        ]
    });

    function refresh() {
        var table = $("#houses-table").DataTable();
        table.ajax.reload(null, false);
    }

    function cleaner() {
        $(".id").val("");
        $(".address").val("");
        $(".postcode").val("");
        $(".live_date").val("");
        $(".no_rooms").val("");
        $(".gender").val("");
        $(".landlord").val("");
        $(".dead_date").val("");
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
        $(".modal-title").text("Create House");
    });

    //edit
    $(document).on("click", ".edit", function(e) {
        e.preventDefault();
        var id = $(this).attr("house_id");

        token();

        $.ajax({
            url: "houses/" + id + "/edit",
            method: "get",
            success: function(result) {
                if (result.success) {
                    let json = jQuery.parseJSON(result.data);

                    $(".id").val(json.id);
                    $(".address").val(json.address);
                    $(".postcode").val(json.postcode);
                    $(".live_date").val(json.live_date);
                    $(".no_rooms").val(json.no_rooms);
                    $(".gender").val(json.gender);
                    $(".landlord").val(json.landlord);
                    $(".dead_date").val(json.dead_date);

                    $("#modalEdit").modal("show");
                    $(".modal-title").text("Update House");
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
            address: formData[0].value,
            postcode: formData[1].value,
            live_date: formData[2].value,
            no_rooms: formData[3].value,
            gender: formData[4].value,
            landlord: formData[5].value,
            dead_date: formData[6].value
        };

        $.ajax({
            url: "houses",
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
            address: formData[1].value,
            postcode: formData[2].value,
            live_date: formData[3].value,
            no_rooms: formData[4].value,
            gender: formData[5].value,
            landlord: formData[6].value,
            dead_date: formData[7].value
        };

        $.ajax({
            url: "houses/" + id,
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
        var id = $(this).attr("house_id");

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
                    url: "houses/" + id,
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

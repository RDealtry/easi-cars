"use strict";

//$casenote = Casenote::with('tenant_name')->get();

$(function() {
    var caseNotesTable = $("#casenotes-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "casenotes_data/get_data",
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
                data: "casenote_date"
            },
            {
                data: "action",
                orderable: false,
                searchable: false
            }
        ]
    });

    var newHtml = '<tr role="row">';
    $("#casenotes-table thead tr:eq(0) th").each(function(i) {
        var title = $(this).text();
        var columnContent =
            '<input type="text" placeholder="Search ' + title + '" />';
        if (title === "Action") {
            columnContent = "";
        }
        newHtml += "<td>" + columnContent + "</td>";
    });
    newHtml += "</tr>";
    $("#casenotes-table thead").append(newHtml);

    $("#casenotes-table thead tr:eq(1) td").each(function(i) {
        $("input", this).on("keyup change", function() {
            if (caseNotesTable.column(i).search() !== this.value) {
                caseNotesTable
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });

    function refresh() {
        var table = $("#casenotes-table").DataTable();
        table.ajax.reload(null, false);
    }

    function cleaner() {
        $(".id").val("");
        $(".tenant_id").val("");
        $(".user_id").val("");
        $(".note").val("");
        $(".casenote_date").val("");
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
        $(".modal-title").text("Create Casenote");
    });

    //edit
    $(document).on("click", ".edit", function(e) {
        e.preventDefault();
        var id = $(this).attr("casenote_id");

        token();

        $.ajax({
            url: "casenotes/" + id + "/edit",
            method: "get",
            success: function(result) {
                if (result.success) {
                    let json = jQuery.parseJSON(result.data);
                    $(".id").val(json.id);
                    $(".tenant_id").val(json.tenant_id);
                    $(".user_id").val(json.user_id);
                    $(".note").val(json.note);
                    $(".casenote_date").val(json.casenote_date);
                    $("#modalEdit").modal("show");
                    $(".modal-title").text("Update Casenote");
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
            casenote_date: formData[3].value
        };

        $.ajax({
            url: "casenotes",
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
            casenote_date: formData[4].value
        };

        $.ajax({
            url: "casenotes/" + id,
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
        var id = $(this).attr("casenote_id");

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
                    url: "casenotes/" + id,
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

$(document).ready(function() {

    $("#permission-table").tablesorter();

    //$(".permission-remove-btn").click(function () {
    //    $('#cancel-modal').modal({show: true});
    //});

    //$("#warning-modal-cancel").click(function () {
    //
    //})

    $(".permission-remove-btn").click(function() {
        if (!confirm("Are you sure you want to remove this permission?"))
            return false;
        $("input[name='permission_id']").val($(this).closest('tr').find('td.people_id').attr("value"));
        $("input[name='permission_id']").parent().submit();
        //alert($(this).closest('tr').find('td.people_id').attr("value"));
        //$("#permission-table").tablesorter();
    });




});


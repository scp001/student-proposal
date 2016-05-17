$(document).ready(function() {
    $('#reimbursment').change(function () {
        if($("#cheque").is(":selected")){

            $("#reimbursment-method").append( "<div class='col-md-3 col-sm-3 col-xs-3' id='name_on_cheque'> <input type='text' class='form-control' maxlength='20' id='name_cheque' name='name_cheque' placeholder='Name on Cheque'></div>");

        }
        else{
            $("#name_on_cheque").remove();
        }

    });

    //$('.toggle').each(function(){
    //    $(this).find('.toggle-content').hide();
    //});
    //
    //// When a toggle is clicked (activated) show their content
    //$('.toggle a.toggle-trigger').click(function(){
    //    var el = $(this), parent = el.closest('.toggle');
    //
    //    if( el.hasClass('active') )
    //    {
    //        parent.find('.toggle-content').slideToggle();
    //        el.removeClass('active');
    //
    //    }
    //    else
    //    {
    //        parent.find('.toggle-content').slideToggle();
    //        el.addClass('active');
    //    }
    //    return false;
    //});


    $('.two-digits').change(function () {

        $(this).val(parseFloat($(this).val()).toFixed(2));

    });
    $(".two-digits").number(true, 2);

    //$("#cancel").click(function () {
    //    $('#cancel-modal').modal({show: true});
    //});
    $("#approve").click(approveDocument);

    //$("#cancel_application").click(function () {
    //    $('#cancel-application-modal').modal({show: true});
    //});
    //$("#cancel_application_travel").click(function () {
    //    $('#cancel-travel-application-modal').modal({show: true});
    //});
    //
    //$("#warning-modal-cancel-application").click({route: "cancel"}, cancelApplication);
    //
    //$("#travel-warning-modal-cancel-application").click({route: "canceltravel"}, cancelApplication);

});

function approveDocument(event){

    if (event.data.route == "approve" && $('#approved_amount').val().trim() == "0" )
    {
        utils.showMessage("danger", "Please fill in all the approved amount");
        window.scrollTo(0, 0);
        return false;
    }
}


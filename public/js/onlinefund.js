$(document).ready(function() {

    var MAX_OPTIONS = 5;
    var flag = 0;
    var usable = [];
    var id;
    $('.addButton').click(function () {
            //$clone = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
            if ($('#travelfund').find(':visible[name="option[]"]').length < 5 && flag == 0){
                var $template = $('#optionTemplate');
                var $clone = $template.clone();
                $clone.removeClass('hide').removeAttr('id').find('input').attr("id", "add_"+$('#travelfund').find(':visible[name="option[]"]').length);
                $clone.insertBefore($template);
            }
            else if ($('#travelfund').find(':visible[name="option[]"]').length < 5 && flag == 1) {
                var $template = $('#optionTemplate');
                var $clone = $template.clone();
                //alert(usable);
                $clone.removeClass('hide').removeAttr('id').find('input').attr("id", usable.shift());
                $clone.insertBefore($template);
            }
            if ($('#travelfund').find(':visible[name="option[]"]').length >= MAX_OPTIONS) {
                $('#travelfund').find('.addButton').attr('disabled', 'disabled');
            }

        $('.removeButton').click(function () {
            var $row    = $(this).parents('.form-group'),
                $option = $row.find('[name="option[]"]');

            // Remove element containing the option

            id = $row.find('[name="option[]"]').attr("id");
            $row.remove();
            flag = 1;
            if ($.inArray(id, usable) == -1) {
                usable.push(id);
                usable.sort();
            }
            if ($('#travelfund').find(':visible[name="option[]"]').length < MAX_OPTIONS) {
                $('#travelfund').find('.addButton').removeAttr('disabled');
            }
        });
    });

    $('.removeButton').click(function () {
        var $row    = $(this).parents('.form-group'),
            $option = $row.find('[name="option[]"]');

        id = $row.find('[name="option[]"]').attr("id");
        // Remove element containing the option
        $row.remove();
        flag = 1;
        if ($.inArray(id, usable) == -1) {
            usable.push(id);
            usable.sort();
        }
        if ($('#travelfund').find(':visible[name="option[]"]').length < MAX_OPTIONS) {
            $('#travelfund').find('.addButton').removeAttr('disabled');
        }
    });

    //$('.removeButton').click(function () {
    //    alert("am i here");
        //var $row    = $(this).parents('.form-group'),
        //    $option = $row.find('[name="option[]"]');
        //
        //// Remove element containing the option
        //$row.remove();
        //if ($option.field === 'option[]') {
        //    if ($('#travelfund').find(':visible[name="option[]"]').length < MAX_OPTIONS) {
        //        $('#travelfund').find('.addButton').removeAttr('disabled');
        //    }
        //}


    //});

    $('input[name="workshop_date"]').datepicker({
        singleDatePicker: true,
        maxDate: 0
    });




    $('#dropDownTypeFunding').change(function () {

        if($("#partnership").is(":selected")){

        $("#type-funding").append( "<div class='col-md-3 col-sm-3 col-xs-3' id='fundGroupsDiv'> <select class='form-control' id='fundGroups'>" +
                "<option value='1' id='group1' name='group1' >Group1</option>"+
                "<option value='2' id='group2' name='group2'>Group2</option>"+
                "<option value='3' id='group3' name='group3'>Group3</option></select></div>");
        }
        else{
            if ($("#fundGroupsDiv")){
                $("#fundGroupsDiv").remove();
            }
        }

    });

    $("#event_overview").on('keyup', function() {
        var words = this.value.match(/\S+/g).length;

        if (words > 250) {
            // Split the string on first 250 words and rejoin on spaces
            var trimmed = $(this).val().split(/\s+/, 250).join(" ");
            // Add a space at the end to make sure more typing creates new words
            $(this).val(trimmed + " ");
        }
        else {
            $('#display_count_overview').text(words);
            $('#word_left_overview').text(250-words);
        }
    });

    $("#contribution").on('keyup', function() {
        var words = this.value.match(/\S+/g).length;

        if (words > 250) {
            // Split the string on first 250 words and rejoin on spaces
            var trimmed = $(this).val().split(/\s+/, 250).join(" ");
            // Add a space at the end to make sure more typing creates new words
            $(this).val(trimmed + " ");
        }
        else {
            $('#display_count').text(words);
            $('#word_left').text(250-words);
        }
    });

    $('.two-digits').change(function () {

        $(this).val(parseFloat($(this).val()).toFixed(2));

    });
    $(".two-digits").number(true, 2);

    //Expense

    var original_item1 = parseFloat($('#item_amount1').val());
    var original_item2 = parseFloat($('#item_amount2').val());
    var original_item3 = parseFloat($('#item_amount3').val());
    var original_item4 = parseFloat($('#item_amount4').val());
    var original_item5 = parseFloat($('#item_amount5').val());
    var original_item6 = parseFloat($('#item_amount6').val());
    var original_item7 = parseFloat($('#item_amount7').val());

    $('#item_amount1').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val())).toFixed(2) - original_item1 ).toString());
        original_item1 = (parseFloat($(this).val()).toFixed(2)).toString();
    });

    $('#item_amount2').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val())).toFixed(2) - original_item2 ).toString());
        original_item2 = (parseFloat($(this).val()).toFixed(2)).toString();

    });

    $('#item_amount3').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val())).toFixed(2) - original_item3).toString());
        original_item3 = (parseFloat($(this).val()).toFixed(2)).toString();

    });

    $('#item_amount4').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val()) ).toFixed(2)  - original_item4).toString());
        original_item4 = (parseFloat($(this).val()).toFixed(2)).toString();
    });

    $('#item_amount5').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val()) ).toFixed(2)  - original_item5).toString());
        original_item5 = (parseFloat($(this).val()).toFixed(2)).toString();
    });

    $('#item_amount6').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val()) ).toFixed(2)  - original_item6).toString());
        original_item6 = (parseFloat($(this).val()).toFixed(2)).toString();
    });


    $('#item_amount7').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val()) ).toFixed(2)  - original_item7).toString());
        original_item7 = (parseFloat($(this).val()).toFixed(2)).toString();
    });

    // Revenue

    var original_revenue1 = parseFloat($('#revenue_amount1').val());
    var original_revenue2 = parseFloat($('#revenue_amount2').val());
    var original_revenue3 = parseFloat($('#revenue_amount3').val());
    var original_revenue4 = parseFloat($('#revenue_amount4').val());
    var original_revenue5 = parseFloat($('#revenue_amount5').val());

    $('#revenue_amount1').change(function () {
        $('#revenue_total').val(((parseFloat($('#revenue_total').val()) + parseFloat($(this).val())).toFixed(2) - original_revenue1 ).toString());
        original_revenue1 = (parseFloat($(this).val()).toFixed(2)).toString();
    });

    $('#revenue_amount2').change(function () {
        $('#revenue_total').val(((parseFloat($('#revenue_total').val()) + parseFloat($(this).val())).toFixed(2) - original_revenue2 ).toString());
        original_revenue2 = (parseFloat($(this).val()).toFixed(2)).toString();
    });


    $('#revenue_amount3').change(function () {
        $('#revenue_total').val(((parseFloat($('#revenue_total').val()) + parseFloat($(this).val())).toFixed(2) - original_revenue3 ).toString());
        original_revenue3 = (parseFloat($(this).val()).toFixed(2)).toString();
    });


    $('#revenue_amount4').change(function () {
        $('#revenue_total').val(((parseFloat($('#revenue_total').val()) + parseFloat($(this).val())).toFixed(2) - original_revenue4 ).toString());
        original_revenue4 = (parseFloat($(this).val()).toFixed(2)).toString();
    });


    $('#revenue_amount5').change(function () {
        $('#revenue_total').val(((parseFloat($('#revenue_total').val()) + parseFloat($(this).val())).toFixed(2) - original_revenue5 ).toString());
        original_revenue5 = (parseFloat($(this).val()).toFixed(2)).toString();
    });

    $('#inputCPhone').blur(function() {
        if (validatePhone($('#inputCPhone').val().trim())) {
            $('#spnPhoneStatus').html('');
            $('#spnPhoneStatus').css('color', 'green');
        }
        else {
            $('#spnPhoneStatus').html('Invalid Phone number');
            $('#spnPhoneStatus').css('color', 'red');
        }
    });

    $("#cancel").click(function () {
        $('#cancel-modal').modal({show: true});
    });
    $("#submit").click({route: "submit"}, SubmitDocument);
    $("#save").click({route: "save"}, SubmitDocument);
    $("#submitSaved").click({route: "submitsaved"}, SubmitDocument);
    $("#saveSaved").click({route: "savesaved"}, SubmitDocument);
});


function SubmitDocument(event){

    if ((event.data.route == "submit" || event.data.route == "submitsaved") && (($('#inputCPhone').val().trim() == "" || $('#nameEvent').val().trim() == "") || $('#contribution').val().trim() == "" || $('#event_overview').val().trim() == ""))
    {
        utils.showMessage("danger", "Please fill in all the required fields");
        window.scrollTo(0, 0);
        return false;
    }

    if ((event.data.route == "submit" || event.data.route == "submitsaved")&& !validatePhone($('#inputCPhone').val().trim())) {
        utils.showMessage("danger", "Please enter a valid phone number");
        window.scrollTo(0, 0);
        return false;
    }

    if ((event.data.route == "submit" || event.data.route == "submitsaved") && (parseFloat(($('#amount_requested').val()))<=0)) {
        utils.showMessage("danger", "Please enter the requested amount");
        window.scrollTo(0, 0);
        return false;
    }

    if ((event.data.route == "submit" || event.data.route == "submitsaved")&& (! $('#checkbox_agree').is(":checked"))) {
        utils.showMessage("danger", "Please accept the requirments and rules to continue");
        window.scrollTo(0, 0);
        return false;
    }


    if (event.data.route == "save" && !validatePhone($('#inputCPhone').val().trim()) && $('#inputCPhone').val().trim() != "") {
        utils.showMessage("danger", "Please enter a valid phone number");
        window.scrollTo(0, 0);
        return false;
    }

    if ((event.data.route == "submit" || event.data.route == "submitsaved") && $('#revenue1').val().trim() == "" && $('#revenue2').val().trim() == "" && $('#revenue3').val().trim() == "" && $('#revenue4').val().trim() == "" && $('#revenue5').val().trim() == "" )
    {
        utils.showMessage("danger", "Please fill in at least one item of revenues");
        window.scrollTo(0, 0);
        return false;
    }
/////////////////////////////////////////////////

    if (event.data.route == "submit" || event.data.route == "submitsaved") {
        var $status = $("<input type='hidden' name='status'>").attr("value", 1);
    }
    else {
        var $status = $("<input type='hidden' name='status'>").attr("value", 0);
    }


    if ($('#enhancement').is(":checked")) {
        var $funding_type = $("<input type='hidden' name='funding_type'>").attr("value", $('#enhancement').val());
    }
    else if ($('#dsa').is(":checked")) {
        var $funding_type = $("<input type='hidden' name='funding_type'>").attr("value", $('#dsa').val());
    }
    else {
        var $funding_type = $("<input type='hidden' name='funding_type'>").attr("value", $('#partnership').val());
        if ($('#group1').is(":checked")) {
            var $group = $("<input type='hidden' name='group'>").attr("value", $('#group1').val());
        }
        else if ($('#group2').is(":checked")) {
            var $group = $("<input type='hidden' name='group'>").attr("value", $('#group2').val());
        }
        else {
            var $group = $("<input type='hidden' name='group'>").attr("value", $('#group3').val());
        }
    }

    if ($('#inputNameProposal').val()) {
        var $name_group_proposal = $("<input type='hidden' name='name_group_proposal'>").attr("value", $('#inputNameProposal').val());
    }

    if ($('#add_1').val() ) {
        var $group2 = $("<input type='hidden' name='group2'>").attr("value", $('#add_1').val());
    }

    if ($('#add_2').val()) {
        var $group3 = $("<input type='hidden' name='group3'>").attr("value", $('#add_2').val());
    }

    if ($('#add_3').val()) {
        var $group4 = $("<input type='hidden' name='group4'>").attr("value", $('#add_3').val());
    }

    if ($('#add_4').val()) {
        var $group5 = $("<input type='hidden' name='group5'>").attr("value", $('#add_4').val());
    }

    var $contact_name = $("<input type='hidden' name='contact_name'>").attr("value", $('#contactname').text());
    var $contact_email = $("<input type='hidden' name='contact_email'>").attr("value", $('#contactemail').text());
    var $contact_phone = $("<input type='hidden' name='contact_phone'>").attr("value", $('#inputCPhone').val());



    //if ($('#date1').is(":checked")) {
    //    var $funding_workshop = $("<input type='hidden' name='funding_workshop'>").attr("value", $('#date1').val());
    //}
    //else if ($('#date2').is(":checked")) {
    //    var $funding_workshop = $("<input type='hidden' name='funding_workshop'>").attr("value", $('#date2').val());
    //}
    //else {
    //    var $funding_workshop = $("<input type='hidden' name='funding_workshop'>").attr("value", $('#date3').val());
    //}
    var $funding_workshop = $("<input type='hidden' name='funding_workshop'>").attr("value", $('#workshop_date').val());

    var $round = $("<input type='hidden' name='round'>").attr("value", $('#round_set').val());

    var $event_name = $("<input type='hidden' name='event_name'>").attr("value", $('#nameEvent').val());

    var $event_location = $("<input type='hidden' name='event_location'>").attr("value", $('input[name=location]:checked', '#radioLocation').val());

    var $contribution = $("<input type='hidden' name='contribution'>").attr("value", $('#contribution').val());

    //Expense

    var $item_amount1 = $("<input type='hidden' name='item_amount1'>").attr("value", $('#item_amount1').val());

    var $item_amount2 = $("<input type='hidden' name='item_amount2'>").attr("value", $('#item_amount2').val());

    var $item_amount3 = $("<input type='hidden' name='item_amount3'>").attr("value", $('#item_amount3').val());

    var $item_amount4 = $("<input type='hidden' name='item_amount4'>").attr("value", $('#item_amount4').val());

    var $item_amount5 = $("<input type='hidden' name='item_amount5'>").attr("value", $('#item_amount5').val());

    var $item_amount6 = $("<input type='hidden' name='item_amount6'>").attr("value", $('#item_amount6').val());

    var $item_amount7 = $("<input type='hidden' name='item_amount7'>").attr("value", $('#item_amount7').val());


    //Revenue

    if ($('#revenue1').val()) {
        var $revenue1 = $("<input type='hidden' name='revenue1'>").attr("value", $('#revenue1').val());
        var $revenue_amount1 = $("<input type='hidden' name='revenue_amount1'>").attr("value", $('#revenue_amount1').val());
    }

    if ($('#revenue2').val()) {
        var $revenue2 = $("<input type='hidden' name='revenue2'>").attr("value", $('#revenue2').val());
        var $revenue_amount2 = $("<input type='hidden' name='revenue_amount2'>").attr("value", $('#revenue_amount2').val());
    }

    if ($('#revenue3').val()) {
        var $revenue3 = $("<input type='hidden' name='revenue3'>").attr("value", $('#revenue3').val());
        var $revenue_amount3 = $("<input type='hidden' name='revenue_amount3'>").attr("value", $('#revenue_amount3').val());
    }

    if ($('#revenue4').val()) {
        var $revenue4 = $("<input type='hidden' name='revenue4'>").attr("value", $('#revenue4').val());
        var $revenue_amount4 = $("<input type='hidden' name='revenue_amount4'>").attr("value", $('#revenue_amount4').val());
    }

    if ($('#revenue5').val()) {
        var $revenue5 = $("<input type='hidden' name='revenue5'>").attr("value", $('#revenue5').val());
        var $revenue_amount5 = $("<input type='hidden' name='revenue_amount5'>").attr("value", $('#revenue_amount5').val());
    }
    var $amount_requested = $("<input type='hidden' name='amount_requested'>").attr("value", $('#amount_requested').val());

    var $req_and_rule = $("<input type='hidden' name='req_and_rule'>").attr("value", $('#event_overview').val());
    var $user_id = $("<input type='hidden' name='user_id'>").attr("value", $('#user_id').val());

    /////////////////////////////////////////////////////////////
    // Check whether the form has been saved before
    var $form = $("<form action='" + BASE_URL + "api/" + event.data.route + "' method='POST'>");

    if ($('#case_id').val()){
        var $id = $("<input type='hidden' name='id'>").attr("value", $('#case_id').val());
        $form.append($id);
    }
        $form.append($status);
        $form.append($funding_type);
        $form.append($group);
        $form.append($name_group_proposal);
        $form.append($group2);
        $form.append($group3);
        $form.append($group4);
        $form.append($group5);
        $form.append($contact_name);
        $form.append($contact_email);
        $form.append($contact_phone);
        $form.append($funding_workshop);
        $form.append($round);
        $form.append($event_name);
        $form.append($event_location);
        $form.append($contribution);

        $form.append($item_amount1);
        $form.append($item_amount2);
        $form.append($item_amount3);
        $form.append($item_amount4);
        $form.append($item_amount5);
        $form.append($item_amount6);
        $form.append($item_amount7);

        $form.append($revenue1);
        $form.append($revenue_amount1);
        $form.append($revenue2);
        $form.append($revenue_amount2);
        $form.append($revenue3);
        $form.append($revenue_amount3);
        $form.append($revenue4);
        $form.append($revenue_amount4);
        $form.append($revenue5);
        $form.append($revenue_amount5);
        $form.append($amount_requested);

        $form.append($req_and_rule);
        $form.append($user_id);

        var $token = $("<input type='hidden' name='_token'>").attr("value", TOKEN);
        $form.append($token);

        $('body').append($form);


        $form.submit();

}

function validatePhone(txtPhone) {
    var filter = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
    if (filter.test(txtPhone)) {
        return true;
    }
    else {
        return false;
    }
}

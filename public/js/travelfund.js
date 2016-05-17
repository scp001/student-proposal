
$(document).ready(function() {

    $("#approve").click(function(){
        if ($('#approved_amount').val().trim() == "0"){
            utils.showMessage("danger", "Please fill in all the approved amount");
            window.scrollTo(0, 0);
            return false;
        }
    });

    //$("#uploadintent_textbox").on('keyup', function() {
    //    var words = this.value.match(/\S+/g).length;
    //
    //    if (words > 250) {
    //        // Split the string on first 250 words and rejoin on spaces
    //        var trimmed = $(this).val().split(/\s+/, 250).join(" ");
    //        // Add a space at the end to make sure more typing creates new words
    //        $(this).val(trimmed + " ");
    //    }
    //    else {
    //        $('#display_count_intent').text(words);
    //        $('#word_left_intent').text(250-words);
    //    }
    //});

    $("#conference_textbox").on('keyup', function() {
        var words = this.value.match(/\S+/g).length;

        if (words > 250) {
            // Split the string on first 250 words and rejoin on spaces
            var trimmed = $(this).val().split(/\s+/, 250).join(" ");
            // Add a space at the end to make sure more typing creates new words
            $(this).val(trimmed + " ");
        }
        else {
            $('#display_count_conference').text(words);
            $('#word_left_conference').text(250-words);
        }
    });

    $('#inputPhone').blur(function() {
        if (validatePhone($('#inputPhone').val().trim())) {
            $('#spnPhoneStatus').html('');
            $('#spnPhoneStatus').css('color', 'green');
        }
        else {
            $('#spnPhoneStatus').html('Invalid Phone number');
            $('#spnPhoneStatus').css('color', 'red');
        }
    });


    $('.two-digits').change(function () {

        $(this).val(parseFloat($(this).val()).toFixed(2));

    });
    $(".two-digits").number(true, 2);

    var original_travel = parseFloat($('#amount_travel').val());
    var original_acc = parseFloat($('#amount_acc').val());
    var original_con = parseFloat($('#amount_con').val());
    var original_mis = parseFloat($('#amount_mis').val());
    var original_conmeal = parseFloat($('#amount_conmeal').val());


    $('#amount_travel').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val())).toFixed(2) - original_travel ).toString());
        original_travel = (parseFloat($(this).val()).toFixed(2)).toString();
    });

    $('#amount_acc').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val())).toFixed(2) - original_acc ).toString());
        original_acc = (parseFloat($(this).val()).toFixed(2)).toString();

    });

    $('#amount_con').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val())).toFixed(2) - original_con).toString());
        original_con = (parseFloat($(this).val()).toFixed(2)).toString();

    });

    $('#amount_mis').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val()) ).toFixed(2)  - original_mis).toString());
        original_mis = (parseFloat($(this).val()).toFixed(2)).toString();
    });

    $('#amount_conmeal').change(function () {
        $('#amount_total').val(((parseFloat($('#amount_total').val()) + parseFloat($(this).val()) ).toFixed(2)  - original_conmeal).toString());
        original_conmeal = (parseFloat($(this).val()).toFixed(2)).toString();
    });

    $('.checktype').on('change', function(){
        //alert(this.files[0].size);
        var filesize;
        var filesizekb;
        var ext = $(this).val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['doc','docx','rtf','pdf']) == -1) {
            alert('The system only accepts Word (.doc and .docx), RTF or PDF files.');
            $(this).val('');
            if (this.id=="uploadintent"){
                //alert("??");
                $("#letter_intent").html("");
                //$("#uploadintent_textbox").attr("disabled", false);
            }
            if (this.id=="uploadrec"){
                //alert("??");
                $("#letter_recommendation").html("");
            }
            if (this.id=="uploadtrans"){
                //alert("??");
                $("#letter_transcript").html("");
            }
            if (this.id=="uploadcon"){
                //alert("??");
                $("#letter_conference").html("");
                //$("#conference_textbox").attr("disabled", false);
            }
            return false;
        }

        var max_size = 64;
        var browserName = navigator.appName;

        if(browserName == "Microsoft Internet Explorer") {
            var oas = new ActiveXObject("Scripting.FileSystemObject");
            var d = node.value;
            var e = oas.getFile(d);
            var f = e.size;
            filesize=Math.round(f/(1024*1024));
        } else {
            filesize=Math.round(this.files[0].size/(1024*1024));
        }

        if (filesize == 0){
            filesizekb=Math.round(this.files[0].size);
        }

        if (filesize > max_size) {
            alert('This file size is ' + filesize + ' MB and it exceeds the ' + max_size + ' MB upload limit');
            $(this).val('');
            if (this.id=="uploadintent"){
                //alert("??");
                $("#letter_intent").html("");
                $("#uploadintent_textbox").attr("disabled", false);
            }
            if (this.id=="uploadrec"){
                //alert("??");
                $("#letter_recommendation").html("");
            }
            if (this.id=="uploadtrans"){
                //alert("??");
                $("#letter_transcript").html("");
            }
            if (this.id=="uploadcon"){
                //alert("??");
                $("#letter_conference").html("");
                $("#conference_textbox").attr("disabled", false);
            }
            return false;
        }

        if (this.id=="uploadintent"){
            if (this.files[0].size / (1024 * 1024).toFixed(2) != "0.00" ) {
                $("#letter_intent").html(((this.files[0].size / (1024 * 1024)).toFixed(2).toString()) + "MB");
            }
            else{
                $("#letter_intent").html((filesizekb.toString()) + "KB");
            }
            $("#uploadintent_textbox").attr("disabled", "disabled");
        }
        if (this.id=="uploadrec"){
            if (this.files[0].size / (1024 * 1024).toFixed(2) != "0.00") {
                $("#letter_recommendation").html(((this.files[0].size / (1024 * 1024)).toFixed(2).toString()) + "MB");
            }
            else{
                $("#letter_recommendation").html((filesizekb.toString()) + "KB")
            }
        }
        if (this.id=="uploadtrans"){
            if (this.files[0].size / (1024 * 1024).toFixed(2) != "0.00") {
                $("#letter_transcript").html(((this.files[0].size / (1024 * 1024)).toFixed(2).toString()) + "MB");
            }
            else{
                $("#letter_transcript").html((filesizekb.toString()) + "KB")
            }
        }
        if (this.id=="uploadcon"){
            if (this.files[0].size / (1024 * 1024).toFixed(2) != "0.00") {
                $("#letter_conference").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
            }
            else{
                $("#letter_conference").html((filesizekb.toString()) + "KB")
            }
            $("#conference_textbox").attr("disabled", "disabled");
        }

    });

    $('input[name="start_date"]').datepicker({
        singleDatePicker: true,
        minDate: 0
    });

    $('input[name="end_date"]').datepicker({
        singleDatePicker: true,
        minDate: 0
    });


    $('#outside').click(function(){
        //$('#tip-modal').modal({show: true});
        $("#dynamic").empty();

        $("#dynamic").append(
            "<div class='row'>"+
            "<div class='col-md-3 col-sm-3 col-xs-3'><span>&nbsp;</span></div>"+
            "<div class='col-md-9 col-sm-9 col-xs-9'>"+
            "<span style='text-align: justify;text-justify: inter-word;'>All students studying outside of Canada are required  to register on the Safety Abroad Database: <a href='http://travel.gc.ca/travelling/advisories'>http://travel.gc.ca/travelling/advisories</a></span>"+
            "</div></div><br>");

        $("#dynamic").append(
            "<div class='row' id='confirmation-advisory'>"+
            "<div class='col-md-3 col-sm-3 col-xs-3'><span>&nbsp;</span></div>"+
            "<div class='col-md-9 col-sm-9 col-xs-9'>"+
            "<div class='checkbox'>"+
            "<label><input type='checkbox' id='advisory-checkbox' value='0'>"+
            "<span style='text-align: justify;text-justify: inter-word;'>I have read the Department of Foreign Affairs Travel Advisory <a href='http://travel.gc.ca/travelling/advisories'>http://travel.gc.ca/travelling/advisories</a> for the country (and region) that I am seeking permission to attend, and confirm that it is not “High Risk” (listed as “Avoid non-essential travel” or “Avoid all travel”).  I understand that these Advisories change often, and should the Advisory change to “High Risk, my award of the Academic Travel Fund will be summarily revoked. </span>"+
            "</label></div></div></div><br>");
        $("#dynamic").append(
            "<div class='row' id='confirmation-requirment'>"+
            "<div class='col-md-3 col-sm-3 col-xs-3'><span>&nbsp;</span></div>"+
            "<div class='col-md-6 col-sm-6 col-xs-6'>"+
            "<div class='checkbox'>"+
            "<label><input type='checkbox' id='requirment-checkbox' value='0'>"+
            "<span> I have completed the online Request form to have added my name to the Safety Abroad Database.  I understand that additional requirements (attending a session, completing waivers, getting supplementary insurance) will be required if my LoP is granted. </span>"+
            "</label></div></div></div><br>");
        $("#dynamic").append(
            "<div class='row' id='confirmation-safety'>"+
            "<div class='col-md-3 col-sm-3 col-xs-3'><span>&nbsp;</span></div>"+
            "<div class='col-md-6 col-sm-6 col-xs-6'>"+
            "<div class='checkbox'>"+
            "<label><input type='checkbox' id='safety-checkbox' value='0'>"+
            "<span>I have read the Safety Abroad Guidelines. </span>"+
            "</label></div></div></div><br>");
        $("#dynamic").append(
            "<div class='row' id='country_travel'>"+
            "<div class='col-md-3 col-sm-3 col-xs-3'>Country of Travel</div>"+
            "<div class='col-md-5 col-sm-5 col-xs-5'>"+
            "<input type='text' id='country_travel_field' name='country_travel_field' value='' class='form-control'>"+
            "</div>" +
            "<div class='col-md-1 col-sm-1 col-xs-1'>" +
            "<span class='danger text-left'>*</span>"+
            "</div></div></div><br>");

    });

    $('#inside').click(function(){
        $("#dynamic").empty();
    });

    $("#cancel").click(function () {
        $('#cancel-modal').modal({show: true});
    });

    $("#submit").click(function(){
        if (!validatePhone($('#inputPhone').val().trim())) {
            utils.showMessage("danger", "Please fill in a valid contact number");
            window.scrollTo(0, 0);
            return false;
        }
        if ((! $('#inputNameTravel').val().trim()) || (!$("#uploadintent").val() && (! $('#uploadintent_saved').length)) || (!$("#uploadrec").val() && (! $('#uploadrec_saved').length)) || (!$("#uploadtrans").val() && (! $('#uploadtrans_saved').length)) || (!$("#uploadcon").val() && (! $('#uploadcon_saved').length))){
            utils.showMessage("danger", "Please fill in every required field");
            window.scrollTo(0, 0);
            return false;
        }
        if ( $('#outside').is(':checked') &&((! $('#safety-checkbox').is(":checked")) || (! $('#advisory-checkbox').is(":checked")) || (! $('#requirment-checkbox').is(":checked")))){
            utils.showMessage("danger", "Please accept the safety notice of abroad outside canada to continue");
            window.scrollTo(0, 0);
            return false;
        }
        if ( $('#outside').is(':checked') &&(! $('#country_travel_field').val().trim())){
            utils.showMessage("danger", "Please fill in the Country of Travel");
            window.scrollTo(0, 0);
            return false;
        }
        if (! $('#checkbox_agree').is(":checked")){
            utils.showMessage("danger", "Please accept the requirments and rules to continue");
            window.scrollTo(0, 0);
            return false;
        }

        if (parseFloat(($('#amount_requested').val()))<=0) {
            utils.showMessage("danger", "Please enter the requested amount");
            window.scrollTo(0, 0);
            return false;
        }


    });

    $("#save").click(function(){
        if ( $('#outside').is(':checked') &&(! $('#safety-checkbox').is(":checked"))){
            utils.showMessage("danger", "Please accept the safety notice of abroad outside canada to continue");
            window.scrollTo(0, 0);
            return false;
        }

    });


});


function validatePhone(txtPhone) {
    var filter = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
    if (filter.test(txtPhone)) {
        return true;
    }
    else {
        return false;
    }
}


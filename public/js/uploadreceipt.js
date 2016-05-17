
$(document).ready(function() {


    $('.checktype').on('change', function(){
        //alert(this.files[0].size);
        var filesize;
        var ext = $(this).val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['doc','docx','rtf','pdf']) == -1) {
            alert('The system only accepts Word (.doc and .docx), RTF or PDF files.');
            $(this).val('');
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

        if (filesize > max_size) {
            alert('This file size is ' + filesize + ' MB and it exceeds the ' + max_size + ' MB upload limit');
            $(this).val('');
            return false;
        }

        if (this.id=="receipt_1"){
            //alert("??");
            $("#letter_receipt1").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }
        if (this.id=="receipt_2"){
            //alert("??");
            $("#letter_receipt2").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }
        if (this.id=="receipt_3"){
            //alert("??");
            $("#letter_receipt3").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }
        if (this.id=="receipt_4"){
            //alert("??");
            $("#letter_receipt4").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }

        if (this.id=="receipt_5"){
            //alert("??");
            $("#letter_receipt5").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }
        if (this.id=="receipt_6"){
            //alert("??");
            $("#letter_receipt6").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }
        if (this.id=="receipt_7"){
            //alert("??");
            $("#letter_receipt7").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }
        if (this.id=="receipt_8"){
            //alert("??");
            $("#letter_receipt8").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }

        if (this.id=="receipt_9"){
            //alert("??");
            $("#letter_receipt9").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }
        if (this.id=="receipt_10"){
            //alert("??");
            $("#letter_receipt10").html(((this.files[0].size/(1024*1024)).toFixed(2).toString()) + "MB");
        }

    });

    $("#cancel").click(function () {
        $('#cancel-modal').modal({show: true});
    });



    $("#upload_receipt").click(function(){

        if (!$('#receipt_1').val() && !$('#receipt_2').val() && !$('#receipt_3').val() && !$('#receipt_4').val() && !$('#receipt_5').val() && !$('#receipt_6').val() && !$('#receipt_7').val() && !$('#receipt_8').val() && !$('#receipt_9').val() && !$('#receipt_10').val()){
            utils.showMessage("danger", "Please upload at least one receipt to continue");
            window.scrollTo(0, 0);
            return false;
        }

        if (($('#receipt_1').val() && $('#dropDownTypeReceipt1').val() == "0") || ($('#receipt_2').val() && $('#dropDownTypeReceipt2').val() == "0") || ($('#receipt_3').val() && $('#dropDownTypeReceipt3').val() == "0") || ($('#receipt_4').val() && $('#dropDownTypeReceipt4').val() == "0") || ($('#receipt_5').val() && $('#dropDownTypeReceipt5').val() == "0") ||  ($('#receipt_6').val() && $('#dropDownTypeReceipt6').val() == "0") || ($('#receipt_7').val() && $('#dropDownTypeReceipt7').val() == "0") || ($('#receipt_8').val() && $('#dropDownTypeReceipt8').val() == "0") || ($('#receipt_9').val() && $('#dropDownTypeReceipt9').val() == "0") || ($('#receipt_10').val() && $('#dropDownTypeReceipt10').val() == "0")){
            utils.showMessage("danger", "Please choose a type for your receipt");
            window.scrollTo(0, 0);
            return false;
        }

    });

    $("#upload_receipt_travel").click(function(){
        if (!$('#receipt_1').val() && !$('#receipt_2').val() && !$('#receipt_3').val() && !$('#receipt_4').val() && !$('#receipt_5').val() && !$('#receipt_6').val() && !$('#receipt_7').val() && !$('#receipt_8').val() && !$('#receipt_9').val() && !$('#receipt_10').val()){
            utils.showMessage("danger", "Please upload at least one receipt to continue");
            window.scrollTo(0, 0);
            return false;
        }
        if (($('#receipt_1').val() && $('#dropDownTypeReceipt1').val() == "0") || ($('#receipt_2').val() && $('#dropDownTypeReceipt2').val() == "0") || ($('#receipt_3').val() && $('#dropDownTypeReceipt3').val() == "0") || ($('#receipt_4').val() && $('#dropDownTypeReceipt4').val() == "0") || ($('#receipt_5').val() && $('#dropDownTypeReceipt5').val() == "0") ||  ($('#receipt_6').val() && $('#dropDownTypeReceipt6').val() == "0") || ($('#receipt_7').val() && $('#dropDownTypeReceipt7').val() == "0") || ($('#receipt_8').val() && $('#dropDownTypeReceipt8').val() == "0") || ($('#receipt_9').val() && $('#dropDownTypeReceipt9').val() == "0") || ($('#receipt_10').val() && $('#dropDownTypeReceipt10').val() == "0")){
            utils.showMessage("danger", "Please choose a type for your receipt");
            window.scrollTo(0, 0);
            return false;
        }
    });

});

//function SubmitDocument(event) {
//
//
//
//}

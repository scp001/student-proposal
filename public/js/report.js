$(document).ready(function() {

    $("#tcard_report").tablesorter();

    $('tr').click(function(){
        //var col = $(this).parent().children().index($(this));
        //var row = $(this).parent().parent().children().index($(this).parent());
        //var row = $(this).closest('tr'); // get the parent row of the clicked button
        //$(html).insertAfter(row); // insert content
        //alert('hehe');
        var $curRow = $(this).closest('tr');
        //var $newRow = '<tr></tr>';
        $curRow.after('<tr>...</tr>');
    });

    function addType(id) {
        var part = "";

        $.ajax({
            type: "GET",
            async: false,
            url: BASE_URL + "pay/" + id,
            dataType:'json',
            success: function (pay) {
                if (pay.pays) {

                    for (var pay_i in pay.pays){
                        //console.log(pay.pays[pay_i].visa);

                        if (pay.pays[pay_i].visa){
                            part = part +  "Visa, ";
                        }
                        if (pay.pays[pay_i].master){
                            part = part +  "Master, ";
                        }
                        if (pay.pays[pay_i].debit){
                            part = part +  "Debit, ";
                        }
                        if (pay.pays[pay_i].express){
                            part = part +  "American Express, ";
                        }
                        if (pay.pays[pay_i].cash){
                            part = part +  "Cash, ";
                        }
                        if (pay.pays[pay_i].other){
                            part = part +  "Other, ";
                        }

                    }
                    //console.log(trHTML);

                    //trHTML = trHTML.substring(0, -2);

                }
                //console.log(trHTML);
            }

        });

        //console.log(part);
        return part;

    }

    var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
    };
    var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: { days: 60 },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-sm btn-primary',
        cancelClass: 'btn-sm',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
    };
    var optionSet2 = {
        startDate: moment().subtract(7, 'days'),
        endDate: moment(),
        opens: 'left',
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    };
    $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    $('#reportrange').daterangepicker(optionSet1, cb);
    $('#reportrange').on('show.daterangepicker', function() { console.log("show event fired"); });
    $('#reportrange').on('hide.daterangepicker', function() { console.log("hide event fired"); });
    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are "
            + picker.startDate.format('MM-DD-YYYY')
            + " to "
            + picker.endDate.format('MM-DD-YYYY')
        );
        $.ajax({
            type: "GET",
            url: BASE_URL + "report/" + (picker.startDate.format('YYYY-MM-DD') + " " + picker.endDate.format('YYYY-MM-DD')),
            dataType: 'json',
            success: function (data) {
                if (data.orders) {
                    //alert(data.toSource());
                    $('#tcard_report tbody').empty();
                    var trHTML ='';
                    //console.log(data.orders[0]);
                  for (var order in  data.orders){
                        trHTML += '<tr><td>' +  data.orders[order].order_num +
                        '</td><td>' + data.orders[order].first +
                        '</td><td>' + data.orders[order].last +
                        '</td><td>' + data.orders[order].utorid+
                        //'</td><td>' + data.orders[order].tnumber +

                        '</td><td>' + data.orders[order].email
                      if (data.orders[order].meal_id == 1){
                          trHTML +='</td><td>' + 'Meal Plan Value' ;

                      }
                      else if (data.orders[order].meal_id == 2){
                          trHTML +='</td><td>' + 'Meal Plan Semester' ;
                      }
                      else if (data.orders[order].meal_id == 3){
                          trHTML +='</td><td>' + 'Meal Plan Lite' ;
                      }
                      else if (data.orders[order].meal_id == 4){
                          trHTML +='</td><td>' + 'Meal Plan Regular' ;
                      }
                      else if (data.orders[order].meal_id == 5){
                          trHTML +='</td><td>' + 'Other' ;
                      }

                        trHTML += '</td><td>' +'$'+ (parseFloat(data.orders[order].meal_plan_amount) + parseFloat(data.orders[order].additional_tbuck)).toString();
                        trHTML += '</td><td>' + data.orders[order].created_date;
                      trHTML += '</td><td>';
                      trHTML += addType(data.orders[order].id);
                      trHTML = trHTML.substring(0,trHTML.length - 2);
                      //console.log(trHTML);
                      trHTML +='</td><td>' + data.orders[order].comment + '</td>';
                      var url = BASE_URL + "detail/" + (data.orders[order].id);
                      trHTML +='</td><td><a href="' + url + '"' + '>Details</a></td></tr>';
                    }
                    $('#tcard_report').append(trHTML);
                }
                else{
                    alert("Please select a valid time range !");
                }
            },
            error:function(x, t){
                if(x.status==401)
                    alert("Your session has expired please refresh or login again!");
            }
        });


    });
    $('#reportrange').on('cancel.daterangepicker', function(ev, picker) { console.log("cancel event fired"); });

    $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
//                });
});


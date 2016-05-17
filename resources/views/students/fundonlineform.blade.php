@extends("layouts.mainfundonline")
@section("content")
    <?php use App\Http\Controllers\Helper;
    use App\Http\Controllers\Auth\Login;?>
    {{--{!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true, 'id'=>'upload', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}--}}
    {{--{!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true, 'id'=>'upload', 'urlenctype'=>'multipart/form-data')) !!}--}}
    {!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}

    <br>
    <div class="form-group" id="type-funding">
        <label for="dropDownTypeFunding" class="col-md-4 col-sm-4 col-xs-4 text-left">Type of Funding:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <select class="form-control" id="dropDownTypeFunding">
                <option value="1" id="enhancement" name="enhancement">Enhancement</option>
                <option value="2" id="partnership" name="partnership">Partnership</option>
                <option value="3" id="dsa" name="dsa">DSA</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputNameProposal" class="col-md-4 col-sm-4 col-xs-4 text-left">Name of group submitting proposal:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input type="text" class="form-control" maxlength="45" id="inputNameProposal" placeholder="Name of group submitting proposal" name="option[]">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <a href="{{URL::to('/')}}/landing" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</a>
        </div>
    </div>

    <div class="form-group hide" id="optionTemplate">
        <label class="col-md-4 col-sm-4 col-xs-4 text-left">&nbsp;</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input class="form-control" type="text" name="option[]" placeholder="Name of group submitting proposal"/>
        </div>
        <div class="col-xs-1">
            <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
        </div>
    </div>

    <div class="form-group">
        <label for="contactname" class="col-md-4 col-sm-4 col-xs-4 text-left">Contact Name:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="contactname"><?php echo Login::getUser()->givennames . " " . Login::getUser()->familyname;?></div>
    </div>

    <div class="form-group">
        <label for="contactemail" class="col-md-4 col-sm-4 col-xs-4 text-left">Contact Email:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="contactemail"><?php echo Login::getUser()->email;?></div>
    </div>
    <div class="form-group">
        <label for="inputCPhone" class="col-md-4 col-sm-4 col-xs-4 text-left">Contact Phone:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input type="tel" class="form-control" id="inputCPhone" placeholder="Contact Phone">
            <span id="spnPhoneStatus"></span>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <div class="form-group">
        <label for="workshop_date" class="col-md-4 col-sm-4 col-xs-4 text-left">Did you attend a funding workshop?</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input id="workshop_date" class="form-control" placeholder="Workshop Date" name="workshop_date" value=<?php echo date("m/d/Y")?> type="text">
        </div>
    </div>

    <div class="form-group">
        <label for="dropDownRound" class="col-md-4 col-sm-4 col-xs-4 text-left">Round #:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php
            if ((date("m/d/Y") >= $rounds["round1_start"]) && (date("m/d/Y") <= $rounds["round1_end"])){
                echo "Round 1";
            }
            elseif ((date("m/d/Y") >= $rounds["round2_start"]) && (date("m/d/Y") <= $rounds["round2_end"])){
                echo "Round 2";
            }
            else{
                echo "Round 3";
            }
            ?>
        </div>
    </div>

    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="round_set" name="round_set" value="  <?php
            if ((date("m/d/Y") >= $rounds["round1_start"]) && (date("m/d/Y") <= $rounds["round1_end"])){
                echo "1";
            }
            elseif ((date("m/d/Y") >= $rounds["round2_start"]) && (date("m/d/Y") <= $rounds["round2_end"])){
                echo "2";
            }
            else{
                echo "3";
            }

        ?>" >
    </div>

    <div class="form-group">
        <label for="nameEvent" class="col-md-4 col-sm-4 col-xs-4 text-left">Name of Event:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input type="text" class="form-control" maxlength="45" id="nameEvent" placeholder="Name of Event">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <div class="form-group">
        <label for="location" class="col-md-4 col-sm-4 col-xs-4 text-left">Event Location:</label>
        <div class="col-sm-8" id="radioLocation">
            <label class="radio-inline"> <input type="radio" name="location" id="location" value="1" checked> On Campus</label>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <label class="radio-inline"> <input type="radio" name="location" id="location" value="2"> Off Campus</label>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="event_overview" class="col-md-4 col-sm-4 col-xs-4 text-left">Please write an overview of your event (including the purpose, date, time, location, expected participation numbers, target audience and the marketing plan)</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <textarea  id="event_overview"  style="width: 400px; height:100px "></textarea>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <div class='row'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-5 col-sm-5 col-xs-5 danger">
            Total word count: <span id="display_count_overview">0</span> words. Words left: <span id="word_left_overview">250</span>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="contribution" class="col-md-4 col-sm-4 col-xs-4 text-left">How event will contribute to campus life?</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <textarea  id="contribution"  style="width: 400px"></textarea>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <div class='row'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-5 col-sm-5 col-xs-5 danger">
            Total word count: <span id="display_count">0</span> words. Words left: <span id="word_left">250</span>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-4 col-sm-4 col-xs-4 text-left">Budget:</label>
    </div>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <label for="amount_travel" class="col-md-4 col-sm-4 col-xs-4 text-left">Expenses (what you spend money on)</label>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            Services
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="item_amount1"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            Supplies
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="item_amount2"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            Pre-packaged snack foods
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="item_amount3"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            Catering/Meals
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="item_amount4"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            Gifts/Prizes
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="item_amount5"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            Printing/Photocopy
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="item_amount6"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            Miscellaneous
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="item_amount7"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <label for="amount_total" class="col-md-3 col-sm-3 col-xs-3 text-left" style="color: #ff0000;font-weight: bold">Total:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_total"  maxlength="10" value="0.00" class="two-digits form-control" disabled>
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <label for="amount_travel" class="col-md-4 col-sm-4 col-xs-4 text-left">Revenues (where you get money from)</label>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <input type="text" id="revenue1"  maxlength="20" placeholder="Revenue1">
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="revenue_amount1"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <input type="text" id="revenue2"  maxlength="20" placeholder="Revenue2">
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="revenue_amount2"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <input type="text" id="revenue3"  maxlength="20" placeholder="Revenue3">
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="revenue_amount3"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <input type="text" id="revenue4"  maxlength="20" placeholder="Revenue4">
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="revenue_amount4"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <input type="text" id="revenue5"  maxlength="20" placeholder="Revenue5">
        </div>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="revenue_amount5"  maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <label for="revenue_total" class="col-md-3 col-sm-3 col-xs-3 text-left" style="color: #ff0000;font-weight: bold">Total:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="revenue_total"  maxlength="10" value="0.00" class="two-digits form-control" disabled>
        </div>
    </div>
    <br>

    <div class="form-group">
        <label for="amount_requested_div" class="col-md-3 col-sm-3 col-xs-3 text-left">Amount Requested:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="amount_requested_div">
            <input type="text" id="amount_requested" name="amount_requested" maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="reqandrule" class="col-md-4 col-sm-4 col-xs-4 text-left">Requirements and Rules:</label>
        <div class="col-md-8 col-sm-8 col-xs-8" style="text-align: justify;text-justify: inter-word;">
            <span>By accessing and using the Student Affairs Online Funding Application, you accept and agree to be bound by the terms and conditions of this agreement. In addition, when using this service, you shall be subject to any posted guidelines or rules applicable to such services.  Submitting an application will constitute acceptance of the terms and conditions.</span>
            <br>
            <br>
            <span>NOTIFICATION Once a decision has been made by the Committee, the primary contact for the group/department/individual will be notified in writing (email). Funding allocations will depend on the funds available at that point in time.
            <br>
            <br>
            <span>DISTRIBUTION OF FUNDS Once a group/department/individual has been granted funding, they are responsible for the initial payment of all project costs. Individuals will only be reimbursed after documentation/receipts have been submitted to the Office of Student Affairs & Services.  Funds allocated remain available for use until September 30th of the academic year following the one which they were awarded.</span>
            <br>
            <br>
            <span>APPLICANT RESPONSIBILITIES Groups/departments/individuals that request and receive funds are responsible for the following: (1) Read and accept the Terms and Conditions (2) Submit an online project proposal within the timelines indicated (3) Attend and present the project to the Committee and answer any questions if required (4) Provide documentation/receipts to the Office of Student Affairs & Services to claim all funds</span>

        </div>
    </div>

    <div class="form-group">
        <label for="checkbox_agree" class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        <div class="col-md-1s col-sm-1 col-xs-1">
            <input type="checkbox" name="checkbox_agree" id="checkbox_agree">
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <span class="text-left" style="font-weight: bold;color: #ff0000">I have read and understand the rules.</span>
        </div>
    </div>

    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="user_id"  value="<?php echo Login::getUser()->peopleID;?>" >
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="form-group">
        <div class="buttons col-md-2 col-sm-2 col-xs-2">
            <button type="button" class="btn btn-danger" id="cancel" style="float: left;">Reset</button>
            <button type="button" class="btn btn-default" id="save">Save</button></div>
        <button type="button" class="btn btn-success" id="submit">Submit</button>

    </div>

    {!! Form::close() !!}
    <br>
    <br>

    @include("forms.acknowledgeModal")
    @include("forms.warningModal")
@stop
@section('javascript')
    <script src="{{ Helper::asset('js/onlinefund.js') }}"></script>
    <script src="{{ Helper::asset('js/moment.js') }}"></script>
    <script src="{{ Helper::asset('js/daterangepicker.js') }}"></script>
@stop

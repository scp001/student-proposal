@extends("layouts.main")
@section("content")
    <?php use App\Http\Controllers\Helper;
          use App\Http\Controllers\Auth\Login;?>
    <br>
    {!! Form::open(array('action'=>array('APIController@submitTravelForm'),'method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}

    <div class="form-group">
            <label for="inputName" class="col-md-3 col-sm-3 col-xs-3 text-left">Name:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="inputName"><?php $name = Login::getUser()->givennames . " " . Login::getUser()->familyname;echo $name;?></div>
            <div class="col-md-3 col-sm-3 col-xs-3">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;</span>
                <a href="{{ URL::to('/')}}/landing" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-arrow-left"></span>  Go Back</a>
            </div>
        </div>

    <div class="form-group">
            <label for="inputStudent" class="col-md-3 col-sm-3 col-xs-3 text-left">Student Number:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="inputStudent"><?php $studentID = Login::getUser()->studentID;echo $studentID;?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-md-3 col-sm-3 col-xs-3 text-left">Email:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="inputEmail"><?php $email = Login::getUser()->email;echo $email;?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPhone" class="col-md-3 col-sm-3 col-xs-3 text-left">Phone:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone">
                <span id="spnPhoneStatus"></span>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
                <span class="danger text-left">*</span>
            </div>
        </div>
        <div class="form-group">
            <label for="dropDownRound" class="col-md-3 col-sm-3 col-xs-3 text-left">Round #:</label>
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

        <div class="form-group">
            <label for="dropDownYear" class="col-md-3 col-sm-3 col-xs-3 text-left">Year of Study:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="dropDownRoundYear">
                <select class="form-control" id="dropDownYear" name="dropDownYear">
                    <option id="year1" name="year1" value="1">Year 1</option>
                    <option id="year2" name="year2" value="2">Year 2</option>
                    <option id="year3" name="year3" value="3">Year 3</option>
                    <option id="year4" name="year4" value="4">Year 4</option>
                    <option id="year5" name="year5" value="5">Year 5 +</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="dropDownProgram" class="col-md-3 col-sm-3 col-xs-3 text-left">Program Area:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="dropDownProgram">
                <select class="form-control" id="program" name="program">
                    <option id="program1" name="program1" value="1">Anthropology</option>
                    <option id="program2" name="program2" value="2">Arts, Culture & Media</option>
                    <option id="program3" name="program3" value="3">Biological Sciences</option>
                    <option id="program4" name="program4" value="4">Computer & Mathematical Sciences</option>
                    <option id="program5" name="program5" value="5">Critical Development Studies</option>
                    <option id="program6" name="program6" value="6">English</option>
                    <option id="program7" name="program7" value="7">French & Linguistics</option>
                    <option id="program8" name="program8" value="8">Historical & Cultural Studies</option>
                    <option id="program9" name="program9" value="9">Human Geography</option>
                    <option id="program10" name="program10" value="10">Management</option>
                    <option id="program11" name="program11" value="11">Philosophy</option>
                    <option id="program12" name="program12" value="12">Physical & Environmental Sciences</option>
                    <option id="program13" name="program13" value="13">Political Science</option>
                    <option id="program14" name="program14" value="14">Psychology</option>
                    <option id="program15" name="program15" value="15">Sociology</option>
                </select>
            </div>
        </div>

        <div class='row'>
            <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
            <div class="col-md-5 col-sm-5 col-xs-5"><span class="danger">Note : </span><span>If enrolled in more than one program area (e.g. double major), please choose the program most relevant to this travel</span></div>
        </div>
        <br>

        <div class="form-group">
            <label for="radioDestination" class="col-md-3 col-sm-3 col-xs-3 text-left">Travel Destination:</label>
            <div class="col-sm-8" id="radioDestination">
                <label class="radio-inline"> <input type="radio" name="destination" id="inside" value="0" checked> Inside Canada</label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <label class="radio-inline"> <input type="radio" name="destination" id="outside" value="1"> Outside Canada</label>
            </div>
        </div>

        <div id="dynamic">

        </div>
        <br>

        <div class="form-group">
            <label for="inputNameTravel" class="col-md-3 col-sm-3 col-xs-3 text-left">Name of conference/travel:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input type="text" class="form-control" id="inputNameTravel" name="name_conference" placeholder="Name of conference/travel">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
                <span class="danger text-left">*</span>
            </div>
        </div>
        <br>

        <div class="form-group">
            <label for="dateTravel" class="col-md-3 col-sm-3 col-xs-3 text-left">Dates of academic travel:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <div class="input-daterange input-group" id="dateRange" name="dateRange" data-id="3" data-holder="graphTAProgressHolder">
                    <input id="dateRangeStartDate" class="form-control" placeholder="Start Date" name="start_date" value=<?php echo date("m/d/Y")?> type="text">
                    <span class="input-group-addon">to</span>
                    <input id="dateRangeEndDate" class="form-control" placeholder="End Date" name="end_date" value=<?php echo date("m/d/Y")?> type="text">
                </div>
            </div>
        </div>

    <br>

    <div class='row'>
        <label for="uploadcon" class="col-md-3 col-sm-3 col-xs-3 text-left">Conference material:</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input id="uploadcon" size="35"  type="file" name="uploadcon" class="checktype">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span id="letter_conference" style="color:#C0C0C0 "></span>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>

    </div>
    <div class='row'>
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <span class="danger">Note : </span><span>The system only accepts Word (.doc and .docx), RTF or PDF files and the maximum file size is 64MB.</span>
        </div>

    </div>
    <br>
    <div class='row'>
        <label for="uploadintent_textbox" class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <textarea  id="conference_textbox" name="conference_textbox" style="width: 400px"></textarea>
        </div>
    </div>
    <br>
    <div class='row'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <div class="col-md-5 col-sm-5 col-xs-5 danger">
            Total word count: <span id="display_count_conference">0</span> words. Words left: <span id="word_left_conference">250</span>
        </div>
    </div>

    <br>
    <div class='row'>
        <label for="uploadintent" class="col-md-3 col-sm-3 col-xs-3 text-left">Letter of intent:</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
        <input id="uploadintent" size="35" type="file" name="uploadintent" class="checktype">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span id="letter_intent" style="color:#C0C0C0 "></span>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <div class='row'>
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <span class="danger">Note : </span><span>The system only accepts Word (.doc and .docx), RTF or PDF files and the maximum file size is 64MB.</span>
        </div>
    </div>
    <br>

    <div class='row'>
        <label for="uploadrec" class="col-md-3 col-sm-3 col-xs-3 text-left">Professor recommendation:</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input id="uploadrec" size="35" type="file" name="uploadrec" class="checktype">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span id="letter_recommendation" style="color:#C0C0C0 "></span>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <div class='row'>
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <span class="danger">Note : </span><span>The system only accepts Word (.doc and .docx), RTF or PDF files and the maximum file size is 64MB.</span>
        </div>

    </div>
    <br>
    <div class='row'>
        <label for="uploadtrans" class="col-md-3 col-sm-3 col-xs-3 text-left">Transcript:</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input id="uploadtrans" size="35" type="file" name="uploadtrans" class="checktype">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span id="letter_transcript" style="color:#C0C0C0 "></span>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <div class='row'>
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <span class="danger">Note : </span><span>The system only accepts Word (.doc and .docx), RTF or PDF files and the maximum file size is 64MB.</span>
        </div>
    </div>
    <br>

    <div class="form-group">
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">Budget:</label>
    </div>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>

        <label for="amount_travel" class="col-md-3 col-sm-3 col-xs-3 text-left">Transportation
            (air/rail/bus/car rental):</label>
        {{--<div class="col-md-5 col-sm-5 col-xs-5">Travel (air/train/bus):--}}
        {{--</div>--}}
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
        <input type="text" id="amount_travel" name="amount_travel" maxlength="10" value="0" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_acc" class="col-md-3 col-sm-3 col-xs-3 text-left">Accommodations:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_acc"  name="amount_acc" maxlength="10" value="0" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_con" class="col-md-3 col-sm-3 col-xs-3 text-left">Conference Fees:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_con"  name="amount_con" maxlength="10" value="0" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_miscellaneous" class="col-md-3 col-sm-3 col-xs-3 text-left">Membership Fees:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_mis"  name="amount_mis" maxlength="10" value="0" class="two-digits form-control" >
        </div>
    </div>

    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_conmeal" class="col-md-3 col-sm-3 col-xs-3 text-left">Conference Meals:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_conmeal"  name="amount_conmeal" maxlength="10" value="0" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_total" class="col-md-3 col-sm-3 col-xs-3 text-left" style="color: #ff0000;font-weight: bold">Total:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_total"  maxlength="10" value="0" class="two-digits form-control" disabled>
        </div>
    </div>
    <br>

    <div class="form-group">
        <label for="amount_requested_div" class="col-md-3 col-sm-3 col-xs-3 text-left">Amount Requested:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-left" style="font-size: 20px">$</label>
        <div class="col-md-4 col-sm-4 col-xs-4" id="amount_requested_div">
            <input type="text" id="amount_requested" name="amount_requested" maxlength="10" value="0.00" class="form-control two-digits" >
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="other_funding" class="col-md-3 col-sm-3 col-xs-3 text-left">Other sources of funding:</label>
        <div id="other_funding">
            <label class="col-md-2 col-sm-2 col-xs-2"><input type="checkbox" name="personal" id="personal" value="personal"> Personal</label>
            <label class="col-md-3 col-sm-3 col-xs-3"><input type="checkbox" name="scholarship" id="scholarship" value="scholarship"> Scholarship/bursary</label>
            <label class="col-md-3 col-sm-3 col-xs-3"><input type="checkbox" name="loan" id="loan" value="loan"> Loan</label>
        </div>
    </div>
    <div class='row'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <div class="col-md-5 col-sm-5 col-xs-5"><span class="danger">Note : </span><span>Check all that apply</span></div>
    </div>
    <br>
    <div class="form-group">
        <label for="reqandrule" class="col-md-3 col-sm-3 col-xs-3 text-left">Requirements and Rules:</label>
        <div class="col-md-9 col-sm-9 col-xs-9" style="text-align: justify;text-justify: inter-word;">
            <span>By accessing and using the Student Affairs Online Funding Application, you accept and agree to be bound by the terms and conditions of this agreement. In addition, when using this service, you shall be subject to any posted guidelines or rules applicable to such services.  Submitting an application will constitute acceptance of the terms and conditions.</span>
            <br>
            <br>
            <span>NOTIFICATION Once a decision has been made by the Committee, the primary contact for the group/department/individual will be notified in writing (email). Funding allocations will depend on the funds available at that point in time.</span>
            <br>
            <br>
            <span>DISTRIBUTION OF FUNDS Once a group/department/individual has been granted funding, they are responsible for the initial payment of all project costs. Individuals will only be reimbursed after documentation/receipts have been submitted to the Office of Student Affairs & Services.  Funds allocated remain available for use until September 30th of the academic year following the one which they were awarded.</span>
            <br>
            <br>
            <span>APPLICANT RESPONSIBILITIES Groups/departments/individuals that request and receive funds are responsible for the following: (1) Read and accept the Terms and Conditions (2) Submit an online project proposal within the timelines indicated (3) Attend and present the project to the Committee and answer any questions if required (4) Provide documentation/receipts to the Office of Student Affairs & Services to claim all funds</span>

        </div>
    </div>

    <div class="form-group">
        <label for="checkbox_agree" class="col-md-2 col-sm-2 col-xs-2 text-left">&nbsp;</label>
        <div class="col-md-1s col-sm-1 col-xs-1">
            <input type="checkbox" name="checkbox_agree" id="checkbox_agree">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <span class="text-left" style="font-weight: bold;color: #ff0000">I have read and understand the rules.</span>
        </div>
    </div>


    <br>
    <br>
    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="user_id" name="user_id" value="<?php echo Login::getUser()->peopleID;?>" >
    </div>
    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="contact_name" name="contact_name" value="<?php $name = Login::getUser()->givennames . " " . Login::getUser()->familyname;echo $name;?>" >
    </div>
    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="contact_email" name="contact_email" value="<?php $email = Login::getUser()->email;echo $email;?>" >
    </div>
    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="tcard" name="tcard" value="<?php $studentID = Login::getUser()->studentID;echo $studentID;?>" >
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
    <div class="buttons col-md-2 col-sm-2 col-xs-2">
        <button type="button" class="btn btn-danger" id="cancel" style="float: left;">Reset</button>
        <button type="submit" class="btn btn-default" id="save" name="save">Save</button></div>
        <button type="submit" class="btn btn-success" id="submit" name="submit">Submit</button>
    </div>

    {!! Form::close() !!}
    <br>
    <br>



    @include("forms.acknowledgeModal")
    @include("forms.warningModal")
@stop
@section('javascript')
    <script src="{{ Helper::asset('js/travelfund.js') }}"></script>
    <script src="{{ Helper::asset('js/moment.js') }}"></script>
    <script src="{{ Helper::asset('js/daterangepicker.js') }}"></script>
@stop

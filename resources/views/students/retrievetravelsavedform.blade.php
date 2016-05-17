@extends("layouts.main")
@section("content")
    <?php use App\Http\Controllers\Helper;
    use App\Http\Controllers\Auth\Login;?>
    @if ($submitted["status"] == 0)
    {!! Form::open(array('action'=>array('APIController@submitSavedTravelForm'),'method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}

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
            @if ($submitted["contact_phone"])
                <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone" value="<?php echo $submitted["contact_phone"] ?>">
            @else
                <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone">
            @endif
            <span id="spnPhoneStatus"></span>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <div class="form-group">
        <label for="dropDownRound" class="col-md-3 col-sm-3 col-xs-3 text-left">Round #:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="round">
            <?php
            if ($submitted["round"]){
                if ($submitted["round"] == 1){
                    echo "Round 1";
                }
                elseif ($submitted["round"] == 2){
                    echo "Round 2";
                }
                else{
                    echo "Round 3";
                }
            }
            else{
            if ((date("m/d/Y") >= $rounds["round1_start"]) && (date("m/d/Y") <= $rounds["round1_end"])){
                echo "Round 1";
            }
            elseif ((date("m/d/Y") >= $rounds["round2_start"]) && (date("m/d/Y") <= $rounds["round2_end"])){
                echo "Round 2";
            }
            else{
                echo "Round 3";
            }
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="dropDownYear" class="col-md-3 col-sm-3 col-xs-3 text-left">Year of Study:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="dropDownRoundYear">
            @if ($submitted["year"] == 1)

                <select class="form-control" id="dropDownYear" name="dropDownYear">
                    <option id="year1" name="year1" value="1">Year 1</option>
                    <option id="year2" name="year2" value="2">Year 2</option>
                    <option id="year3" name="year3" value="3">Year 3</option>
                    <option id="year4" name="year4" value="4">Year 4</option>
                    <option id="year5" name="year5" value="5">Year 5 +</option>
            </select>

            @elseif ($submitted["year"] == 2)
                <select class="form-control" id="dropDownYear" name="dropDownYear">
                    <option id="year1" name="year1" value="1">Year 1</option>
                    <option id="year2" name="year2" value="2" selected>Year 2</option>
                    <option id="year3" name="year3" value="3">Year 3</option>
                    <option id="year4" name="year4" value="4">Year 4</option>
                    <option id="year5" name="year5" value="5">Year 5 +</option>
                </select>
            @elseif ($submitted["year"] == 3)
                <select class="form-control" id="dropDownYear" name="dropDownYear">
                    <option id="year1" name="year1" value="1">Year 1</option>
                    <option id="year2" name="year2" value="2">Year 2</option>
                    <option id="year3" name="year3" value="3" selected>Year 3</option>
                    <option id="year4" name="year4" value="4">Year 4</option>
                    <option id="year5" name="year5" value="5">Year 5 +</option>
                </select>
            @elseif ($submitted["year"] == 4)
                <select class="form-control" id="dropDownYear" name="dropDownYear">
                    <option id="year1" name="year1" value="1">Year 1</option>
                    <option id="year2" name="year2" value="2">Year 2</option>
                    <option id="year3" name="year3" value="3">Year 3</option>
                    <option id="year4" name="year4" value="4" selected>Year 4</option>
                    <option id="year5" name="year5" value="5">Year 5 +</option>
                </select>
            @else
                <select class="form-control" id="dropDownYear" name="dropDownYear">
                    <option id="year1" name="year1" value="1">Year 1</option>
                    <option id="year2" name="year2" value="2">Year 2</option>
                    <option id="year3" name="year3" value="3">Year 3</option>
                    <option id="year4" name="year4" value="4">Year 4</option>
                    <option id="year5" name="year5" value="5" selected>Year 5 +</option>
                </select>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="dropDownProgram" class="col-md-3 col-sm-3 col-xs-3 text-left">Program Area:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="dropDownProgram">
            <select class="form-control" id="program" name="program">
                <option id="program1" name="program1" <?php if ($submitted["program"] == 1 ) echo 'selected'; ?> value="1">Anthropology</option>
                <option id="program2" name="program2" <?php if ($submitted["program"] == 2 ) echo 'selected'; ?> value="2">Arts, Culture & Media</option>
                <option id="program3" name="program3" <?php if ($submitted["program"] == 3 ) echo 'selected'; ?> value="3">Biological Sciences</option>
                <option id="program4" name="program4" <?php if ($submitted["program"] == 4 ) echo 'selected'; ?> value="4">Computer & Mathematical Sciences</option>
                <option id="program5" name="program5" <?php if ($submitted["program"] == 5 ) echo 'selected'; ?> value="5">Critical Development Studies</option>
                <option id="program6" name="program6" <?php if ($submitted["program"] == 6 ) echo 'selected'; ?> value="6">English</option>
                <option id="program7" name="program7" <?php if ($submitted["program"] == 7 ) echo 'selected'; ?> value="7">French & Linguistics</option>
                <option id="program8" name="program8" <?php if ($submitted["program"] == 8 ) echo 'selected'; ?> value="8">Historical & Cultural Studies</option>
                <option id="program9" name="program9" <?php if ($submitted["program"] == 9 ) echo 'selected'; ?> value="9">Human Geography</option>
                <option id="program10" name="program10" <?php if ($submitted["program"] == 10 ) echo 'selected'; ?> value="10">Management</option>
                <option id="program11" name="program11" <?php if ($submitted["program"] == 11) echo 'selected'; ?> value="11">Philosophy</option>
                <option id="program12" name="program12" <?php if ($submitted["program"] == 12 ) echo 'selected'; ?> value="12">Physical & Environmental Sciences</option>
                <option id="program13" name="program13" <?php if ($submitted["program"] == 13 ) echo 'selected'; ?> value="13">Political Science</option>
                <option id="program14" name="program14" <?php if ($submitted["program"] == 14 ) echo 'selected'; ?> value="14">Psychology</option>
                <option id="program15" name="program15" <?php if ($submitted["program"] == 15 ) echo 'selected'; ?> value="15">Sociology</option>
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
            <label class="radio-inline"> <input type="radio" name="destination" id="inside" value="0" <?php if ($submitted["destination"] == 0) {echo 'checked';} ?>> Inside Canada</label>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <label class="radio-inline"> <input type="radio" name="destination" id="outside" value="1" <?php if ($submitted["destination"] == 1) {echo 'checked';} ?>> Outside Canada</label>
        </div>
    </div>

    @if ($submitted["destination"] == 1)
        <div id="dynamic">
            <div class='row'>
                <div class='col-md-3 col-sm-3 col-xs-3'><span>&nbsp;</span></div>
                <div class='col-md-9 col-sm-9 col-xs-9'>
                    <span style='text-align: justify;text-justify: inter-word;'>All students studying outside of Canada are required  to register on the Safety Abroad Database: <a href='http://travel.gc.ca/travelling/advisories'>http://travel.gc.ca/travelling/advisories</a></span>
                </div>
            </div>
            <br>
            <div class='row' id='confirmation-advisory'>
                <div class='col-md-3 col-sm-3 col-xs-3'><span>&nbsp;</span></div>
                <div class='col-md-9 col-sm-9 col-xs-9'>
                    <div class='checkbox'>
                        <label>
                            <input type='checkbox' id='advisory-checkbox' value='0' checked>
                            <span style='text-align: justify;text-justify: inter-word;'>I have read the Department of Foreign Affairs Travel Advisory <a href='http://travel.gc.ca/travelling/advisories'>http://travel.gc.ca/travelling/advisories</a> for the country (and region) that I am seeking permission to attend, and confirm that it is not “High Risk” (listed as “Avoid non-essential travel” or “Avoid all travel”).  I understand that these Advisories change often, and should the Advisory change to “High Risk, my award of the Academic Travel Fund will be summarily revoked. </span>
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class='row' id='confirmation-requirment'>
                <div class='col-md-3 col-sm-3 col-xs-3'><span>&nbsp;</span></div>
                <div class='col-md-9 col-sm-9 col-xs-9'>
                    <div class='checkbox'>
                        <label><input type='checkbox' id='requirment-checkbox' value='0' checked>
                            <span style='text-align: justify;text-justify: inter-word;'> I have completed the online Request form to have added my name to the Safety Abroad Database.  I understand that additional requirements (attending a session, completing waivers, getting supplementary insurance) will be required if my LoP is granted. </span>
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class='row' id='confirmation-safety'>
                <div class='col-md-3 col-sm-3 col-xs-3'><span>&nbsp;</span></div>
                <div class='col-md-9 col-sm-9 col-xs-9'>
                    <div class='checkbox'>
                        <label>
                            <input type='checkbox' id='safety-checkbox' value='0' checked>
                            <span>I have read the Safety Abroad Guidelines. </span>
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group" id="country_travel">
                <div class='col-md-3 col-sm-3 col-xs-3'>Country of Travel</div>
                <div class='col-md-5 col-sm-5 col-xs-5'>
                    @if ($submitted["travel_country"])
                        <input type='text' id='country_travel_field' name='country_travel_field' value='<?php echo $submitted["travel_country"] ?>' class='form-control'>
                    @else
                        <input type='text' id='country_travel_field' name='country_travel_field' value='' class='form-control'>
                    @endif
                </div>
                <div class='col-md-1 col-sm-1 col-xs-1'>
                    <span class='danger text-left'>*</span>
                </div>
            </div>
        </div>
    @else
        <div id="dynamic">
        </div>
    @endif
    <br>

    <div class="form-group">
        <label for="inputNameTravel" class="col-md-3 col-sm-3 col-xs-3 text-left">Name of conference/travel:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input type="text" class="form-control" id="inputNameTravel" name="name_conference" placeholder="Name of conference/travel" value="<?php echo $submitted["name_conference"]; ?>">
        </div>
        <div class='col-md-1 col-sm-1 col-xs-1'>
            <span class='danger text-left'>*</span>
        </div>
    </div>
    <br>

    <div class="form-group">
        <label for="dateTravel" class="col-md-3 col-sm-3 col-xs-3 text-left">Dates of academic travel:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="input-daterange input-group" id="dateRange" name="dateRange" data-id="3" data-holder="graphTAProgressHolder">
                <input id="dateRangeStartDate" class="form-control" placeholder="Start Date" name="start_date" value="<?php if ($submitted["start_date"]) {echo $submitted["start_date"];} else{echo "01/01/2015";}; ?>" type="text">
                <span class="input-group-addon">to</span>
                <input id="dateRangeEndDate" class="form-control" placeholder="End Date" name="end_date" value="<?php if ($submitted["end_date"]) {echo $submitted["end_date"];} else{echo "01/01/2015";}; ?>" type="text">
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
            <span class="danger">Note : </span><span>The system only accepts Word (.doc and .docx), RTF or PDF files and the maximum file size is 64M.</span>
        </div>

    </div>
    <br>

    <?php
    $directory = 'TravelFund_' .$submitted["unique_id"];
    $files = File::allFiles($directory);
    foreach ($files as $file)
    {
    if (pathinfo($file)['filename'] == 'conference'){
    ?>
    <div class='row'>
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5" id="uploadcon_saved">
            <span>file saved : </span><span><a href="{{ asset('download/' . $submitted["unique_id"].'/conference') }}"><?php echo pathinfo($file)['basename'] ?></a></span>
        </div>
    </div>
    <br>
    <?php
    }
    }
    ?>

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
            <span class="danger">Note : </span><span>The system only accepts Word (.doc and .docx), RTF or PDF files and the maximum file size is 64M.</span>
        </div>
    </div>
    <br>

    <?php
    $directory = 'TravelFund_' .$submitted["unique_id"];
    $files = File::allFiles($directory);
    foreach ($files as $file)
    {
    if (pathinfo($file)['filename'] == 'intentletter'){
    ?>
    <div class='row'>
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5" id="uploadintent_saved">
            <span>file saved : </span><span><a href="{{ asset('download/' . $submitted["unique_id"].'/intentletter') }}"><?php echo pathinfo($file)['basename'] ?></a></span>
        </div>
    </div>
    <br>
    <?php
    }
    }
    ?>

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
            <span class="danger">Note : </span><span>The system only accepts Word (.doc and .docx), RTF or PDF files and the maximum file size is 64M.</span>
        </div>

    </div>
    <br>

    <?php
    $directory = 'TravelFund_' .$submitted["unique_id"];
    $files = File::allFiles($directory);
    foreach ($files as $file)
    {
    if (pathinfo($file)['filename'] == 'recommendation'){
    ?>
    <div class='row'>
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5" id="uploadrec_saved">
            <span>file saved : </span><span><a href="{{ asset('download/' . $submitted["unique_id"].'/recommendation') }}"><?php echo pathinfo($file)['basename'] ?></a></span>
        </div>
    </div>
    <br>
    <?php
    }
    }
    ?>

    <div class='row'>
        <label for="uploadtrans" class="col-md-3 col-sm-3 col-xs-3 text-left">Transcript:</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input id="uploadtrans" size="35" type="file" name="uploadtrans" class="checktype">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span id="letter_transcript" style="color:#C0C0C0 "></span>
        </div>
        <div class='col-md-1 col-sm-1 col-xs-1'>
            <span class='danger text-left'>*</span>
        </div>

    </div>
    <div class='row'>
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <span class="danger">Note : </span><span>The system only accepts Word (.doc and .docx), RTF or PDF files and the maximum file size is 64M.</span>
        </div>
    </div>

    <br>

    <?php
    $directory = 'TravelFund_' .$submitted["unique_id"];
    $files = File::allFiles($directory);
    foreach ($files as $file)
    {
    if (pathinfo($file)['filename'] == 'transcript'){
    ?>
    <div class='row'>
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5" id="uploadtrans_saved">
            <span>file saved : </span><span><a href="{{ asset('download/' . $submitted["unique_id"].'/transcript') }}"><?php echo pathinfo($file)['basename'] ?></a></span>
        </div>
    </div>
    <br>
    <?php
    }
    }
    ?>

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
            <input type="text" id="amount_travel" name="amount_travel" maxlength="10" value="<?php if ($submitted["amount_travel"]) {echo $submitted["amount_travel"];} else{echo "0";}; ?>" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_acc" class="col-md-3 col-sm-3 col-xs-3 text-left">Accommodations:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_acc"  name="amount_acc" maxlength="10" value="<?php if ($submitted["amount_acc"]) {echo $submitted["amount_acc"];} else{echo "0";}; ?>" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_con" class="col-md-3 col-sm-3 col-xs-3 text-left">Conference Fees:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_con"  name="amount_con" maxlength="10" value="<?php if ($submitted["amount_con"]) {echo $submitted["amount_con"];} else{echo "0";}; ?>" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_miscellaneous" class="col-md-3 col-sm-3 col-xs-3 text-left">Membership Fees:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_mis"  name="amount_mis" maxlength="10" value="<?php if ($submitted["amount_mis"]) {echo $submitted["amount_mis"];} else{echo "0";}; ?>" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_conmeal" class="col-md-3 col-sm-3 col-xs-3 text-left">Conference Meals:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_conmeal"  name="amount_conmeal" maxlength="10" value="<?php if ($submitted["amount_conmeal"]) {echo $submitted["amount_conmeal"];} else{echo "0";}; ?>" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_total" class="col-md-3 col-sm-3 col-xs-3 text-left" style="color: #ff0000;font-weight: bold">Total:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_total"  maxlength="10" value="<?php $total = 0;if ($submitted["amount_travel"]) {$total += $submitted["amount_travel"];}if ($submitted["amount_acc"]) {$total += $submitted["amount_acc"];} if ($submitted["amount_con"]){$total += $submitted["amount_con"];} if ($submitted["amount_mis"]){$total += $submitted["amount_mis"];} if ($submitted["amount_conmeal"]) {$total += $submitted["amount_conmeal"];} echo $total; ?>" class="two-digits form-control" disabled>
        </div>
    </div>
    <br>

    <div class="form-group">
        <label for="amount_requested_div" class="col-md-3 col-sm-3 col-xs-3 text-left">Amount Requested:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-left" style="font-size: 20px">$</label>
        <div class="col-md-4 col-sm-4 col-xs-4" id="amount_requested_div">
            @if ($submitted["amount_requested"])
                <input type="text" id="amount_requested" name="amount_requested" maxlength="10" value="<?php echo $submitted["amount_requested"] ?>" class="form-control two-digits" >
            @else
                <input type="text" id="amount_requested" name="amount_requested" maxlength="10" value="0.00" class="form-control two-digits" >
            @endif
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="other_funding" class="col-md-3 col-sm-3 col-xs-3 text-left">Other sources of funding:</label>
        <div id="other_funding">
            <label class="col-md-2 col-sm-2 col-xs-2"><input type="checkbox" name="personal" id="personal" value="personal" <?php if (in_array($submitted["other_funding"],array(1,4,5,7))) {echo 'checked';}?>> Personal</label>
            <label class="col-md-3 col-sm-3 col-xs-3"><input type="checkbox" name="scholarship" id="scholarship" value="scholarship" <?php if (in_array($submitted["other_funding"],array(2,4,6,7))) {echo 'checked';}?>> Scholarship/bursary</label>
            <label class="col-md-3 col-sm-3 col-xs-3"><input type="checkbox" name="loan" id="loan" value="loan" <?php if (in_array($submitted["other_funding"],array(3,5,6,7))) {echo 'checked';}?> > Loan</label>
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
        <input id="case_id"  name="case_id" value="<?php echo $submitted["id"];?>" >
    </div>
    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="unique_id"  name="unique_id" value="<?php echo $submitted["unique_id"];?>" >
    </div>
    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="round_set" name="round_set" value="  <?php
        if ($submitted["round"]){
            echo $submitted["round"];
        }
        else{
            if ((date("m/d/Y") >= $rounds["round1_start"]) && (date("m/d/Y") <= $rounds["round1_end"])){
                echo "1";
            }
            elseif ((date("m/d/Y") >= $rounds["round2_start"]) && (date("m/d/Y") <= $rounds["round2_end"])){
                echo "2";
            }
            else{
                echo "3";
            }
        }

        ?>" >
    </div>

    <div class="form-group">
        <div class="buttons col-md-2 col-sm-2 col-xs-2">
            <button type="button" class="btn btn-danger" id="cancel" style="float: left;">Cancel</button>
            <button type="submit" class="btn btn-default" id="save" name="save">Save</button></div>
        <button type="submit" class="btn btn-success" id="submit" name="submit">Submit</button>

    </div>

    {!! Form::close() !!}
    <br>
    <br>
    @else
        {!! Form::open(array('action'=>array('APIController@uploadReceipt'),'method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}

        <div class="form-group">
            <label class="col-md-5 col-sm-5 col-xs-5 text-left" style="font-weight: bold">Upload Receipt:</label>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <a href="{{URL::previous()}}" class="btn btn-lg btn-success" style="float: right"><span class="glyphicon glyphicon-arrow-left"></span>  Go Back</a>
            </div>
        </div>

        <div class="form-group" style="display: none;" >
            <input id="reimbursment" name="reimbursment" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold" value="<?php echo $submitted["reimbursment"];?>">
        </div>

        <div class="form-group" style="display: none;" >
            <input id="case_id" name="case_id" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold" value="<?php echo $submitted["id"];?>">
        </div>

        <div class="form-group" style="display: none;" >
            <input id="name_cheque" name="name_cheque" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold" value="<?php echo $submitted["name_cheque"];?>">
        </div>
        <br>
        <div class="form-group">
            <label class="col-md-10 col-sm-10 col-xs-10 " style="color: #ff0000;">Note: If there are not enough fields below, you can combine receipts of a similar type (eg. travel)</label>
        </div>
        <br>

        <div class='row'>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt1">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_1" size="35" type="file" name="receipt_1" class="checktype" >
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt1" style="color:#C0C0C0 "></span>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt2">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_2" size="35" type="file" name="receipt_2" class="checktype">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt2" style="color:#C0C0C0 "></span>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt3">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_3" size="35" type="file" name="receipt_3" class="checktype">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt3" style="color:#C0C0C0 "></span>
            </div>
        </div>

        <br>

        <div class="form-group">
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt4">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_4" size="35" type="file" name="receipt_4" class="checktype">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt4" style="color:#C0C0C0 "></span>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt5">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_5" size="35" type="file" name="receipt_5" class="checktype">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt5" style="color:#C0C0C0 "></span>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt6">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_6" size="35" type="file" name="receipt_6" class="checktype">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt6" style="color:#C0C0C0 "></span>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt7">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_7" size="35" type="file" name="receipt_7" class="checktype">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt7" style="color:#C0C0C0 "></span>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt8">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_8" size="35" type="file" name="receipt_8" class="checktype">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt8" style="color:#C0C0C0 "></span>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt9">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_9" size="35" type="file" name="receipt_9" class="checktype">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt9" style="color:#C0C0C0 "></span>
            </div>
        </div>

        <br>

        <div class="row">
            {{--<div class="col-xs-2">--}}
            {{--<button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>--}}
            {{--</div>--}}
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeReceipt10">
                    <option value="0" id="default" name="default">Please select type</option>
                    <option value="1" id="accomodation" name="accomodation">Accomodation</option>
                    <option value="2" id="airfare" name="airfare">Airfare</option>
                    <option value="3" id="bus" name="bus">Bus</option>
                    <option value="4" id="packaged" name="packaged">Packaged food (e.g. snacks)</option>
                    <option value="5" id="fresh" name="fresh">Fresh Food (e.g. pizza)</option>
                    <option value="6" id="supplies" name="supplies">Supplies</option>
                    <option value="7" id="services" name="services">Services</option>
                    <option value="8" id="printing" name="printing">Printing</option>
                    <option value="9" id="autovisual" name="autovisual">Auto Visual</option>
                    <option value="10" id="other" name="other">Other</option>
                </select>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="receipt_10" size="35" type="file" name="receipt_10" class="checktype">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span id="letter_receipt10" style="color:#C0C0C0 "></span>
            </div>

        </div>

        <br>

        <div class="form-group">
            <label class="col-md-10 col-sm-10 col-xs-10 " style="color: #ff0000;">Note: Once you have completed this page
                you must bring ALL original receipts to the Student Affairs Office.</label>
        </div>
        <br>

        <div class="form-group">
            <label for="reflection" class="col-md-3 col-sm-3 col-xs-3 text-left">Reflection:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <textarea  id="reflection" name="reflection" style="width: 400px"></textarea>
            </div>
        </div>

        <br>

        <div class="row">
            <label for="receipts" class="col-md-3 col-sm-3 col-xs-3 text-left">Receipts uploaded:</label>

        <?php
        $directory = 'TravelFundReceipt' .$submitted["id"];
        $files = File::allFiles($directory);
        foreach ($files as $file)
        {?>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <a href="{{ asset('receipts/' . $submitted["id"].'/'.pathinfo($file)['filename']) }}"><?php echo pathinfo($file)['basename']; ?></a>
        </div>
        </div>
        <div class="row">
            <label class="col-md-3 col-sm-3 col-xs-3">&nbsp;</label>
        <br>
        <?php }
        ?>
        </div>
        <br>
        <br>

        <div class="form-group">
            <div class="buttons col-md-2 col-sm-2 col-xs-2">
                <button type="button" class="btn btn-danger" id="cancel" style="float: left;">Reset</button>
                <button type="submit" class="btn btn-default" id="save_receipt_travel" name="save_receipt_travel">Save</button></div>
            <button type="submit" class="btn btn-success" id="upload_receipt_travel" name="upload_receipt_travel">Submit</button>

        </div>
        <br>

        {!! Form::close() !!}
        @endif

    @include("forms.acknowledgeModal")
    @include("forms.warningModal")

    @stop

@section('javascript')
    <script src="{{ Helper::asset('js/travelfund.js') }}"></script>
    <script src="{{ Helper::asset('js/uploadreceipt.js') }}"></script>
    <script src="{{ Helper::asset('js/moment.js') }}"></script>
    <script src="{{ Helper::asset('js/daterangepicker.js') }}"></script>
@stop

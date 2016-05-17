@extends("layouts.main")
@section("content")
    <?php use App\Http\Controllers\Helper; ?>
    {!! Form::open(array('action'=>array('APIController@filterTravelForm'),'method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}
    <br>
    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="case_id" name="case_id" value="<?php echo $submitted["id"];?>" >
    </div>

    <div class="form-group">
        <label for="contactname" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Status:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="status" style="font-weight: bold; color: #ff0000">
            <?php
            if ($submitted["status"] == 1){
                echo 'Pending';
            }
            else if ($submitted["status"] == 2){
                echo 'Approved';
            }
            else if ($submitted["status"] == 4){
                echo 'Canceled by student';
            }
            else if ($submitted["status"] == 6){
                echo 'Receipts uploaded';
            }
            else{
                echo 'Declined';
            }
            ?>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-3">
            <a href="{{URL::previous()}}" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</a>
        </div>
    </div>

    <div class="form-group">
        <label for="contactname" class="col-md-4 col-sm-4 col-xs-4 text-left">Contact Name:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="contactname">
            <?php echo $submitted["contact_name"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="tcard" class="col-md-4 col-sm-4 col-xs-4 text-left">Student Number:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="tcard">
            <?php echo $submitted["tcard"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="contactemail" class="col-md-4 col-sm-4 col-xs-4 text-left">Contact Email:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="contactemail">
            <input id="contact_email" name="contact_email" class="form-control" value="<?php if ($submitted["contact_email"]) {echo $submitted["contact_email"];}?>" >
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <input style="display: none;" id="contactemailinput" name="contactemailinput" value="<?php echo $submitted["contact_email"];?>">

    <input style="display: none;" id="nameinput" name="nameinput" value="<?php echo $submitted["contact_name"];?>">

    <div class="form-group">
        <label for="contactphone" class="col-md-4 col-sm-4 col-xs-4 text-left">Contact Phone:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="contactphone">
            @if ($submitted["contact_phone"])
                <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone" value="<?php echo $submitted["contact_phone"] ?>">
            @else
                <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone">
            @endif
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

    <div class="form-group">
    <label for="dropDownRound" class="col-md-4 col-sm-4 col-xs-4 text-left">Round #:</label>
    <div class="col-md-4 col-sm-4 col-xs-4">
    <select class="form-control" id="dropDownRound" name="dropDownRound">
    <option id="round1" name="round1" value="1" <?php if ($submitted['round'] == 1) {echo 'selected';} ?> >Round 1</option>
    <option id="round2" name="round2" value="2" <?php if ($submitted['round'] == 2) {echo 'selected';} ?>>Round 2</option>
    <option id="round3" name="round3" value="3" <?php if ($submitted['round'] == 3) {echo 'selected';} ?>>Round 3</option>
    </select>
    </div>
    </div>

    <div class="form-group">
        <label for="dropDownYear" class="col-md-4 col-sm-4 col-xs-4 text-left">Year of Study:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="dropDownRoundYear">
            <select class="form-control" id="dropDownYear" name="dropDownYear">
                <option id="year1" name="year1" value="1" <?php if ($submitted["year"] == 1){ echo 'selected'; } ?>>Year 1</option>
                <option id="year2" name="year2" value="2" <?php if ($submitted["year"] == 2){ echo 'selected'; } ?>>Year 2</option>
                <option id="year3" name="year3" value="3" <?php if ($submitted["year"] == 3){ echo 'selected'; } ?>>Year 3</option>
                <option id="year4" name="year4" value="4" <?php if ($submitted["year"] == 4){ echo 'selected'; } ?>>Year 4</option>
                <option id="year5" name="year5" value="5" <?php if ($submitted["year"] == 5){ echo 'selected'; } ?>>Year 5 +</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="dropDownProgram" class="col-md-4 col-sm-4 col-xs-4 text-left">Program Area:</label>
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

    <div class="form-group">
        <label for="radioDestination" class="col-md-4 col-sm-4 col-xs-4 text-left">Travel Destination:</label>
        <div class="col-sm-8" id="radioDestination">
            <label class="radio-inline"> <input type="radio" name="destination" id="inside" value="0" <?php if ($submitted["destination"] == 0) {echo 'checked';} ?>> Inside Canada</label>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <label class="radio-inline"> <input type="radio" name="destination" id="outside" value="1" <?php if ($submitted["destination"] == 1) {echo 'checked';} ?>> Outside Canada</label>
        </div>
    </div>

    @if ($submitted["destination"] == 1)
        <div id="dynamic">
            <div class='row'>
                <div class='col-md-4 col-sm-4 col-xs-4'><span>&nbsp;</span></div>
                <div class='col-md-8 col-sm-8 col-xs-8'>
                    <span style='text-align: justify;text-justify: inter-word;'>All students studying outside of Canada are required  to register on the Safety Abroad Database: <a href='http://travel.gc.ca/travelling/advisories'>http://travel.gc.ca/travelling/advisories</a></span>
                </div>
            </div>
            <br>
            <div class='row' id='confirmation-advisory'>
                <div class='col-md-4 col-sm-4 col-xs-4'><span>&nbsp;</span></div>
                <div class='col-md-8 col-sm-8 col-xs-8'>
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
                <div class='col-md-4 col-sm-4 col-xs-4'><span>&nbsp;</span></div>
                <div class='col-md-8 col-sm-8 col-xs-8'>
                    <div class='checkbox'>
                        <label><input type='checkbox' id='requirment-checkbox' value='0' checked>
                            <span style='text-align: justify;text-justify: inter-word;'> I have completed the online Request form to have added my name to the Safety Abroad Database.  I understand that additional requirements (attending a session, completing waivers, getting supplementary insurance) will be required if my LoP is granted. </span>
                            </label>
                    </div>
                </div>
            </div>
            <br>
            <div class='row' id='confirmation-safety'>
                <div class='col-md-4 col-sm-4 col-xs-4'><span>&nbsp;</span></div>
                <div class='col-md-8 col-sm-8 col-xs-8'>
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
                <div class='col-md-4 col-sm-4 col-xs-4'>Country of Travel</div>
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
        <label for="inputNameTravel" class="col-md-4 col-sm-4 col-xs-4 text-left">Name of conference/travel:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="inputNameTravel">
            <input type="text" class="form-control" id="inputNameTravel" name="name_conference" placeholder="Name of conference/travel" value="<?php echo $submitted["name_conference"]; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="dateTravel" class="col-md-4 col-sm-4 col-xs-4 text-left">Dates of academic travel:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="input-daterange input-group" id="dateRange" name="dateRange" data-id="3" data-holder="graphTAProgressHolder">
                <input id="dateRangeStartDate" class="form-control" placeholder="Start Date" name="start_date" value="<?php if ($submitted["start_date"]) {echo $submitted["start_date"];} else{echo "01/01/2015";}; ?>" type="text">
                <span class="input-group-addon">to</span>
                <input id="dateRangeEndDate" class="form-control" placeholder="End Date" name="end_date" value="<?php if ($submitted["end_date"]) {echo $submitted["end_date"];} else{echo "01/01/2015";}; ?>" type="text">
            </div>
        </div>
    </div>

    <?php if ($submitted["unique_id"]) {?>

    <?php
    $directory = 'TravelFund_' .$submitted["unique_id"];
    $files = File::allFiles($directory);
    foreach ($files as $file)
    {
    if (pathinfo($file)['filename'] == 'conference'){
    ?>
    <div class="form-group">
        <label for="letter_conference" class="col-md-4 col-sm-4 col-xs-4 text-left">Conference material:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="letter_conference">
            <a href="{{ asset('download/' . $submitted["unique_id"].'/conference') }}"><?php echo pathinfo($file)['basename'] ?></a>
        </div>
    </div>
    <?php
    }
    }
    ?>
    <?php
    }
    ?>

    <?php
    $directory = 'TravelFund_' .$submitted["unique_id"];
    $files = File::allFiles($directory);
    foreach ($files as $file)
    {
    if (pathinfo($file)['filename'] == 'intentletter'){
    ?>

    <div class="form-group">
        <label for="letter_intent" class="col-md-4 col-sm-4 col-xs-4 text-left">Letter of intent:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="letter_intent">
            <a href="{{ asset('download/' . $submitted["unique_id"].'/intentletter') }}"><?php echo pathinfo($file)['basename'] ?></a>
        </div>
    </div>
    <?php
    }
    }
    ?>

    <?php
    $directory = 'TravelFund_' .$submitted["unique_id"];
    $files = File::allFiles($directory);
    foreach ($files as $file)
    {
    if (pathinfo($file)['filename'] == 'recommendation'){
    ?>
    <div class="form-group">
        <label for="letter_recommendation" class="col-md-4 col-sm-4 col-xs-4 text-left">Professor recommendation:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="letter_recommendation">
            <a href="{{ asset('download/' . $submitted["unique_id"].'/recommendation') }}"><?php echo pathinfo($file)['basename'] ?></a>
        </div>
    </div>
    <?php
    }
    }
    ?>

    <?php
    $directory = 'TravelFund_' .$submitted["unique_id"];
    $files = File::allFiles($directory);
    foreach ($files as $file)
    {
    if (pathinfo($file)['filename'] == 'transcript'){
    ?>
    <div class="form-group">
        <label for="letter_transcript" class="col-md-4 col-sm-4 col-xs-4 text-left">Transcript:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="letter_transcript">
            <a href="{{ asset('download/' . $submitted["unique_id"].'/transcript') }}"><?php echo pathinfo($file)['basename'] ?></a>
        </div>
    </div>
    <?php
    }
    }
    ?>
    <div class="form-group">
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">Budget:</label>
    </div>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>

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
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <label for="amount_acc" class="col-md-3 col-sm-3 col-xs-3 text-left">Accommodations:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_acc"  name="amount_acc" maxlength="10" value="<?php if ($submitted["amount_acc"]) {echo $submitted["amount_acc"];} else{echo "0";}; ?>" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <label for="amount_con" class="col-md-3 col-sm-3 col-xs-3 text-left">Conference Fees:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_con"  name="amount_con" maxlength="10" value="<?php if ($submitted["amount_con"]) {echo $submitted["amount_con"];} else{echo "0";}; ?>" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <label for="amount_miscellaneous" class="col-md-3 col-sm-3 col-xs-3 text-left">Membership Fees:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_mis"  name="amount_mis" maxlength="10" value="<?php if ($submitted["amount_mis"]) {echo $submitted["amount_mis"];} else{echo "0";}; ?>" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <label for="amount_conmeal" class="col-md-3 col-sm-3 col-xs-3 text-left">Conference Meals:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_conmeal"  name="amount_conmeal" maxlength="10" value="<?php if ($submitted["amount_conmeal"]) {echo $submitted["amount_conmeal"];} else{echo "0";}; ?>" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
        <label for="amount_total" class="col-md-3 col-sm-3 col-xs-3 text-left" style="color: #ff0000;font-weight: bold">Total:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_total"  maxlength="10" value="<?php $total = 0;if ($submitted["amount_travel"]) {$total += $submitted["amount_travel"];}if ($submitted["amount_acc"]) {$total += $submitted["amount_acc"];} if ($submitted["amount_con"]){$total += $submitted["amount_con"];} if ($submitted["amount_mis"]){$total += $submitted["amount_mis"];} if ($submitted["amount_conmeal"]) {$total += $submitted["amount_conmeal"];} echo $total; ?>" class="two-digits form-control" disabled>
        </div>
    </div>
    <br>


    <div class="form-group">
        <label for="amount_requested_div" class="col-md-4 col-sm-4 col-xs-4 text-left">Amount Requested:</label>
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

    <div class="form-group">
        <label for="other_funding" class="col-md-4 col-sm-4 col-xs-4 text-left">Other sources of funding:</label>
        <div id="other_funding">
            <label class="col-md-2 col-sm-2 col-xs-2"><input type="checkbox" name="personal" id="personal" value="personal" <?php if (in_array($submitted["other_funding"],array(1,4,5,7))) {echo 'checked';}?>> Personal</label>
            <label class="col-md-3 col-sm-3 col-xs-3"><input type="checkbox" name="scholarship" id="scholarship" value="scholarship" <?php if (in_array($submitted["other_funding"],array(2,4,6,7))) {echo 'checked';}?>> Scholarship/bursary</label>
            <label class="col-md-3 col-sm-3 col-xs-3"><input type="checkbox" name="loan" id="loan" value="loan" <?php if (in_array($submitted["other_funding"],array(3,5,6,7))) {echo 'checked';}?> > Loan</label>
        </div>
    </div>

    <div class="form-group">
        <label for="reqandrule" class="col-md-4 col-sm-4 col-xs-4 text-left">Requirements and Rules:</label>
        <div class="col-md-8 col-sm-8 col-xs-8" style="text-align: justify;text-justify: inter-word;">
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
        <label for="checkbox_agree" class="col-md-4 col-sm-4 col-xs-4 text-left">&nbsp;</label>
        <div class="col-md-1s col-sm-1 col-xs-1">
            <input type="checkbox" name="checkbox_agree" id="checkbox_agree" checked>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <span class="text-left" style="font-weight: bold;color: #ff0000">I have read and understand the rules.</span>
        </div>
    </div>


    <?php if ($submitted["status"] == 6){

    }
    ?>
    @if ($submitted["status"] == 1)
        <br>
        <br>
        <br>
        <br>
        <div class="form-group">
            <div class="buttons col-md-1 col-sm-1 col-xs-1">
                <button type="submit" class="btn btn-danger" id="decline" name="decline">Decline</button>
            </div>

            <div class="buttons col-md-1 col-sm-1 col-xs-1">
                <button type="submit" class="btn btn-success" id="approve" name="approve">Approve</button>
            </div>
            <div class="buttons col-md-1 col-sm-1 col-xs-1">
                <button type="submit" class="btn btn-default" id="revert" name="revert">Revert</button>
            </div>
        </div>

        <br>
        <br>
        @endif
    {!! Form::close() !!}
@stop

@section('javascript')
    <script src="{{ Helper::asset('js/travelfund.js') }}"></script>
    <script src="{{ Helper::asset('js/moment.js') }}"></script>
    <script src="{{ Helper::asset('js/daterangepicker.js') }}"></script>
@stop


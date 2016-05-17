@extends("layouts.main")
@section("content")
    <?php use App\Http\Controllers\Helper;
    use App\Http\Controllers\Auth\Login;?>

    {!! Form::open(array('url'=>'continuetravel','method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}

    <br>
    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="case_id"  name="case_id" value="<?php echo $submitted["id"];?>" >
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
                echo 'Cancelled by Student';
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
            <a href="{{ URL::to('/')}}/landing" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-arrow-left"></span>  Go Back</a>
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-md-4 col-sm-4 col-xs-4 text-left">Name:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="inputName"><?php echo $submitted["contact_name"];?></div>
    </div>

    <div class="form-group">
        <label for="inputStudent" class="col-md-4 col-sm-4 col-xs-4 text-left">Student Number:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="inputStudent"><?php echo $submitted["tcard"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail" class="col-md-4 col-sm-4 col-xs-4 text-left">Email:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="inputEmail"><?php echo $submitted["contact_email"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPhone" class="col-md-4 col-sm-4 col-xs-4 text-left">Phone:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="inputEmail"><?php echo $submitted["contact_phone"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="round" class="col-md-4 col-sm-4 col-xs-4 text-left">Round #:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="round">
            <?php
            if ($submitted["round"] == 1){
                echo 'Round 1';
            }
            else if ($submitted["round"] == 2){
                echo 'Round 2';
            }
            else{
                echo 'Round 3';
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="year" class="col-md-4 col-sm-4 col-xs-4 text-left">Year of Study:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="year">
            <?php
            if ($submitted["year"] == 1){
                echo 'Year 1';
            }
            else if ($submitted["year"] == 2){
                echo 'Year 2';
            }
            else if ($submitted["year"] == 3){
                echo 'Year 3';
            }
            else if ($submitted["year"] == 4){
                echo 'Year 4';
            }
            else{
                echo 'Year 5 +';
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="program" class="col-md-4 col-sm-4 col-xs-4 text-left">Program Area:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="program">
            <?php
            $program_array = [
                    "1" => "Anthropology",
                    "2" => "Arts, Culture & Media",
                    "3" => "Biological Sciences",
                    "4" => "Computer & Mathematical Sciences",
                    "5" => "Critical Development Studies",
                    "6" => "English",
                    "7" => "French & Linguistics",
                    "8" => "Historical & Cultural Studies",
                    "9" => "Human Geography",
                    "10" => "Management",
                    "11" => "Philosophy",
                    "12" => "Physical & Environmental Sciences",
                    "13" => "Political Science",
                    "14" => "Psychology",
                    "15" => "Sociology"
            ];
            echo $program_array[$submitted["program"]];
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="radioDestination" class="col-md-4 col-sm-4 col-xs-4 text-left">Travel Destination:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="radioDestination">
            <?php
            if ($submitted["destination"] == 0){
                echo 'Inside Canada';
            }
            else{
                echo 'Outside Canada';
            }
            ?>
        </div>
    </div>

    @if ($submitted["travel_country"])
        <div class="form-group">
            <label for="travel_country" class="col-md-4 col-sm-4 col-xs-4 text-left">Country of Travel:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="travel_country">
                <?php
                    echo $submitted["travel_country"];
                ?>
            </div>
        </div>

    @endif

    <div class="form-group">
        <label for="inputNameTravel" class="col-md-4 col-sm-4 col-xs-4 text-left">Name of conference/travel:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="inputNameTravel">
                <?php echo $submitted["name_conference"];?>
            </div>
    </div>

    <div class="form-group">
        <label for="start_time" class="col-md-4 col-sm-4 col-xs-4 text-left">Start Date:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="start_time">
            <?php echo $submitted["start_date"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="end_time" class="col-md-4 col-sm-4 col-xs-4 text-left">End Date:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="end_time">
            <?php echo $submitted["end_date"];?>
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
        <label for="amount_requested" class="col-md-4 col-sm-4 col-xs-4 text-left">Amount Requested:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="amount_requested">$ <?php echo $submitted["amount_requested"];?>
        </div>
    </div>


    <div class="form-group">
        <label for="other_funding" class="col-md-4 col-sm-4 col-xs-4 text-left">Other sources of funding:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="other_funding">
            <?php
            if ($submitted["other_funding"] == 1){
                echo "Personal";
            }
            else if ($submitted["other_funding"] == 2){
                echo "Scholarship";
            }
            else if ($submitted["other_funding"] == 3) {
                echo "Loan";
            }
            else if ($submitted["other_funding"] == 4) {
                echo "Personal, Scholarship";
            }
            else if ($submitted["other_funding"] == 5) {
                echo "Scholarship, Loan";
            }
            else if ($submitted["other_funding"] == 6) {
                echo "Personal, Loan";
            }
            else if ($submitted["other_funding"] == 7) {
                echo "Personal, Scholarship, Loan";
            }
            else {
                echo "N / A";
            }
            ?>
        </div>
    </div>
    @if ($submitted["status"] == 6)
        <div class="row">
            <label for="receipts" class="col-md-4 col-sm-4 col-xs-4 text-left">Receipts uploaded:</label>


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
            <label class="col-md-4 col-sm-4 col-xs-4">&nbsp;</label>
            <br>
            <?php }
            ?>
        </div>
        <br>
        <br>
    @endif
    <br>

    @if ($submitted["status"] == 2 || $submitted["status"] == 3)
        <hr>
        <br>
        <br>

        <div class="form-group">
            <label for="fundonline_decision" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Decision:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <?php
                if ($submitted["status"] == 2){
                    echo 'Approved';
                }
                else{
                    echo 'Declined';
                }
                ?>
            </div>
        </div>
        <br>

        <div class="form-group">
            <label for="student_comment" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Reason:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <?php echo $submitted["student_comment"] ?>
            </div>
        </div>

        <br>

        <div class="form-group">
            <label for="round" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Round#:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="round">
                <?php echo "Round ".$submitted["round"] ?>
            </div>
        </div>

        <br>

        @if ($submitted["status"] == 2)
            <div class="form-group">
                <label for="approved_amount" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Total Amount Approved:</label>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <?php echo '$ '.$submitted["approved_amount"] ?>
                </div>
            </div>
            <br>

            <div class="form-group">
                <label for="approved_amount" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Sub amounts and conditions:</label>
                <div class="col-md-5 col-sm-5 col-xs-5">
                </div>
            </div>
            <br>


            <div class="form-group" >
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <button type="button" id="cancel_application_travel" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-arrow-right"></span> Cancel application</button>
                </div>
            </div>


            <br>

            <div class="form-group" id="reimbursment-method" >
                <label for="reimbursment" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Method of Reimbursement:</label>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <select class="form-control" id="reimbursment" name="reimbursment">
                        <option value="1" id="deposit" name="deposit">I have worked at UofT in the past 6 months(direct deposit)</option>
                        <option value="2" id="cheque" name="cheque">I will be receiving cheque</option>
                    </select>
                </div>
            </div>

            <br>
            <div class="form-group" >
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <button type="submit" class="btn btn-lg btn-success" id="fund_travel_continue" name="fund_travel_continue"><span class="glyphicon glyphicon-arrow-right"></span> Continue to upload receipts</button>
                </div>
            </div>

            <br>
            <br>
        @endif

    @endif


{!! Form::close() !!}
@include("forms.warningModal")
@include("forms.cancelapplicationtravelModal")

@stop

@section('javascript')
    <script src="{{ Helper::asset('js/submittedonlinefund.js') }}"></script>
    <script src="{{ Helper::asset('js/moment.js') }}"></script>
    <script src="{{ Helper::asset('js/daterangepicker.js') }}"></script>
@stop


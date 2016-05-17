@extends("layouts.mainfundonline")
@section("content")
    <?php use App\Http\Controllers\Helper;?>
    <?php use App\Http\Controllers\Auth\Login;?>
    {!! Form::open(array('action'=>array('APIController@approveForm'),'method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}

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

    <div class="form-group" id="type-funding">
        <label for="dropDownTypeFunding" class="col-md-4 col-sm-4 col-xs-4 text-left">Type of Funding:</label>
        <div class="col-md-3 col-sm-3 col-xs-3">
            <?php
            if ($submitted["funding_type"] == 1){
                echo 'Enhancement';
            }
            else if ($submitted["funding_type"] == 2){
                echo 'Partnership';
            }
            else{
                echo 'DSA';
            }
            ?>
        </div>

        @if ($submitted["group"])
            <div class='col-md-1 col-sm-1 col-xs-1' id='group'>
                Group:
            </div>
        @endif


        <div class='col-md-2 col-sm-2 col-xs-2' id='fundGroupsDiv'>
            <?php
            if ($submitted["group"]){
                echo $submitted["group"];
            }
            ?>
        </div>


    </div>

    <div class="form-group">
        <label for="inputNameProposal" class="col-md-4 col-sm-4 col-xs-4 text-left">Name of group submitting proposal:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php
            if ($submitted["name_group_proposal"]){
                echo $submitted["name_group_proposal"];
                if ($submitted["group2"]){
                    echo ', '.$submitted["group2"];
                }
                if ($submitted["group3"]){
                    echo ', '.$submitted["group3"];
                }
                if ($submitted["group4"]){
                    echo ', '.$submitted["group4"];
                }
                if ($submitted["group5"]){
                    echo ', '.$submitted["group5"];
                }

            }
            else{
                echo 'N / A';
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="contactname" class="col-md-4 col-sm-4 col-xs-4 text-left">Contact Name:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="contactname">
            <?php echo $submitted["contact_name"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="contactemail" class="col-md-4 col-sm-4 col-xs-4 text-left">Contact Email:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="contactemail">
            <?php echo $submitted["contact_email"];?>
        </div>
    </div>


    <input style="display: none;" id="contactemailinput" name="contactemailinput" value="<?php echo $submitted["contact_email"];?>">

    <input style="display: none;" id="nameinput" name="nameinput" value="<?php echo $submitted["contact_name"];?>">

    <div class="form-group">
        <label for="contactphone" class="col-md-4 col-sm-4 col-xs-4 text-left">Contact Phone:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="contactphone">
            <?php echo $submitted["contact_phone"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="fundingworkshop" class="col-md-4 col-sm-4 col-xs-4 text-left">Funding workshop attended</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="fundingworkshop">
            <?php echo $submitted["funding_workshop"];?>
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
        <label for="nameEvent" class="col-md-4 col-sm-4 col-xs-4 text-left">Name of Event:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="nameEvent">
            <?php echo $submitted["event_name"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="location" class="col-md-4 col-sm-4 col-xs-4 text-left">Event Location:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="location">
            <?php
            if ($submitted["event_location"] == 1){
                echo 'On Campus';
            }
            else{
                echo 'Off Campus';
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="event_overview" class="col-md-4 col-sm-4 col-xs-4 text-left">Event Overview:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php echo $submitted["req_and_rule"]; ?>
        </div>
    </div>

    <div class="form-group">
        <label for="contribution" class="col-md-4 col-sm-4 col-xs-4 text-left">Event Contribution to Campus Life:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="contribution">
            <?php echo $submitted["contribution"];?>
        </div>
    </div>

    <div class="form-group">
        <label for="budget" class="col-md-4 col-sm-4 col-xs-4 text-left">Budget:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="budget">
            <?php
            $budget = "";
            if ($submitted["item_amount1"]){
                $budget = $budget."Services"."( $".$submitted["item_amount1"]." ) , ";
            }
            if ($submitted["item_amount2"]){
                $budget = $budget."Supplies"."( $".$submitted["item_amount2"]." ) , ";
            }
            if ($submitted["item_amount3"]){
                $budget = $budget."Pre-packaged snack foods"."( $".$submitted["item_amount3"]." ) , ";
            }
            if ($submitted["item_amount4"]){
                $budget = $budget."Catering/Meals"."( $".$submitted["item_amount4"]." ) , ";
            }
            if ($submitted["item_amount5"]){
                $budget = $budget."Gifts/Prizes"."( $".$submitted["item_amount5"]." ) , ";
            }
            if ($submitted["item_amount6"]){
                $budget = $budget."Printing/Photocopy"."( $".$submitted["item_amount4"]." ) , ";
            }
            if ($submitted["item_amount7"]){
                $budget = $budget."Miscellaneous"."( $".$submitted["item_amount5"]." ) , ";
            }
            $budget = substr($budget, 0, -3);
            echo $budget;
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="budget_total" class="col-md-4 col-sm-4 col-xs-4 text-left">Budget Total:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="budget_total">
            <?php
            $budget_total = 0;
            if ($submitted["item_amount1"]){
                $budget_total += $submitted["item_amount1"];
            }
            if ($submitted["item_amount2"]){
                $budget_total += $submitted["item_amount2"];
            }
            if ($submitted["item_amount3"]){
                $budget_total += $submitted["item_amount3"];
            }
            if ($submitted["item_amount4"]){
                $budget_total += $submitted["item_amount4"];
            }
            if ($submitted["item_amount5"]){
                $budget_total += $submitted["item_amount5"];
            }
            if ($submitted["item_amount6"]){
                $budget_total += $submitted["item_amount6"];
            }
            if ($submitted["item_amount7"]){
                $budget_total += $submitted["item_amount7"];
            }
            echo '$'.$budget_total;
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="revenue" class="col-md-4 col-sm-4 col-xs-4 text-left">Revenue:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="revenue">
            <?php
            $revenue = "";
            if ($submitted["revenue1"]){
                $revenue = $revenue.$submitted["revenue1"]."( $".$submitted["revenue_amount1"]." ) , ";
            }
            if ($submitted["revenue2"]){
                $revenue = $revenue.$submitted["revenue2"]."( $".$submitted["revenue_amount2"]." ) , ";
            }
            if ($submitted["revenue3"]){
                $revenue = $revenue.$submitted["revenue3"]."( $".$submitted["revenue_amount3"]." ) , ";
            }
            if ($submitted["revenue4"]){
                $revenue = $revenue.$submitted["revenue4"]."( $".$submitted["revenue_amount4"]." ) , ";
            }
            if ($submitted["revenue5"]){
                $revenue = $revenue.$submitted["revenue5"]."( $".$submitted["revenue_amount5"]." ) , ";
            }
            $revenue = substr($revenue, 0, -3);
            echo $revenue;
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="budget_total" class="col-md-4 col-sm-4 col-xs-4 text-left">Revenue Total:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="revenue_total">
            <?php
            $revenue_total = 0;
            if ($submitted["revenue1"]){
                $revenue_total += $submitted["revenue_amount1"];
            }
            if ($submitted["revenue2"]){
                $revenue_total += $submitted["revenue_amount2"];
            }
            if ($submitted["revenue3"]){
                $revenue_total += $submitted["revenue_amount3"];
            }
            if ($submitted["revenue4"]){
                $revenue_total += $submitted["revenue_amount4"];
            }
            if ($submitted["revenue5"]){
                $revenue_total += $submitted["revenue_amount5"];
            }
            echo $revenue_total;
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="amount_requested" class="col-md-4 col-sm-4 col-xs-4 text-left">Amount Requested:</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="amount_requested">
            <?php echo '$'.$submitted["amount_requested"] ?>
        </div>
    </div>

    <br>
    <br>
    <br>
    @if ($submitted["status"] == 1)
    <hr>
    <br>
    <br>


    <div class="form-group">
        <label for="internal_comment" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Comments Internal:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <textarea  id="internal_comment"  style="width: 400px"></textarea>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="student_comment" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Comments for Student:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <textarea  id="student_comment"  style="width: 400px"></textarea>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="dropDownRound" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Round #:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <select class="form-control" id="dropDownRound" name="dropDownRound">
                <option id="round1" name="round1" value="1">Round 1</option>
                <option id="round2" name="round2" value="2">Round 2</option>
                <option id="round3" name="round3" value="3">Round 3</option>
            </select>
        </div>
    </div>
    <br>

    <div class="form-group">
        <label for="approved_amount" class="col-md-3 col-sm-3 col-xs-3 text-left" style="font-weight: bold">Approved Amount:</label>
        <div class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-weight: bold">$</div>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input type="text" id="approved_amount"  maxlength="10" value="0.00" class="two-digits form-control">
        </div>
    </div>

    <br>
    <br>
    <br>

    <div class="form-group">
        {{--<div class="buttons col-md-1 col-sm-1 col-xs-1">--}}
            {{--<button type="button" class="btn btn-danger" id="cancel">Cancel</button>--}}
        {{--</div>--}}

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
    @elseif ($submitted["status"] == 2 || $submitted["status"] == 3 || $submitted["status"] == 6)
        <hr>
        <br>
    <div class="form-group">
        <label for="internal_comment" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Comments Internal:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php echo $submitted["internal_comment"] ?>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="student_comment" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Comments for Student:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php echo $submitted["student_comment"] ?>
        </div>
    </div>

    <br>

    @if ($submitted["status"] == 2 || $submitted["status"] == 6)
    <div class="form-group">
        <label for="approved_amount" class="col-md-3 col-sm-3 col-xs-3 text-left" style="font-weight: bold">Approved Amount:</label>
        <div class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-weight: bold">$</div>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php echo $submitted["approved_amount"] ?>
        </div>
    </div>
    <br>
    <br>
    @endif

        @if ($submitted["status"] == 6)
            <hr>
            <br>
            <?php if (file_exists ('OnlineFundReceipt'.$submitted["id"] )){?>
            <div class="row">
                <label for="receipts" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold">Receipts uploaded:</label>

                <?php
                $directory = 'OnlineFundReceipt'.$submitted["id"];
                $files = File::allFiles($directory);
                foreach ($files as $file)
                {?>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <a href="{{ asset('onlinereceipts/' . $submitted["id"].'/'.pathinfo($file)['filename']) }}"><?php echo pathinfo($file)['basename']; ?></a>
                </div>
            </div>
            <div class="row">
                <label class="col-md-4 col-sm-4 col-xs-4">&nbsp;</label>
                <?php }
                }
                ?>
            </div>
            <br>
            <br>
            <br>
        @endif
        @endif
    {!! Form::close() !!}
@stop

@section('javascript')
    <script src="{{ Helper::asset('js/submittedonlinefund.js') }}"></script>
@stop

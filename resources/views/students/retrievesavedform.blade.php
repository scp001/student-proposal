@extends("layouts.mainfundonline")
@section("content")
    <?php use App\Http\Controllers\Helper;
    use App\Http\Controllers\Auth\Login;?>
    @if ($submitted["status"] == 0)
    {!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}
    <br>
    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="case_id"  value="<?php echo $submitted["id"];?>" >
    </div>

    <div class="form-group" id="type-funding">
        <label for="dropDownTypeFunding" class="col-md-4 col-sm-4 col-xs-4 text-left">Type of Funding:</label>
        @if ($submitted["funding_type"] == 1)
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeFunding">
                    <option value="1" id="enhancement" name="enhancement">Enhancement</option>
                    <option value="2" id="partnership" name="partnership">Partnership</option>
                    <option value="3" id="dsa" name="dsa">DSA</option>
                </select>
            </div>
        @elseif ($submitted["funding_type"] == 2)
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeFunding">
                    <option value="1" id="enhancement" name="enhancement">Enhancement</option>
                    <option value="2" id="partnership" name="partnership" selected>Partnership</option>
                    <option value="3" id="dsa" name="dsa">DSA</option>
                </select>
            </div>
            <div class='col-md-3 col-sm-3 col-xs-3' id='fundGroupsDiv'>
                <select class='form-control' id='fundGroups'>
                    @if ($submitted["group"] == 1)
                        <option value='1' id='group1' name='group1' >Group1</option>
                        <option value='2' id='group2' name='group2'>Group2</option>
                        <option value='3' id='group3' name='group3'>Group3</option>
                    @elseif($submitted["group"] == 2)
                        <option value='1' id='group1' name='group1' >Group1</option>
                        <option value='2' id='group2' name='group2' selected>Group2</option>
                        <option value='3' id='group3' name='group3'>Group3</option>
                    @else
                        <option value='1' id='group1' name='group1' >Group1</option>
                        <option value='2' id='group2' name='group2'>Group2</option>
                        <option value='3' id='group3' name='group3' selected>Group3</option>
                    @endif
                </select>
            </div>
        @else
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownTypeFunding">
                    <option value="1" id="enhancement" name="enhancement">Enhancement</option>
                    <option value="2" id="partnership" name="partnership">Partnership</option>
                    <option value="3" id="dsa" name="dsa" selected>DSA</option>
                </select>
            </div>
        @endif
        </div>

        <div class="form-group">
            <label for="inputNameProposal" class="col-md-4 col-sm-4 col-xs-4 text-left">Name of group submitting proposal:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                @if ($submitted["name_group_proposal"])
                    <input type="text" class="form-control" maxlength="45" id="inputNameProposal" placeholder="Name of group submitting proposal" name="option[]" value=<?php echo $submitted["name_group_proposal"] ?> >
                @else
                    <input type="text" class="form-control" maxlength="45" id="inputNameProposal" placeholder="Name of group submitting proposal" name="option[]">
                @endif
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

        @if ($submitted["group2"])
            <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-4 text-left">&nbsp;</label>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <input id="add_1" class="form-control" name="option[]" placeholder="Name of group submitting proposal" type="text" value=<?php echo $submitted["group2"] ?> >
                </div>
                <div class="col-xs-1">
                    <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                </div>
            </div>
        @endif

    @if ($submitted["group3"])
        <div class="form-group">
            <label class="col-md-4 col-sm-4 col-xs-4 text-left">&nbsp;</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="add_2" class="form-control" name="option[]" placeholder="Name of group submitting proposal" type="text" value=<?php echo $submitted["group3"] ?> >
            </div>
            <div class="col-xs-1">
                <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
            </div>
        </div>
    @endif

    @if ($submitted["group4"])
        <div class="form-group">
            <label class="col-md-4 col-sm-4 col-xs-4 text-left">&nbsp;</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="add_3" class="form-control" name="option[]" placeholder="Name of group submitting proposal" type="text" value=<?php echo $submitted["group4"] ?> >
            </div>
            <div class="col-xs-1">
                <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
            </div>
        </div>
    @endif

    @if ($submitted["group5"])
        <div class="form-group">
            <label class="col-md-4 col-sm-4 col-xs-4 text-left">&nbsp;</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input id="add_4" class="form-control" name="option[]" placeholder="Name of group submitting proposal" type="text" value=<?php echo $submitted["group5"] ?> >
            </div>
            <div class="col-xs-1">
                <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
            </div>
        </div>
    @endif


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
                @if ($submitted["contact_phone"])
                    <input type="tel" class="form-control" id="inputCPhone" placeholder="Contact Phone" value="<?php echo $submitted["contact_phone"] ?>">
                    <span id="spnPhoneStatus"></span>
                @else
                    <input type="tel" class="form-control" id="inputCPhone" placeholder="Contact Phone">
                    <span id="spnPhoneStatus"></span>
                @endif
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
                <span class="danger text-left">*</span>
            </div>
        </div>

        <div class="form-group">
            <label for="workshop_date" class="col-md-4 col-sm-4 col-xs-4 text-left">Did you attend a funding workshop?</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                {{--@if ($submitted["funding_workshop"] == 1)--}}
                    {{--<select class="form-control" id="dropDownTypeFunding">--}}
                        {{--<option value="1" id="date1" name="date1">Funding Workshop Date 1</option>--}}
                        {{--<option value="2" id="date2" name="date2">Funding Workshop Date 2</option>--}}
                        {{--<option value="3" id="date3" name="date3">Funding Workshop Date 3</option>--}}
                    {{--</select>--}}
                {{--@elseif($submitted["funding_workshop"] == 2)--}}
                    {{--<select class="form-control" id="dropDownTypeFunding">--}}
                        {{--<option value="1" id="date1" name="date1">Funding Workshop Date 1</option>--}}
                        {{--<option value="2" id="date2" name="date2" selected>Funding Workshop Date 2</option>--}}
                        {{--<option value="3" id="date3" name="date3">Funding Workshop Date 3</option>--}}
                    {{--</select>--}}
                {{--@else--}}
                    {{--<select class="form-control" id="dropDownTypeFunding">--}}
                        {{--<option value="1" id="date1" name="date1">Funding Workshop Date 1</option>--}}
                        {{--<option value="2" id="date2" name="date2">Funding Workshop Date 2</option>--}}
                        {{--<option value="3" id="date3" name="date3" selected>Funding Workshop Date 3</option>--}}
                    {{--</select>--}}
                {{--@endif--}}
                @if ($submitted["funding_workshop"])
                    <input id="workshop_date" class="form-control" placeholder="Workshop Date" name="workshop_date" value=<?php echo $submitted["funding_workshop"]?> type="text">
                @else
                    <input id="workshop_date" class="form-control" placeholder="Workshop Date" name="workshop_date" value=<?php echo date("m/d/Y")?> type="text">
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="dropDownRound" class="col-md-4 col-sm-4 col-xs-4 text-left">Round #:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
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
            <label for="nameEvent" class="col-md-4 col-sm-4 col-xs-4 text-left">Name of Event:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                @if ($submitted["event_name"])
                    <input type="text" class="form-control" maxlength="45" id="nameEvent" placeholder="Name of Event" value="<?php echo $submitted["event_name"] ?>">
                @else
                    <input type="text" class="form-control" maxlength="45" id="nameEvent" placeholder="Name of Event">
                @endif
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
                <span class="danger text-left">*</span>
            </div>
        </div>

    <div class="form-group">
        <label for="event_overview" class="col-md-4 col-sm-4 col-xs-4 text-left">Please write an overview of your event (including the purpose, date, time, location, expected participation numbers, target audience and the marketing plan)</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            @if ($submitted["req_and_rule"])
                <textarea  id="event_overview"  style="width: 400px; height:100px "><?php echo $submitted["req_and_rule"] ?></textarea>
            @else
                <textarea  id="event_overview"  style="width: 400px; height:100px "></textarea>
            @endif
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
            <span class="danger text-left">*</span>
        </div>
    </div>

        <div class="form-group">
            <label for="location" class="col-md-4 col-sm-4 col-xs-4 text-left">Event Location:</label>
            <div class="col-sm-8" id="radioLocation">
                @if ($submitted["event_location"] == 1)
                    <label class="radio-inline"> <input type="radio" name="location" id="location" value="1" checked> On Campus</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <label class="radio-inline"> <input type="radio" name="location" id="location" value="2"> Off Campus</label>
                @elseif ($submitted["event_location"] == 2)
                    <label class="radio-inline"> <input type="radio" name="location" id="location" value="1"> On Campus</label>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <label class="radio-inline"> <input type="radio" name="location" id="location" value="2" checked> Off Campus</label>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="contribution" class="col-md-4 col-sm-4 col-xs-4 text-left">How event will contribute to campus life?</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                @if ($submitted["contribution"])
                    <textarea  id="contribution"  style="width: 400px"><?php echo $submitted["contribution"] ?></textarea>
                @else
                    <textarea  id="contribution"  style="width: 400px"></textarea>
                @endif
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
                @if ($submitted["item_amount1"])
                    <input type="text" id="item_amount1"  maxlength="10" value="<?php echo $submitted["item_amount1"] ?>" class="form-control two-digits" >
                @else
                    <input type="text" id="item_amount1"  maxlength="10" value="0.00" class="form-control two-digits" >
                @endif
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
                @if ($submitted["item_amount2"])
                    <input type="text" id="item_amount2"  maxlength="10" value="<?php echo $submitted["item_amount2"] ?>" class="form-control two-digits" >
                @else
                    <input type="text" id="item_amount2"  maxlength="10" value="0.00" class="form-control two-digits" >
                @endif
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
                @if ($submitted["item_amount3"])
                    <input type="text" id="item_amount3"  maxlength="10" value="<?php echo $submitted["item_amount3"] ?>" class="form-control two-digits" >
                @else
                    <input type="text" id="item_amount3"  maxlength="10" value="0.00" class="form-control two-digits" >
                @endif
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
                @if ($submitted["item_amount4"])
                    <input type="text" id="item_amount4"  maxlength="10" value="<?php echo $submitted["item_amount4"] ?>" class="form-control two-digits" >
                @else
                    <input type="text" id="item_amount4"  maxlength="10" value="0.00" class="form-control two-digits" >
                @endif
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
                @if ($submitted["item_amount5"])
                    <input type="text" id="item_amount5"  maxlength="10" value="<?php echo $submitted["item_amount5"] ?>" class="form-control two-digits" >
                @else
                    <input type="text" id="item_amount5"  maxlength="10" value="0.00" class="form-control two-digits" >
                @endif
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
            @if ($submitted["item_amount6"])
                <input type="text" id="item_amount6"  maxlength="10" value="<?php echo $submitted["item_amount6"] ?>" class="form-control two-digits" >
            @else
                <input type="text" id="item_amount6"  maxlength="10" value="0.00" class="form-control two-digits" >
            @endif
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
            @if ($submitted["item_amount7"])
                <input type="text" id="item_amount7"  maxlength="10" value="<?php echo $submitted["item_amount7"] ?>" class="form-control two-digits" >
            @else
                <input type="text" id="item_amount7"  maxlength="10" value="0.00" class="form-control two-digits" >
            @endif
        </div>
    </div>
    <br>

        <div class='form-group'>
            <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
            <?php
                $total = 0.00;
                if ($submitted["item_amount1"]){
                    $total += $submitted["item_amount1"];
                }
                if($submitted["item_amount2"]){
                    $total += $submitted["item_amount2"];
                }
                if($submitted["item_amount3"]){
                    $total += $submitted["item_amount3"];
                }
                if($submitted["item_amount4"]){
                    $total += $submitted["item_amount4"];
                }
                if($submitted["item_amount5"]){
                    $total += $submitted["item_amount5"];
                }
            if($submitted["item_amount6"]){
                $total += $submitted["item_amount6"];
            }
            if($submitted["item_amount5"]){
                $total += $submitted["item_amount7"];
            }

            ?>
            <label for="amount_total" class="col-md-3 col-sm-3 col-xs-3 text-left" style="color: #ff0000;font-weight: bold">Total:</label>
            <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <input type="text" id="amount_total"  maxlength="10" value="<?php echo $total ?>" class="two-digits form-control" disabled>
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
                @if ($submitted["revenue1"])
                    <input type="text" id="revenue1"  maxlength="20" placeholder="Revenue1" value="<?php echo $submitted["revenue1"] ?>">
                @else
                    <input type="text" id="revenue1"  maxlength="20" placeholder="Revenue1">
                @endif
            </div>
            <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
            <div class="col-md-2 col-sm-2 col-xs-2">
                @if ($submitted["revenue_amount1"])
                    <input type="text" id="revenue_amount1"  maxlength="10" value="<?php echo $submitted["revenue_amount1"] ?>" class="form-control two-digits" >
                @else
                    <input type="text" id="revenue_amount1"  maxlength="10" value="0.00" class="form-control two-digits" >
                @endif
            </div>
            </div>
            <br>

            <div class='form-group'>
                <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        @if ($submitted["revenue2"])
                            <input type="text" id="revenue2"  maxlength="20" placeholder="Revenue2" value="<?php echo $submitted["revenue2"] ?>">
                        @else
                            <input type="text" id="revenue2"  maxlength="20" placeholder="Revenue2">
                        @endif
                    </div>
                    <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        @if ($submitted["revenue_amount2"])
                            <input type="text" id="revenue_amount2"  maxlength="10" value="<?php echo $submitted["revenue_amount2"] ?>" class="form-control two-digits" >
                        @else
                            <input type="text" id="revenue_amount2"  maxlength="10" value="0.00" class="form-control two-digits" >
                        @endif
                    </div>
                </div>
            <br>

            <div class='form-group'>
            <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                @if ($submitted["revenue3"])
                    <input type="text" id="revenue3"  maxlength="20" placeholder="Revenue3" value="<?php echo $submitted["revenue3"] ?>">
                @else
                    <input type="text" id="revenue3"  maxlength="20" placeholder="Revenue3">
                @endif
            </div>
            <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
            <div class="col-md-2 col-sm-2 col-xs-2">
                @if ($submitted["revenue_amount3"])
                    <input type="text" id="revenue_amount3"  maxlength="10" value="<?php echo $submitted["revenue_amount3"] ?>" class="form-control two-digits" >
                @else
                    <input type="text" id="revenue_amount3"  maxlength="10" value="0.00" class="form-control two-digits" >
                @endif
            </div>
            </div>
            <br>

            <div class='form-group'>
            <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                @if ($submitted["revenue4"])
                    <input type="text" id="revenue4"  maxlength="20" placeholder="Revenue4" value="<?php echo $submitted["revenue4"] ?>">
                @else
                    <input type="text" id="revenue4"  maxlength="20" placeholder="Revenue4">
                @endif
            </div>
            <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
            <div class="col-md-2 col-sm-2 col-xs-2">
                @if ($submitted["revenue_amount4"])
                    <input type="text" id="revenue_amount4"  maxlength="10" value="<?php echo $submitted["revenue_amount4"] ?>" class="form-control two-digits" >
                @else
                    <input type="text" id="revenue_amount4"  maxlength="10" value="0.00" class="form-control two-digits" >
                @endif
            </div>
            </div>
            <br>

            <div class='form-group'>
                <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    @if ($submitted["revenue5"])
                        <input type="text" id="revenue5"  maxlength="20" placeholder="Revenue5" value="<?php echo $submitted["revenue5"] ?>">
                    @else
                        <input type="text" id="revenue5"  maxlength="20" placeholder="Revenue5">
                    @endif
                </div>
                <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
                <div class="col-md-2 col-sm-2 col-xs-2">
                @if ($submitted["revenue_amount5"])
                    <input type="text" id="revenue_amount5"  maxlength="10" value="<?php echo $submitted["revenue_amount5"] ?>" class="form-control two-digits" >
                @else
                    <input type="text" id="revenue_amount5"  maxlength="10" value="0.00" class="form-control two-digits" >
                @endif
                </div>
            </div>
            <br>

            <div class='form-group'>
            <div class="col-md-4 col-sm-4 col-xs-4"><span>&nbsp;</span></div>
            <label for="revenue_total" class="col-md-3 col-sm-3 col-xs-3 text-left" style="color: #ff0000;font-weight: bold">Total:</label>
            <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <?php
                $total_revenue = 0.00;
                if ($submitted["revenue_amount1"]){
                    $total_revenue += $submitted["revenue_amount1"];
                }
                if($submitted["revenue_amount2"]){
                    $total_revenue += $submitted["revenue_amount2"];
                }
                if($submitted["revenue_amount3"]){
                    $total_revenue += $submitted["revenue_amount3"];
                }
                if($submitted["revenue_amount4"]){
                    $total_revenue += $submitted["revenue_amount4"];
                }
                if($submitted["revenue_amount4"]){
                    $total_revenue += $submitted["revenue_amount5"];
                }
                ?>
            <input type="text" id="revenue_total"  maxlength="10" value="<?php echo $total_revenue ?>" class="two-digits form-control" disabled>
            </div>
            </div>
            <br>

    <div class="form-group">
        <label for="amount_requested" class="col-md-3 col-sm-3 col-xs-3 text-left">Amount Requested:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-5 col-sm-5 col-xs-5" id="amount_requested_div">
            @if ($submitted["amount_requested"])
                <input type="text" id="amount_requested"  name="amount_requested" maxlength="10" value="<?php echo $submitted["amount_requested"] ?>" class="form-control two-digits" >
            @else
                <input type="text" id="amount_requested"  name="amount_requested" maxlength="10" value="0.00" class="form-control two-digits">
            @endif
        </div>
    </div>
    <br>

    <div class="col-md-5 col-sm-5 col-xs-5"  style="display: none">
        <input id="user_id"  value="<?php echo Login::getUser()->peopleID;?>" >
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
        <label for="checkbox_agree" class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>
        <div class="col-md-1s col-sm-1 col-xs-1">
            <input type="checkbox" name="checkbox_agree" id="checkbox_agree">
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <span class="text-left" style="font-weight: bold;color: #ff0000">I have read and understand the rules.</span>
        </div>
    </div>

            <br>
            <br>
            <br>

            <div class="form-group">
                <div class="buttons col-md-2 col-sm-2 col-xs-2">
                <button type="button" class="btn btn-danger" id="cancel" style="float: left;">Reset</button>
                <button type="button" class="btn btn-default" id="saveSaved">Save</button></div>
                <button type="button" class="btn btn-success" id="submitSaved">Submit</button>
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

        <div class="form-group">
            <label for="receipts" class="col-md-3 col-sm-3 col-xs-3 text-left">Receipts uploaded:</label>

        <?php
        $directory = 'OnlineFundReceipt'.$submitted["id"];
        $files = File::allFiles($directory);
        foreach ($files as $file)
        {?>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <a href="{{ asset('onlinereceipts/' . $submitted["id"].'/'.pathinfo($file)['filename']) }}"><?php echo pathinfo($file)['basename']; ?></a>
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
                <button type="submit" class="btn btn-default" id="save_receipt_travel" name="save_receipt_online">Save</button></div>
            <button type="submit" class="btn btn-success" id="upload_receipt_travel" name="upload_receipt_online">Submit</button>

        </div>
        <br>

        {!! Form::close() !!}

        @endif
        @include("forms.warningModal")
        @stop

        @section('javascript')
        <script src="{{ Helper::asset('js/uploadreceipt.js') }}"></script>
        <script src="{{ Helper::asset('js/onlinefund.js') }}"></script>
        <script src="{{ Helper::asset('js/moment.js') }}"></script>
        <script src="{{ Helper::asset('js/daterangepicker.js') }}"></script>
        @stop

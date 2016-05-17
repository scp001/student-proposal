@extends("layouts.mainlanding")
@section("content")
    <?php use App\Http\Controllers\Helper;?>
    <h2>Edit Round Time Range</h2>
    <br>
    <br>
    <br>
    {!! Form::open(array('action'=>array('APIController@editRound'),'method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}
    <div class="form-group">
        <label for="round1_range" class="col-md-3 col-sm-3 col-xs-3 text-left">Round 1 Range:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="input-daterange input-group" id="dateRange" name="dateRange" data-id="3" data-holder="graphTAProgressHolder">
                @if ($rounds["round1_start"])
                    <input id="round1RangeStartDate" class="form-control" placeholder="Start Date" name="round1RangeStartDate" value=<?php echo $rounds["round1_start"]?> type="text">
                @else
                    <input id="round1RangeStartDate" class="form-control" placeholder="Start Date" name="round1RangeStartDate" value=<?php echo date("m/d/Y")?> type="text">
                @endif
                    <span class="input-group-addon">to</span>
                    @if ($rounds["round1_end"])
                        <input id="round1RangeEndDate" class="form-control" placeholder="End Date" name="round1RangeEndDate" value=<?php echo $rounds["round1_end"]?> type="text">
                    @else
                        <input id="round1RangeEndDate" class="form-control" placeholder="End Date" name="round1RangeEndDate" value=<?php echo date("m/d/Y")?> type="text">
                    @endif
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <a style="float: right" href="{{ URL::to('/')}}/landing" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-arrow-left"></span>  Go Back</a>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="round2_range" class="col-md-3 col-sm-3 col-xs-3 text-left">Round 2 Range:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="input-daterange input-group" id="dateRange" name="dateRange" data-id="3" data-holder="graphTAProgressHolder">
                @if ($rounds["round2_start"])
                    <input id="round2RangeStartDate" class="form-control" placeholder="Start Date" name="round2RangeStartDate" value=<?php echo $rounds["round2_start"]?> type="text">
                @else
                    <input id="round2RangeStartDate" class="form-control" placeholder="Start Date" name="round2RangeStartDate" value=<?php echo date("m/d/Y")?> type="text">
                @endif
                    <span class="input-group-addon">to</span>
                    @if ($rounds["round2_end"])
                        <input id="round2RangeEndDate" class="form-control" placeholder="End Date" name="round2RangeEndDate" value=<?php echo $rounds["round2_end"]?> type="text">
                    @else
                        <input id="round2RangeEndDate" class="form-control" placeholder="End Date" name="round2RangeEndDate" value=<?php echo date("m/d/Y")?> type="text">
                    @endif
            </div>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="round3_range" class="col-md-3 col-sm-3 col-xs-3 text-left">Round 3 Range:</label>
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="input-daterange input-group" id="dateRange" name="dateRange" data-id="3" data-holder="graphTAProgressHolder">
                @if ($rounds["round3_start"])
                    <input id="round3RangeStartDate" class="form-control" placeholder="Start Date" name="round3RangeStartDate" value=<?php echo $rounds["round3_start"]?> type="text">
                @else
                    <input id="round3RangeStartDate" class="form-control" placeholder="Start Date" name="round3RangeStartDate" value=<?php echo date("m/d/Y")?> type="text">
                @endif
                    <span class="input-group-addon">to</span>
                    @if ($rounds["round3_end"])
                        <input id="round3RangeEndDate" class="form-control" placeholder="End Date" name="round3RangeEndDate" value=<?php echo $rounds["round3_end"]?> type="text">
                    @else
                        <input id="round3RangeEndDate" class="form-control" placeholder="End Date" name="round3RangeEndDate" value=<?php echo date("m/d/Y")?> type="text">
                    @endif
            </div>
        </div>
    </div>
    <br>

    <div class="form-group">
        <div class="buttons col-md-2 col-sm-2 col-xs-2">
            <button type="submit" class="btn btn-success" id="submit" style="float: left;">Submit</button></div>
    </div>
    <br>
    {!! Form::close() !!}
@stop

@section('javascript')
    <script src="{{ Helper::asset('js/edit-round.js') }}"></script>
    <script src="{{ Helper::asset('js/moment.js') }}"></script>
    <script src="{{ Helper::asset('js/daterangepicker.js') }}"></script>
@stop

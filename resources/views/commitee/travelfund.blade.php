@extends("layouts.main")
@section("content")
    <?php use App\Http\Controllers\Helper;
          use App\Http\Controllers\Auth\Login;?>
    {{--{!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true, 'id'=>'upload', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}--}}
    {{--{!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true, 'id'=>'upload', 'urlenctype'=>'multipart/form-data')) !!}--}}
    {!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}


    {{--<form class="form-horizontal travelfund">--}}
        <div class="form-group">
            <label for="inputName" class="col-md-3 col-sm-3 col-xs-3 text-left">Name:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                {{--<input type="text" class="form-control" id="inputName" placeholder="Name">--}}
                <?php $name = Login::getUser()->givennames . " " . Login::getUser()->familyname;
                echo $name;
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputStudent" class="col-md-3 col-sm-3 col-xs-3 text-left">Student Number:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                {{--<input type="text" class="form-control" id="inputStudent" placeholder="Student Number">--}}
                <?php $studentID = Login::getUser()->studentID;
                echo $studentID;
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-md-3 col-sm-3 col-xs-3 text-left">Email:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                {{--<input type="email" class="form-control" id="inputEmail" placeholder="Email">--}}
                <?php $email = Login::getUser()->email;
                echo $email;
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPhone" class="col-md-3 col-sm-3 col-xs-3 text-left">Phone:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input type="email" class="form-control" id="inputPhone" placeholder="Phone">
            </div>
        </div>
        <div class="form-group">
            <label for="dropDownRound" class="col-md-3 col-sm-3 col-xs-3 text-left">Round #:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <select class="form-control" id="dropDownRound">
                    <option>Round 1</option>
                    <option>Round 2</option>
                    <option>Round 3</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="dropDownYear" class="col-md-3 col-sm-3 col-xs-3 text-left">Year of Study:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="dropDownRoundYear">
                <select class="form-control">
                    <option>Year 1</option>
                    <option>Year 2</option>
                    <option>Year 3</option>
                    <option>Year 4</option>
                    <option>Year 5 +</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="dropDownProgram" class="col-md-3 col-sm-3 col-xs-3 text-left">Program Area:</label>
            <div class="col-md-5 col-sm-5 col-xs-5" id="dropDownProgram">
                <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
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
                <label class="radio-inline"> <input type="radio" name="destination" id="inside" value="inside" checked> Inside Canada</label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <label class="radio-inline"> <input type="radio" name="destination" id="outside" value="outside"> Outside Canada</label>
            </div>
        </div>

        <div id="dynamic">

        </div>
        <br>

        <div class="form-group">
            <label for="inputNameTravel" class="col-md-3 col-sm-3 col-xs-3 text-left">Name of conference/travel:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <input type="text" class="form-control" id="inputNameTravel" placeholder="Name of conference/travel">
            </div>
        </div>
        <br>

        <div class="form-group">
            <label for="dateTravel" class="col-md-3 col-sm-3 col-xs-3 text-left">Dates of academic travel:</label>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <div class="input-daterange input-group" id="dateRange" name="dateRange" data-id="3" data-holder="graphTAProgressHolder">
                    <input id="dateRangeStartDate" class="form-control" placeholder="Start Date" name="start_date" value="01/01/2015" type="text">
                    <span class="input-group-addon">to</span>
                    <input id="dateRangeEndDate" class="form-control" placeholder="End Date" name="end_date" value="01/01/2015" type="text">
                </div>
            </div>
        </div>

    <br>
    <div class='row'>
        <label for="uploadintent" class="col-md-3 col-sm-3 col-xs-3 text-left">Letter of intent:</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
        <input id="uploadintent" size="35" type="file" name="intent_letter" class="checktype">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span id="letter_intent" style="color:#C0C0C0 "></span>
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



    <div class='row'>
        <label for="uploadrec" class="col-md-3 col-sm-3 col-xs-3 text-left">Professor recommendation:</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input id="uploadrec" size="35" type="file" name="professor_recommendation" class="checktype">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span id="letter_recommendation" style="color:#C0C0C0 "></span>
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

    <div class='row'>
        <label for="uploadtrans" class="col-md-3 col-sm-3 col-xs-3 text-left">Transcript:</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input id="uploadtrans" size="35" type="file" name="transcript" class="checktype">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span id="letter_transcript" style="color:#C0C0C0 "></span>
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

    <div class='row'>
        <label for="uploadcon" class="col-md-3 col-sm-3 col-xs-3 text-left">Conference material:</label>
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        <div class="col-md-5 col-sm-5 col-xs-5">
            <input id="uploadcon" size="35"  type="file" name="conference_material" class="checktype">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span id="letter_conference" style="color:#C0C0C0 "></span>
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

    <div class="form-group">
        <label class="col-md-3 col-sm-3 col-xs-3 text-left">Budget:</label>
    </div>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>

        <label for="amount_travel" class="col-md-3 col-sm-3 col-xs-3 text-left">Travel
            (air/rail/bus/car rental):</label>
        {{--<div class="col-md-5 col-sm-5 col-xs-5">Travel (air/train/bus):--}}
        {{--</div>--}}
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
        <input type="text" id="amount_travel"  maxlength="10" value="0" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_acc" class="col-md-3 col-sm-3 col-xs-3 text-left">Accommodations:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_acc"  maxlength="10" value="0" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_con" class="col-md-3 col-sm-3 col-xs-3 text-left">Conference fees:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_con"  maxlength="10" value="0" class="two-digits form-control" >
        </div>
    </div>
    <br>

    <div class='form-group'>
        <div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>
        <label for="amount_miscellaneous" class="col-md-3 col-sm-3 col-xs-3 text-left">Miscellaneous:</label>
        <label class="col-md-1 col-sm-1 col-xs-1 text-right" style="font-size: 20px">$</label>
        <div class="col-md-2 col-sm-2 col-xs-2">
            <input type="text" id="amount_mis"  maxlength="10" value="0" class="two-digits form-control" >
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
        <label for="reflection" class="col-md-3 col-sm-3 col-xs-3 text-left">Reflection:</label>
        <div class="col-md-8 col-sm-8 col-xs-8">
            <textarea  id="reflection"  style="width: 400px"></textarea>
        </div>

    </div>

    <br>

    {{--<div class='row'>--}}
        {{--<div class="col-md-3 col-sm-3 col-xs-3"><span>&nbsp;</span></div>--}}
        {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
        {{--{!! Form::file('images[]', array('multiple'=>true)) !!}--}}
        {{--</div>--}}
        {{--<div class="col-md-3 col-sm-3 col-xs-3">--}}
            {{--{!! Form::submit('Upload', array('class'=>'send-btn')) !!}--}}
        {{--</div>--}}

    {{--</div>--}}

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="form-group">
    <div class="buttons col-md-2 col-sm-2 col-xs-2">
        <button type="button" class="btn btn-danger" id="cancel" style="float: left;">Cancel</button>
        <button type="button" class="btn btn-default" id="save">Save</button></div>
        <button type="button" class="btn btn-success" id="submit">Submit</button>

    </div>

    {{--<div class='row' style="visibility: hidden;" id="attachment">--}}
        {{--<label class="col-md-3 col-sm-3 col-xs-3 text-left">&nbsp;</label>--}}
        {{--<div class="col-md-5 col-sm-5 col-xs-5">--}}
        {{--<ul>--}}
        {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
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

    <script src="{{ Helper::asset('js/jquery.ui.widget.js') }}"></script>

    <script src="{{ Helper::asset('js/jquery.iframe-transport.js') }}"></script>

    <script src="{{ Helper::asset('js/jquery.fileupload.js') }}"></script>

    <script src="{{ Helper::asset('js/script.js') }}"></script>



@stop

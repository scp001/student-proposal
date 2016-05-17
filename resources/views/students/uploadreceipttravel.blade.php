@extends("layouts.main")
@section("content")
    <?php use App\Http\Controllers\Helper;
    use App\Http\Controllers\Auth\Login;?>
    <?php
    session_start();
    $_SESSION["name_cheque"] = "";
    if (isset($_POST['reimbursment'])){
        $_SESSION["reimbursment"]=$_POST['reimbursment'];
    }
    if (isset($_POST['case_id'])){
        $_SESSION["case_id"]=$_POST['case_id'];
    }
    if (isset($_POST['name_cheque'])){
        $_SESSION["name_cheque"]=$_POST['name_cheque'];
    }
    ?>
    {!! Form::open(array('action'=>array('APIController@uploadReceipt'),'method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}

    <div class="form-group">
        <label class="col-md-5 col-sm-5 col-xs-5 text-left" style="font-weight: bold">Upload Receipt:</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <a href="{{URL::previous()}}" class="btn btn-lg btn-success" style="float: right"><span class="glyphicon glyphicon-arrow-left"></span>  Go Back</a>
        </div>
    </div>

    <div class="form-group" style="display: none;" >
        <input id="reimbursment" name="reimbursment" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold" value="<?php echo $_SESSION["reimbursment"];?>">
    </div>

    <div class="form-group" style="display: none;" >
        <input id="case_id" name="case_id" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold" value="<?php echo $_SESSION["case_id"];?>">
    </div>

    <div class="form-group" style="display: none;" >
        <input id="name_cheque" name="name_cheque" class="col-md-4 col-sm-4 col-xs-4 text-left" style="font-weight: bold" value="<?php echo $_SESSION["name_cheque"];?>">
    </div>
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
    <br>

    <div class="form-group">
        <div class="buttons col-md-2 col-sm-2 col-xs-2">
            <button type="button" class="btn btn-danger" id="cancel" style="float: left;">Cancel</button>
            <button type="submit" class="btn btn-default" id="save_receipt_travel" name="save_receipt_travel">Save</button></div>
        <button type="submit" class="btn btn-success" id="upload_receipt_travel" name="upload_receipt_travel">Submit</button>

    </div>
    <br>

    {!! Form::close() !!}

    @include("forms.warningModal")
@stop

@section('javascript')
    <script src="{{ Helper::asset('js/uploadreceipt.js') }}"></script>
@stop

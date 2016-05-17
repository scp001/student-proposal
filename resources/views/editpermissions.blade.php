@extends("layouts.mainlanding")
@section("content")
    <?php use App\Http\Controllers\Helper;
    use App\Http\Controllers\Auth\Login;?>


    <div class='row'>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <h2>Add User Permission</h2>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <a style="float: right" href="{{ URL::to('/')}}/landing" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-arrow-left"></span>  Go Back</a>
        </div>
    </div>
    <br>
    {!! Form::open(array('action'=>array('APIController@addUser'),'method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}
    <table class="add-user-table table table-bordered table-condensed">
        <tbody><tr><th colspan="2">User</th><th colspan="2">Permission</th></tr>
        <tr>
            <td><input class="full-fit" autocomplete="off" name="user-field" value="" type="text" id="user-field"></td>
            <td><select class="full-fit" name="user-type" id="user-type"><option value="utor" selected="selected">UTORid</option><option value="utsc">UTSCid</option></select></td>
            <td><select class="full-fit" name="user-role"><option value="regular" selected="selected">GateKeeper User</option><option value="admin">Committee User</option><option value="master">Committee And GateKeeper User</option></select></td>
            <td><input class="full-fit btn btn-primary btn-xs" value="Add" type="submit" id="add_admin"></td>
        </tr>
        </tbody></table>
    {!! Form::close() !!}
    <br>
    <h2>View Permissions</h2>
        <div class="table-responsive">
            {!! Form::open(array('action'=>array('APIController@removePermission'),'method'=>'POST', 'files'=>true, 'id'=>'travelfund', 'class'=>'form-horizontal', 'urlenctype'=>'multipart/form-data')) !!}
            <input type="text" id="permission_id" name="permission_id" style="display: none" value="">
            {!! Form::close() !!}
            <table id="permission-table" class="permission-table table table-bordered table-hover tablesorter">
                <thead>
                <tr>
                    <th class="last_name header">Last name</th>
                    <th class="first_name header">First name</th>
                    <th class="permission header">Permission</th>
                    <th class="no-bg header"></th>
                </tr>
                </thead>
                <tbody>

                <?php $count=1?>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{$admin["lastname"]}}</td>
                        <td>{{$admin["firstname"]}}</td>
                        <td>{{$admin["permission_level"]}}</td>
                        <td class="button-cell">
                            @if (Login::getUser()->peopleID != $admin["peopleid"])
                            <div tabindex="0" class="glyphicon glyphicon-trash pointer permission-remove-btn" title="Remove this user permission" value="27"></div>
                            @endif
                        </td>
                        <td style="display: none" class="people_id" value="{{$admin["peopleid"]}}"></td>
                    </tr>
                    <?php $count++?>
                @endforeach

                </tbody>
            </table>
        </div>
@stop
@include("forms.deleteadminModal")

@section('javascript')
    <script src="{{ Helper::asset('js/edit-permission.js') }}"></script>
    <script src="{{ Helper::asset('js/tablesorter.js') }}"></script>
@stop


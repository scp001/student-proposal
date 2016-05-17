@extends("layouts.mainlanding")
@section("content")
    <div class="row">
        <div class="col-md-6">
            <a href="{{URL::action('landingController@showLanding', ['identity' => 'gatekeeper'])}}" class="btn btn-info landing-btn" id="gatekeeper">Log in as a GateKeeper</a><br>
        </div>
        <div class="col-md-6">
            <a href="{{URL::action('landingController@showLanding', ['identity' => 'committee'])}}" class="btn btn-info landing-btn" id="committee">Log in as a Committee</a><br>
        </div>
    </div>
    <br>
    <br>
@stop


@extends("layouts.mainlanding")
@section("content")
    <?php use App\Http\Controllers\Auth\Login;?>
    <form id="category-form" method="get" action="">
        <div class="main-landing">
            <!-- <input type="hidden" id="hidden-cat-id" name="id" value=""/>-->
            <h2>Forms</h2> <hr>
            <?php $count=0?>
            @foreach ($forms as $form)
                @if ($count % 3 == 0)<div class="row">@endif
                    @if ($form['form_name'] == "Academic Travel Fund" || $form['form_name'] == "Enhancement/Partnership/DSA Fund Online Form")<!-- change this if statement as new forms are available -->
                    @if (Login::isStudent())
                    {{--<div class="buttons">--}}
                    {{--<a href="{{ config::get('app.url')}}/confirm" class="btn btn-info" id="save">Return to admin page</a>--}}
                    {{--</div><br>--}}
                    {{--@endif--}}
                        <div class="col-md-6">
                            <a href=" {{ URL::to('/')}}/forms/{{ $form['id']}}" class="btn btn-info landing-btn" id="{{ $form['id']}}">{{ $form['form_name'] }}</a><br>
                        </div>
                    @elseif(Login::isCommitee() || Login::isGateKeeper())
                        <div class="col-md-6">

                            <a href="{{URL::action('landingController@showForm',$form["id"])}}" class="btn btn-info landing-btn" id="{{ $form['id']}}">{{ $form['form_name'] }}</a><br>
                        </div>
                    @endif

                    @else
                        <div class="col-md-6">
                            <label class="btn incomplete-btn" id="{{ $form['id']}}" disabled>{{ $form['form_name'] }}</label><br>
                        </div>
                    @endif
                    @if ($count % 3 == 2)</div>@endif
                <?php $count++?>
            @endforeach
        </div>
        @if (Login::isStudent())
        <h2>Submission History</h2><hr>
        <h3>Forms Submitted</h3>
        <div class="table" id="tsp">
            <table class="table table-bordered tablesorter" id="history">
                <thead><tr class="active">
                    <th class="header">Form Submitted</th>
                    <th class="header">Time Submitted</th>
                    <th class="header">Last Updated</th>
                    <th class="header">Status</th>
                </tr></thead>
                @foreach ($online_fund_submitted as $data)
                    @if ($data["status"] != 0 && $data["status"] != 7)
                    <tr id='row{{$data["id"]}}'>
                        <td>
                            <a href="{{URL::action('landingController@displayForm', ['submitted_id' => $data["id"]]) }}">Enhancement/Partnership/DSA Fund Online Form</a>
                        </td>
                        <td>{{ $data["created_at"] }}</td>
                        <td>{{ $data["updated_at"] }}</td>
                        @if ($data["status"] == 1 && (! ($data["gate_keeper_approve"] == 2)))<td>Pending</td>
                        @elseif ($data["status"] == 1 && ($data["gate_keeper_approve"] == 2))<td>Rejected by gatekeeper</td>
                        @elseif ($data["status"] == 2)<td>Approved</td>
                        @elseif ($data["status"] == 4)<td>Cancelled By Student</td>
                        @elseif ($data["status"] == 5)<td>Cancelled By Committee</td>
                        @elseif ($data["status"] == 6)<td>Receipts uploaded</td>
                        @else<td>Declined</td>
                        @endif
                        @endif
                    </tr>
                @endforeach

                        @foreach ($travel_fund_submitted as $data)
                            @if ($data["status"] != 0 && $data["status"] != 7)
                                <tr id='row{{$data["id"]}}'>
                                    <td>
                                        <a href="{{URL::action('landingController@displayTravelForm', ['submitted_id' => $data["id"]])}}">Academic Travel Fund</a>
                                    </td>
                                    <td>{{ $data["created_at"] }}</td>
                                    <td>{{ $data["updated_at"] }}</td>
                                    @if ($data["status"] == 1 && (! ($data["gate_keeper_approve"] == 2)))<td>Pending</td>
                                    @elseif ($data["status"] == 1 &&  ($data["gate_keeper_approve"] == 2))<td>Rejected by gatekeeper</td>
                                    @elseif ($data["status"] == 2)<td>Approved</td>
                                    @elseif ($data["status"] == 4)<td>Cancelled By Student</td>
                                    @elseif ($data["status"] == 5)<td>Cancelled By Committee</td>
                                    @elseif ($data["status"] == 6)<td>Receipts uploaded</td>
                                    @else<td>Declined</td>
                                    @endif
                                    @endif
                                </tr>
                                @endforeach
            </table>
        </div>
        <br>
        <br>
            <h3>Forms Saved</h3>
            <div class="table" id="tsp_saved">
                <table class="table table-bordered tablesorter" id="history_saved">
                    <thead><tr class="active">
                        <th class="header">Form Saved</th>
                        <th class="header">Time Saved</th>
                        <th class="header">Status</th>
                    </tr></thead>
                    @foreach ($online_fund_submitted as $data)
                        @if ($data["status"] == 0 || $data["status"] == 7)
                        <tr id='row{{$data["id"]}}'>
                            <td>
                                <a href="{{URL::action('landingController@retrieveSavedForm', ['submitted_id' => $data["id"]]) }}">Enhancement/Partnership/DSA Fund Online Form</a>
                            </td>
                            <td>{{ $data["updated_at"] }}</td>
                            @if ($data["status"] == 0)
                                <td>Pending for submit</td>
                            @elseif($data["status"] == 7)
                                <td>Pending for upload receipts</td>
                            @endif
                        </tr>
                        @endif
                    @endforeach

                    @foreach ($travel_fund_submitted as $data)
                        @if ($data["status"] == 0 || $data["status"] == 7)
                        <tr id='row{{$data["id"]}}'>
                            <td>
                                <a href="{{URL::action('landingController@retrieveTravelSavedForm', ['submitted_id' => $data["id"]])}}">Academic Travel Fund</a>
                            </td>
                            <td>{{ $data["updated_at"] }}</td>
                            @if ($data["status"] == 0)
                                <td>Pending for submit</td>
                            @elseif($data["status"] == 7)
                                <td>Pending for upload receipts</td>
                            @endif
                        </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        @endif
    </form>
@stop
@section('javascript')
    <script src="https://www1.utsc.utoronto.ca/webapps/quizzical/js/lib/jquery.tablesorter.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".display").click(displayForm)
            $(".edit").click(editForm);
            $('#history').tablesorter();
            $('#history_saved').tablesorter();
        });

        function displayForm(){

            var $form = $("<form action='" + BASE_URL + "display' method='POST'>");
            var $submitted_id = $("<input type='hidden' name='submitted_id'>").attr("value", $(this).data('row-id'));
            var $shortname = $("<input type='hidden' name='shortname'>").attr("value", $(this).parents("div").attr("id"));
            var $token = $("<input type='hidden' name='_token'>").attr("value", TOKEN);
            $form.append($token);
            $form.append($submitted_id);
            $form.append($shortname);
            $('body').append($form);
            $form.submit();
        }

        function editForm(){
            var $form = $("<form action='" + BASE_URL + "edit' method='POST'>");
            var $submitted_id = $("<input type='hidden' name='submitted_id'>").attr("value", $(this).data('row-id'));
            var $shortname = $("<input type='hidden' name='shortname'>").attr("value", $(this).parents("div").attr("id"));
            var $token = $("<input type='hidden' name='_token'>").attr("value", TOKEN);
            $form.append($token);
            $form.append($submitted_id);
            $form.append($shortname);
            $('body').append($form);
            $form.submit();
        }

    </script>
@stop

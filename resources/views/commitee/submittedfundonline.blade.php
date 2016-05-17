@extends("layouts.mainfundonline")
@section("content")
    <?php use App\Http\Controllers\Helper;
    use App\Http\Controllers\Auth\Login;?>
    <br>
    <h2>Submission History</h2><hr>
    <a style="float: right" href="{{URL::to('/')}}/landing" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</a>

    <h3>Forms Submitted</h3>

    <br>
    <br>
    <div class="table" id="tspc">
        <table class="table table-bordered tablesorter" id="onlinefund_history">
            <thead><tr class="active">
                <th class="header">Submission date</th>
                <th class="header">Last updated</th>
                <th class="header">Student Name</th>
                <th class="header">Email</th>
                <th class="header">Type of funding</th>
                <th class="header">Amount Requested</th>
                <th class="header">Status</th>
                <th class="header">Financial status</th>
            </tr></thead>

            <?php $count=1?>
            @foreach ($submitteds as $submitted)
                @if (Login::isGateKeeper())
                    @if ($submitted['status'] == 1 && !$submitted['gate_keeper_approve'])
                        <tr>
                            <td><a href="{{URL::action('detailController@showDetailGate', ['submitted_id' => $submitted["id"]])}}">{{$submitted["created_at"]}}</a></td>
                            <td>{{$submitted["updated_at"]}}</td>
                            <td>{{$submitted["contact_name"]}}</td>
                            <td>{{$submitted["contact_email"]}}</td>
                            <?php
                            if ($submitted["funding_type"] == 1){
                                echo '<td>Enhancement</td>';
                            }
                            else if ($submitted["funding_type"] == 2){
                                echo '<td>Partnership</td>';
                            }
                            else{
                                echo '<td>DSA</td>';
                            }
                            ?>

                            <?php
                            echo '<td>'.'$'.$submitted["amount_requested"].'</td>';
                            ?>

                            <?php
                            if ($submitted["status"] == 1){
                                echo '<td>Pending</td>';
                            }
                            else if ($submitted["status"] == 2){
                                echo '<td>Approved</td>';
                            }
                            else if ($submitted["status"] == 4){
                                echo '<td>Cancelled by Student</td>';
                            }
                            else if ($submitted["status"] == 6){
                                echo ' <td>Receipts uploaded</td>';
                            }
                            else{
                                echo '<td>Declined</td>';
                            }
                            ?>

                            <?php
                            echo '<td>Pending</td>';
                            ?>

                        </tr>
                    @endif
                @elseif ($submitted['gate_keeper_approve'] == 1 && Login::isCommitee())
                    <tr>
                        <td><a href="{{URL::action('detailController@showDetail', ['submitted_id' => $submitted["id"]])}}">{{$submitted["created_at"]}}</a></td>
                        <td>{{$submitted["updated_at"]}}</td>
                        <td>{{$submitted["contact_name"]}}</td>
                        <td>{{$submitted["contact_email"]}}</td>
                        <?php
                        if ($submitted["funding_type"] == 1){
                            echo '<td>Enhancement</td>';
                        }
                        else if ($submitted["funding_type"] == 2){
                            echo '<td>Partnership</td>';
                        }
                        else{
                            echo '<td>DSA</td>';
                        }
                        ?>

                        <?php
                        $total = 0;
                        if ($submitted["item_amount1"]){
                            $total += $submitted["item_amount1"];
                        }

                        if ($submitted["item_amount2"]){
                            $total += $submitted["item_amount2"];
                        }

                        if ($submitted["item_amount3"]){
                            $total += $submitted["item_amount3"];
                        }

                        if ($submitted["item_amount4"]){
                            $total += $submitted["item_amount4"];
                        }

                        if ($submitted["item_amount5"]){
                            $total += $submitted["item_amount5"];
                        }

                        echo '<td>'.'$'.$total.'</td>';

                        ?>

                        <?php
                        if ($submitted["status"] == 1){
                            echo '<td>Pending</td>';
                        }
                        else if ($submitted["status"] == 2){
                            echo '<td>Approved</td>';
                        }
                        else if ($submitted["status"] == 4){
                            echo '<td>Cancelled by Student</td>';
                        }
                        else if ($submitted["status"] == 6){
                            echo ' <td>Receipts uploaded</td>';
                        }
                        else{
                            echo '<td>Declined</td>';
                        }
                        ?>

                        <?php
                        echo '<td>Pending</td>';
                        ?>

                    </tr>

                @endif
                    <?php $count++?>
            @endforeach

        </table>
    </div>


@stop

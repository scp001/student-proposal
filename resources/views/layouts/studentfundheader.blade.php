@section("header")
    <div class="utsc-header">
        <?php
        use App\Http\Controllers\Auth\Login;
        $utscHeader = file_get_contents("https://www.utsc.utoronto.ca/_includes/application/_header.html");

        if (Login::isLoggedIn()) {
            $name = Login::getUser()->givennames . " " . Login::getUser()->familyname;
            if (Login::isCommitee()) {
                $position = "(Logged in as Committee)";
            }
            elseif (Login::isGateKeeper()){
                $position = "(Logged in as GateKeeper)";
            }
            else{
                $position = "(Logged in as Student)";
            }
            $logoutUrl = URL::to('/') . "/logout";
            $logoutText = "Log Out";
            $utscHeader = str_replace("[--NAME--]", $name, $utscHeader);
            $utscHeader = str_replace("[--POSITION--]", $position, $utscHeader);
            $utscHeader = str_replace("[--LOGOUT_URL--]", $logoutUrl, $utscHeader);
            $utscHeader = str_replace("[--LOGOUT_TEXT--]", $logoutText, $utscHeader);
            //$utscHeader = str_replace("[--APP_TITLE--]", $title, $utscHeader);
            $utscHeader = str_replace("[--DROPDOWN--]", "", $utscHeader);
            echo $utscHeader;

        }
        else{
        $result = preg_replace("#<div class='profile'>(.*?)</div>#","",$utscHeader);
        echo $result;?>
        <style type="text/css">
            .profile {display: None; }
        </style>
        <?php
        }
        $title = "Academic Travel Fund";
        ?>
    </div>
    <nav class="navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h2 class="pull-left">Academic Travel Fund</h2>
        </div>
        <?php
        if (Login::isCommitee() || Login::isMaster()) {
        ?>
        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/')}}/edit-permissions">User Permissions</a></li>
            </ul>
        </div>
        <?php
        }
        ?>

        <?php
        if (Login::isGateKeeper() || Login::isMaster()) {
        ?>
        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/')}}/edit-rounds">Edit Rounds</a></li>
            </ul>
        </div>
        <?php
        }
        ?>

        <?php
        if (Login::isMaster()) {
        ?>
        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/')}}/choose-identity">Switch Role</a></li>
            </ul>
        </div>
        <?php
        }
        ?>
    </nav>
@show

<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Response, Redirect, Session, Request;
use App\Http\Controllers\Auth\Login;

class loginMiddleware {

	public function handle($request, Closure $next){

		if (!Login::isLoggedIn()) {
			if (Request::ajax())
				return Response::make('Unauthorized. You are not logged in, or your session has timed out.', 401);
			Session::flash("danger", "Please log in.");
			return Redirect::to("login");
		}

//			if (Login::isCommitee()) {
//		Route::any('/', array('as' => 'home', 'uses' => 'CommiteeController@showWelcome'));}
//		if (Login::isStudent()) {
////		Route::any('/', array('as' => 'home', 'uses' => 'StudentController@home'));
//		return "i am student";
//	}
//	else if (Login::isGateKeeper()) {
//		Route::any('/', array('as' => 'home', 'uses' => 'GateKeeperController@home'));
//	}
		return $next($request);
	}

}

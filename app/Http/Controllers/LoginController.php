<?php namespace App\Http\Controllers;
use Input, Redirect, Session;
use App\Http\Controllers\Auth\Login;
use App;
use Artisan;

class LoginController extends Controller {

	/**
	 * @return \Illuminate\View\View
	 */

	public function showLogin()
	{
//		if (Login::isLoggedIn()){
//			if (Login::getUser()->permission == ADMIN){
//				return Redirect::to('report');
//			}
//			return Redirect::to("login");
//		}
		return view('auth.showlogin');
	}

	/**
	 * @return mixed
	 */
	public function postLogin()
	{
		$utorId  = Input::get('username');
		$password = Input::get('password');

		$login = Login::Instance();
		$ret = $login->Authenticate($utorId, $password);
//
		// Failed credential
		if ($ret == false) {
			return Redirect::to('login')->withInput();
		}

//		if (Login::isStudent()){
//			return Redirect::to('landing');
//		}
//		elseif (Login::isCommitee()){
//			return Redirect::to('landing');
//		}
//		return Redirect::to('gatekeeper');

		if (Login::isMaster()){
			return Redirect::to('choose-identity');
		}
		else{
			return Redirect::to('landing');
		}
	}

	/**
	 * @return mixed
	 */
	public function logOff()
	{
		$login = Login::Instance();
		$login->logOff();

		Session::flash('success', 'You have successfully logged out.');
		return Redirect::to('login');
	}

}

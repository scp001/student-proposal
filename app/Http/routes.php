<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\detailController;
use App\Http\Controllers\landingController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('login', array('as' => 'login', "uses" => 'LoginController@showLogin'));
Route::post('login', array("uses" => 'LoginController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logOff'));



//$user = Session::get('user');
//var_dump($user);
//				var_dump($user);
//				die;
Route::group(array("middleware" => "login"), function () {

//	Route::get('home', function()
//	{
//		// Uses Auth Middleware
//	});

//	if (Login::isCommitee()) {
//		Route::any('/', array('as' => 'home', 'uses' => 'CommiteeController@showWelcome'));}
//
//	else if (Login::isStudent()) {
//		Route::any('/', array('as' => 'home', 'uses' => 'StudentController@home'));
//	}
//	else if (Login::isGateKeeper()) {
//		Route::any('/', array('as' => 'home', 'uses' => 'GateKeeperController@home'));
//	}
//	Route::any('/', array('as' => 'home', 'uses' => 'CommiteeController@showWelcome'));

//	else {
//		Route::any('/', array('as' => 'home', 'uses' => 'CommiteeController@showWelcome'));
//	}
	Route::get('/', 'landingController@showLanding');
	Route::get('landing', 'landingController@showLanding');
	Route::get('choose-identity', 'landingController@chooseIdentity');
	Route::get('edit-permissions', 'landingController@editPermissions');
	Route::get('edit-rounds', 'landingController@editRounds');
	Route::any('api/submit', 'APIController@submitForm');
	Route::any('api/save', 'APIController@submitForm');
	Route::any('api/submitsaved', 'APIController@submitSavedForm');
	Route::any('api/savesaved', 'APIController@submitSavedForm');
	Route::any('api/approve', 'APIController@approveForm');
	Route::any('api/approvetravel', 'APIController@approveTravelForm');
	Route::any('api/decline', 'APIController@declineForm');
	Route::any('api/cancel', 'APIController@cancelForm');
	Route::any('api/filter', 'APIController@filterOnlineForm');
	Route::any('api/filtertravel', 'APIController@filterTravelForm');
	Route::any('api/canceltravel', 'APIController@cancelTravelForm');
	Route::any('api/submittravel', 'APIController@submitTravelForm');
	Route::any('api/submitsavedtravel', 'APIController@submitSavedTravelForm');
	Route::get('display', 'landingController@displayForm'); //{form_id}/{shortname}
//	Route::get('try', 'landingController@displayForm'); //{form_id}/{shortname}
	Route::get('retrieve', 'landingController@retrieveSavedForm');
	Route::get('retrievetravel','landingController@retrieveTravelSavedForm');
	Route::get('displayform', 'landingController@displayTravelForm');
	Route::get('forms/{form_id}', 'landingController@showForm');
	Route::get('formssubmitted/{form_id}', 'landingController@showForm');
	Route::get('detail', 'detailController@showDetail');
	Route::get('detailkeeper', 'detailController@showDetailGate');
	Route::get('travelfunddetail', 'detailController@showTravelDetail');
	Route::get('travelfunddetailkeeper', 'detailController@showTravelDetailGate');
	Route::any('upload', 'APIController@uploadReceipt');
	Route::any('uploadtravel', 'APIController@uploadReceiptTravel');
	Route::any('continue', array('as' => 'continue', 'uses' => 'landingController@uploadReceipt'));
	Route::any('continuetravel', array('as' => 'continuetravel', 'uses' => 'landingController@uploadReceiptTravel'));
	Route::get('student', array('as' => 'student', 'uses' => 'StudentController@home'));
	Route::get('commitee', array('as' => 'commitee', 'uses' => 'CommiteeController@showWelcome'));
	Route::get('gatekeeper', array('as' => 'gatekeeper', 'uses' => 'GateKeeperController@home'));
	Route::get('download/{folder}/{file}', 'detailController@download');
	Route::get('receipts/{folder}/{file}', 'detailController@downloadReceipt');
	Route::get('onlinereceipts/{folder}/{file}', 'detailController@downloadOnlineReceipt');
	Route::post('api/removepermission', 'APIController@removePermission');
	Route::post('api/adduser', 'APIController@addUser');
	Route::post('api/editround', 'APIController@editRound');
});


//});
//
//Route::get('home', 'HomeController@index');
//
//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);



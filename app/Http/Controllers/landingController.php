<?php namespace App\Http\Controllers;
use App\Student, App\Submitted, App\Form, App\TravelSubmitted, App\User, App\Round;
use Carbon\Carbon;
use App\Http\Controllers\Auth\Login;
use Input;

class landingController extends Controller {

	/**
	 * @return \Illuminate\View\View
	 */

	public function showLanding(){
		$forms = Form::all()->toArray();
		$online_fund_submitted = Submitted::getUserForm()->get()->toArray();
		$travel_fund_submitted = TravelSubmitted::getUserForm()->get()->toArray();
		$identity = Input::get("identity", null);
		Login::switchIdentity($identity);
		$viewOptions = array(
			"forms" => $forms,
			"online_fund_submitted" => $online_fund_submitted,
			"travel_fund_submitted" => $travel_fund_submitted
		);

		return view('landing')->with($viewOptions);
	}

	public function editPermissions(){
		$admins = User::getAdminInfo()->get()->toArray();
		return view('editpermissions')->with(array("admins"=>$admins));
	}

	public function editRounds(){
		$rounds = Round::getRoundInfo()->get()->first();
//		var_dump($rounds);
//		die;
		return view('editrounds')->with(array("rounds"=>$rounds));
	}

	public function displayForm(){

		$id = Input::get('submitted_id');

//
		$submitted = Submitted::getSubmittedById($id)->get()->first();

		return view('students.fundonlinedisplay')->with(array("submitted"=>$submitted));
	}

	public function displayTravelForm(){

		$id = Input::get('submitted_id');

//
		$submitted = TravelSubmitted::getSubmittedById($id)->get()->first();

//		var_dump($submitted);
//		die;

		return view('students.fundtraveldisplay')->with(array("submitted"=>$submitted));
	}

	public function uploadReceipt(){

		return view('students.uploadreceipt');
	}

	public function uploadReceiptTravel(){

		return view('students.uploadreceipttravel');
	}


	public function retrieveSavedForm(){

		$submitted_id = Input::get('submitted_id');
		$submitted = Submitted::getSubmittedById($submitted_id)->get()->first();
		$rounds = Round::getRoundInfo()->get()->first();
		return view('students.retrievesavedform')->with(array("submitted"=>$submitted, "rounds"=>$rounds));
	}

	public function retrieveTravelSavedForm(){

		$submitted_id = Input::get('submitted_id');
		$submitted = TravelSubmitted::getSubmittedById($submitted_id)->get()->first();
		$rounds = Round::getRoundInfo()->get()->first();
		return view('students.retrievetravelsavedform')->with(array("submitted"=>$submitted, "rounds"=>$rounds));
	}

	public function showForm($form_id){
		if (Login::isStudent()){
			$rounds = Round::getRoundInfo()->get()->first();
			if (Form::find($form_id)->shortname == "actf") {
				return view('students.travelfund')->with(array("rounds"=>$rounds));
			}
			else {
				if (Form::find($form_id)->shortname == "fof") {
					return view('students.fundonlineform')->with(array("rounds"=>$rounds));
				} else {//TODO:: once the other forms are ready send to those views depending on shortname

					Session::flash("warning", "That form has not been created yet");
					return Redirect::to('landing');
				}
			}}
		elseif(Login::isCommitee() || Login::isGateKeeper()){
			if (Form::find($form_id)->shortname == "actf") {
				$submitteds = TravelSubmitted::getSubmitted()->get()->toArray();
				return view('commitee.submittedtravelfund')->with(array("submitteds"=>$submitteds));
			}
			else {
				if (Form::find($form_id)->shortname == "fof") {
					$submitteds = Submitted::getSubmitted()->get()->toArray();
					return view('commitee.submittedfundonline')->with(array("submitteds"=>$submitteds));
				} else {//TODO:: once the other forms are ready send to those views depending on shortname

					Session::flash("warning", "That form has not been created yet");
					return Redirect::to('landing');
				}
			}
			}
	}
	public function showReport()
	{
		$orders = Submitted::getReport()->get()->toArray();
		$pay_method = Payment::getPay()->get()->toArray();
		return view('forms.tcardreport')->with(array("orders" => $orders, "pays"=>$pay_method));
	}
	public function getMethod($id)
	{
		$pays = Payment::getPay($id)->get()->toArray();
		return response()->json(['success' => true, 'pays' => $pays]);
	}
	public function refreshReport($timerange)
	{
		$orders = Submitted::getReport($timerange)->get()->toArray();
		return response()->json(['success' => true, 'orders' => $orders]);
	}

	public function getstudent($utorid){
		$student = Student::getFirst($utorid);
		return response()->json(['success' => true, 'student' => $student]);
	}

	public function chooseIdentity(){
		return view('chooseidentity');
	}

}


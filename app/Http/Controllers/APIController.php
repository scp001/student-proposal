<?php namespace App\Http\Controllers;

use App\TravelSubmitted, App\User, App\Student, App\Round;
use Session, Redirect, Input, App\Submitted, Mail, Validator, File;
class APIController extends Controller {


	public function submitSavedForm(){

		$id = Input::get("id", null);
		$status = Input::get("status", null);
		$funding_type = Input::get("funding_type", null);
		$group = Input::get("group", null);
		$name_group_proposal = Input::get("name_group_proposal", null);
		$group2 = Input::get("group2", null);
		$group3 = Input::get("group3", null);
		$group4 = Input::get("group4", null);
		$group5 = Input::get("group5", null);
		$amount_requested = Input::get("amount_requested", null);
		$contact_name = Input::get("contact_name", null);
		$contact_email = Input::get("contact_email", null);
		$contact_phone = Input::get("contact_phone", null);
		$funding_workshop = Input::get("funding_workshop", null);
		$round =  Input::get("round", null);
		$event_name = Input::get("event_name", null);
		$event_location = Input::get("event_location", null);
		$contribution = Input::get("contribution", null);

		$item_amount1 = Input::get("item_amount1", null);
		$item_amount2 = Input::get("item_amount2", null);
		$item_amount3 = Input::get("item_amount3", null);
		$item_amount4 = Input::get("item_amount4", null);
		$item_amount5 = Input::get("item_amount5", null);
		$item_amount6 = Input::get("item_amount6", null);
		$item_amount7 = Input::get("item_amount7", null);

		$revenue1 = Input::get("revenue1", null);
		$revenue_amount1 = Input::get("revenue_amount1", null);
		$revenue2 = Input::get("revenue2", null);
		$revenue_amount2 = Input::get("revenue_amount2", null);
		$revenue3 = Input::get("revenue3", null);
		$revenue_amount3 = Input::get("revenue_amount3", null);
		$revenue4 = Input::get("revenue4", null);
		$revenue_amount4 = Input::get("revenue_amount4", null);
		$revenue5 = Input::get("revenue5", null);
		$revenue_amount5 = Input::get("revenue_amount5", null);

		$req_and_rule = Input::get("req_and_rule", null);
		$user_id = Input::get("user_id", null);

		Submitted::insertSavedForm($id, $status, $funding_type, $group, $name_group_proposal, $contact_name, $contact_email, $contact_phone, $funding_workshop,
			$round, $event_name, $event_location, $contribution, $item_amount1,$item_amount2,$item_amount3,$item_amount4,$item_amount5,$item_amount6,$item_amount7,
			$revenue1,$revenue_amount1, $revenue2,$revenue_amount2, $revenue3,$revenue_amount3,$revenue4,$revenue_amount4,$revenue5,$revenue_amount5,$req_and_rule, $user_id,
			$group2, $group3, $group4, $group5,$amount_requested);
		If ($status == 1){
			Session::flash('success', "Your Form has been submitted");
		}
		else{
			Session::flash('success', "Your Form has been saved, you can continue work on it anytime you want");

		}
		return Redirect::to('landing');
	}

	public function removePermission(){
		$people_id = Input::get("permission_id", null);
		User::where('peopleid', '=', $people_id)->delete();
		$admins = User::getAdminInfo()->get()->toArray();
		return Redirect::to('edit-permissions')->with(array("admins"=>$admins));
	}

	public function editRound(){
		$round1_start = Input::get("round1RangeStartDate", null);
		$round1_end = Input::get("round1RangeEndDate", null);
		$round2_start = Input::get("round2RangeStartDate", null);
		$round2_end = Input::get("round2RangeEndDate", null);
		$round3_start = Input::get("round3RangeStartDate", null);
		$round3_end = Input::get("round3RangeEndDate", null);

		Round::editRounds($round1_start, $round1_end, $round2_start, $round2_end, $round3_start, $round3_end);
		$rounds = Round::getRoundInfo()->get()->first();
		return Redirect::to('edit-rounds')->with(array("ranges"=>$rounds));

	}

	public function addUser(){

		$admins = User::getAdminInfo()->get()->toArray();
		$utorid = Input::get("user-field", null);
		$id_type = Input::get("user-type", null);
		$role = Input :: get("user-role", null);
		if ($id_type == "utor"){
			$student = Student::getFirst($utorid);
			if (!$student){
				Session::flash('danger', "Please input a correct UTORid");
				return Redirect::to('edit-permissions')->with(array("admins"=>$admins));
			}
		}
		else{
			$student = Student::getFirstUTSC($utorid);
			if (!$student){
				Session::flash('danger', "Please input a correct UTSCid");
				return Redirect::to('edit-permissions')->with(array("admins"=>$admins));
			}
		}
		$people_id = get_object_vars($student)['peopleID'];
		$email = get_object_vars($student)['email'];
		$first = get_object_vars($student)['givennames'];
		$last = get_object_vars($student)['familyname'];
		if ($role == "regular"){
			$permission_level = "gatekeeper";
		}
		if ($role == "master"){
			$permission_level = "master";
		}
		else {
			$permission_level = "committee";
		}
//		var_dump(get_object_vars($student));
//		die;

		User::addAdmin($people_id, $email, $first, $last, $permission_level);
		$admins = User::getAdminInfo()->get()->toArray();
		return Redirect::to('edit-permissions')->with(array("admins"=>$admins));
	}

	public function submitForm(){
		
		$status = Input::get("status", null);
		$funding_type = Input::get("funding_type", null);
		$group = Input::get("group", null);
		$name_group_proposal = Input::get("name_group_proposal", null);
		$group2 = Input::get("group2", null);
		$group3 = Input::get("group3", null);
		$group4 = Input::get("group4", null);
		$group5 = Input::get("group5", null);
		$amount_requested = Input::get("amount_requested", null);
		$contact_name = Input::get("contact_name", null);
		$contact_email = Input::get("contact_email", null);
		$contact_phone = Input::get("contact_phone", null);
		$funding_workshop = Input::get("funding_workshop", null);
		$round = Input::get("round", null);
		$event_name = Input::get("event_name", null);
		$event_location = Input::get("event_location", null);
		$contribution = Input::get("contribution", null);

		$item_amount1 = Input::get("item_amount1", null);
		$item_amount2 = Input::get("item_amount2", null);
		$item_amount3 = Input::get("item_amount3", null);
		$item_amount4 = Input::get("item_amount4", null);
		$item_amount5 = Input::get("item_amount5", null);
		$item_amount6 = Input::get("item_amount6", null);
		$item_amount7 = Input::get("item_amount7", null);

		$revenue1 = Input::get("revenue1", null);
		$revenue_amount1 = Input::get("revenue_amount1", null);
		$revenue2 = Input::get("revenue2", null);
		$revenue_amount2 = Input::get("revenue_amount2", null);
		$revenue3 = Input::get("revenue3", null);
		$revenue_amount3 = Input::get("revenue_amount3", null);
		$revenue4 = Input::get("revenue4", null);
		$revenue_amount4 = Input::get("revenue_amount4", null);
		$revenue5 = Input::get("revenue5", null);
		$revenue_amount5 = Input::get("revenue_amount5", null);

		$req_and_rule = Input::get("req_and_rule", null);
		$user_id = Input::get("user_id", null);

		Submitted::insertCompleteForm($status, $funding_type, $group, $name_group_proposal, $contact_name, $contact_email, $contact_phone, $funding_workshop,
			$round, $event_name, $event_location, $contribution,$item_amount1,$item_amount2,$item_amount3,$item_amount4,$item_amount5,$item_amount6,$item_amount7,
			$revenue1,$revenue_amount1, $revenue2,$revenue_amount2, $revenue3,$revenue_amount3,$revenue4,$revenue_amount4,$revenue5,$revenue_amount5,$req_and_rule, $user_id
			, $group2, $group3, $group4, $group5, $amount_requested);
		If ($status == 1){
			Session::flash('success', "Your Form has been submitted");
		}
		else{
			Session::flash('success', "Your Form has been saved, you can continue work on it anytime you want");

		}
		return Redirect::to('landing');
	}

	public function submitTravelForm(){

		$intent_textbox = Input::get("uploadintent_textbox", null);
		$conference_textbox = Input::get("conference_textbox", null);

		$contact_phone = Input::get("inputPhone", null);
		$name_conference = Input::get("name_conference", null);

		if (isset($_POST["submit"]) && (!trim($contact_phone) || !trim($name_conference) || (Input::file('uploadintent') == null) || (Input::file('uploadrec') == null) || (Input::file('uploadtrans') == null))){
			Session::flash('danger', "Please fill in every required field");
			return Redirect::to('forms/1');
		}

		if ( isset($_POST["submit"]) && !preg_match( '/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/', $contact_phone) == 1){
			Session::flash('danger', "Please input valid phone number");
			return Redirect::to('forms/1');
		}

		$contact_name = Input::get("contact_name", null);
		$tcard = Input::get("tcard", null);

		$contact_email = Input::get("contact_email", null);
		$round =  Input::get("round_set", null);
		$year = Input::get("dropDownYear", null);
		$program = Input::get("program", null);
		$destination = Input::get("destination", null);

		$start_date = Input::get("start_date", null);
		$end_date = Input::get("end_date", null);
		$amount_travel = Input::get("amount_travel", null);
		$amount_acc = Input::get("amount_acc", null);
		$amount_con = Input::get("amount_con", null);
		$amount_mis = Input::get("amount_mis", null);
		$amount_conmeal = Input::get("amount_conmeal", null);
		$amount_requested = Input::get("amount_requested", null);


		$travel_country =  Input::get("country_travel_field", null);
		$amount_requested = Input::get("amount_requested", null);

		if (isset($_POST['personal']) && !isset($_POST['scholarship']) && !isset($_POST['loan'])){
			$other_funding = 1;
		}
		elseif (!isset($_POST['personal']) && isset($_POST['scholarship']) && !isset($_POST['loan'])){
			$other_funding = 2;
		}
		elseif (!isset($_POST['personal']) && !isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 3;
		}
		elseif (isset($_POST['personal']) && isset($_POST['scholarship']) && !isset($_POST['loan'])){
			$other_funding = 4;
		}
		elseif (isset($_POST['personal']) && !isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 5;
		}
		elseif (!isset($_POST['personal']) && isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 6;
		}
		elseif (isset($_POST['personal']) && isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 7;
		}
		else{
			$other_funding = 0;
		}

		$reflection = Input::get("reflection", null);
		$user_id = Input::get("user_id", null);
//		$status = Input::get("status", null);
		if (isset($_POST["submit"])){
			$status = 1;
		}
		else{
			$status = 0;
		}

		$unique_id = uniqid();
		 File::makeDirectory('TravelFund_'.$unique_id, 0777);


		TravelSubmitted::insertCompleteForm($contact_name, $tcard, $contact_phone, $round, $contact_email, $year, $program, $destination,
			$name_conference, $start_date, $end_date, $amount_travel, $amount_acc,$amount_con,$amount_mis,$other_funding,$reflection,$user_id,$status, $unique_id, $travel_country,$amount_requested,$amount_conmeal, $amount_requested);

		// upload attachments
//		var_dump(Input::get('uploadintent'));
//		die;

		if (Input::file('uploadintent')) {
			$destinationPath = 'TravelFund_'.$unique_id; // upload path
//			$fileName = Input::file('uploadintent')->getClientOriginalName(); // renameing image
			$fileName = 'intentletter'.'.'.Input::file('uploadintent')->getClientOriginalExtension();
			Input::file('uploadintent')->move($destinationPath, $fileName); // uploading file to given path
		}
//
		if (Input::file('uploadrec')) {
			$destinationPath = 'TravelFund_'.$unique_id; // upload path
//			$fileName = Input::file('uploadrec')->getClientOriginalName(); // renameing image
			$fileName = 'recommendation'.'.'.Input::file('uploadrec')->getClientOriginalExtension();
			Input::file('uploadrec')->move($destinationPath, $fileName); // uploading file to given path

		}
//
		if (Input::file('uploadtrans')){
			$destinationPath = 'TravelFund_'.$unique_id; // upload path
//			$fileName = Input::file('uploadtrans')->getClientOriginalName(); // renameing image
			$fileName = 'transcript'.'.'.Input::file('uploadtrans')->getClientOriginalExtension();
			Input::file('uploadtrans')->move($destinationPath, $fileName); // uploading file to given path
		}
//
		if (Input::file('uploadcon')) {
			$destinationPath = 'TravelFund_'.$unique_id; // upload path
//			$fileName = Input::file('uploadcon')->getClientOriginalName(); // renameing image
			$fileName = 'conference'.'.'.Input::file('uploadcon')->getClientOriginalExtension();
			Input::file('uploadcon')->move($destinationPath, $fileName); // uploading file to given path

		}

		if ($status == 1){
			Session::flash('success', "Your Form has been submitted");
		}
		else{
			Session::flash('success', "Your Form has been saved");
		}

		return Redirect::to('landing');
	}

	public function submitSavedTravelForm(){

		$id = Input::get("case_id", null);

		$contact_name = Input::get("contact_name", null);
		$tcard = Input::get("tcard", null);
		$contact_phone = Input::get("inputPhone", null);
		$contact_email = Input::get("contact_email", null);
		$round =  Input::get("round_set", null);
		$year = Input::get("dropDownYear", null);
		$program = Input::get("program", null);
		$destination = Input::get("destination", null);

		$name_conference = Input::get("name_conference", null);
		$start_date = Input::get("start_date", null);
		$end_date = Input::get("end_date", null);
		$amount_travel = Input::get("amount_travel", null);
		$amount_acc = Input::get("amount_acc", null);
		$amount_con = Input::get("amount_con", null);
		$amount_mis = Input::get("amount_mis", null);
		$amount_conmeal = Input::get("amount_conmeal", null);
		$amount_requested = Input::get("amount_requested", null);


		$unique_id = Input::get("unique_id", null);
		$travel_country =  Input::get("country_travel_field", null);

		if (isset($_POST['personal']) && !isset($_POST['scholarship']) && !isset($_POST['loan'])){
			$other_funding = 1;
		}
		elseif (!isset($_POST['personal']) && isset($_POST['scholarship']) && !isset($_POST['loan'])){
			$other_funding = 2;
		}
		elseif (!isset($_POST['personal']) && !isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 3;
		}
		elseif (isset($_POST['personal']) && isset($_POST['scholarship']) && !isset($_POST['loan'])){
			$other_funding = 4;
		}
		elseif (isset($_POST['personal']) && !isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 5;
		}
		elseif (!isset($_POST['personal']) && isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 6;
		}
		elseif (isset($_POST['personal']) && isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 7;
		}
		else{
			$other_funding = 0;
		}

		$reflection = Input::get("reflection", null);
		$user_id = Input::get("user_id", null);
//		$status = Input::get("status", null);
		if (isset($_POST["submit"])){
			$status = 1;
		}
		else{
			$status = 0;
		}



		TravelSubmitted::updateSavedForm($contact_name, $tcard, $contact_phone, $round, $contact_email, $year, $program, $destination,
			$name_conference, $start_date, $end_date, $amount_travel, $amount_acc,$amount_con,$amount_mis,$other_funding,$reflection,$user_id,$status, $id,$travel_country, $amount_conmeal, $amount_requested);

		// upload attachments
//		var_dump(Input::get('uploadintent'));
//		die;

		if (!$unique_id){
			$unique_id = uniqid();
		}

		if (Input::file('uploadintent')) {
			$destinationPath = 'TravelFund_'.$unique_id; // upload path
//			var_dump($destinationPath);
//			die;
			$files = File::allFiles($destinationPath);
			foreach ($files as $file)
			{
				if (pathinfo($file)['filename'] == 'intentletter') {
//					var_dump($destinationPath.'/'.pathinfo($file)['basename']);
//					die;
					unlink($destinationPath.'/'.pathinfo($file)['basename']);
				}
			}
			$fileName = 'intentletter'.'.'.Input::file('uploadintent')->getClientOriginalExtension();
			Input::file('uploadintent')->move($destinationPath, $fileName); // uploading file to given path
		}

//		if (Input::file('uploadintent')) {
//			$destinationPath = 'TravelFund_'.$unique_id; // upload path
////			$fileName = Input::file('uploadintent')->getClientOriginalName(); // renameing image
//			$fileName = 'intentletter'.'.'.Input::file('uploadintent')->getClientOriginalExtension();
//			Input::file('uploadintent')->move($destinationPath, $fileName); // uploading file to given path
//		}
//
//		if (Input::file('uploadrec')) {
//			$destinationPath = 'TravelFund_'.$unique_id; // upload path
////			$fileName = Input::file('uploadrec')->getClientOriginalName(); // renameing image
//			$fileName = 'recommendation'.'.'.Input::file('uploadrec')->getClientOriginalExtension();
//			Input::file('uploadrec')->move($destinationPath, $fileName); // uploading file to given path
//
//		}

		if (Input::file('uploadrec')) {
			$destinationPath = 'TravelFund_'.$unique_id; // upload path
//			var_dump($destinationPath);
//			die;
			$files = File::allFiles($destinationPath);
			foreach ($files as $file)
			{
				if (pathinfo($file)['filename'] == 'recommendation') {
					unlink($destinationPath.'/'.pathinfo($file)['basename']);
				}
			}
			$fileName = 'recommendation'.'.'.Input::file('uploadrec')->getClientOriginalExtension();
			Input::file('uploadrec')->move($destinationPath, $fileName); // uploading file to given path
		}
//
//		if (Input::file('uploadtrans')){
//			$destinationPath = 'TravelFund_'.$unique_id; // upload path
////			$fileName = Input::file('uploadtrans')->getClientOriginalName(); // renameing image
//			$fileName = 'transcript'.'.'.Input::file('uploadtrans')->getClientOriginalExtension();
//			Input::file('uploadtrans')->move($destinationPath, $fileName); // uploading file to given path
//		}

		if (Input::file('uploadtrans')) {
			$destinationPath = 'TravelFund_'.$unique_id; // upload path
			$files = File::allFiles($destinationPath);
			foreach ($files as $file)
			{
				if (pathinfo($file)['filename'] == 'transcript') {
					unlink($destinationPath.'/'.pathinfo($file)['basename']);
				}
			}
			$fileName = 'transcript'.'.'.Input::file('uploadtrans')->getClientOriginalExtension();
			Input::file('uploadtrans')->move($destinationPath, $fileName); // uploading file to given path
		}

//
//		if (Input::file('uploadcon')) {
//			$destinationPath = 'TravelFund_'.$unique_id; // upload path
////			$fileName = Input::file('uploadcon')->getClientOriginalName(); // renameing image
//			$fileName = 'conference'.'.'.Input::file('uploadcon')->getClientOriginalExtension();
//			Input::file('uploadcon')->move($destinationPath, $fileName); // uploading file to given path
//
//		}

		if (Input::file('uploadcon')) {
			$destinationPath = 'TravelFund_'.$unique_id; // upload path
			$files = File::allFiles($destinationPath);
			foreach ($files as $file)
			{
				if (pathinfo($file)['filename'] == 'conference') {
					unlink($destinationPath.'/'.pathinfo($file)['basename']);
				}
			}
			$fileName = 'conference'.'.'.Input::file('uploadcon')->getClientOriginalExtension();
			Input::file('uploadcon')->move($destinationPath, $fileName); // uploading file to given path
		}

		if ($status == 1){
			Session::flash('success', "Your Form has been submitted");
		}
		else{
			Session::flash('success', "Your Form has been saved");
		}

		return Redirect::to('landing');
	}



	public function approveForm(){

		$id = Input::get("case_id", null);
		if (isset($_POST["approve"])){
			$status = 2;
		}
		elseif (isset($_POST["revert"])){
			$status = 0;
		}
		else{
			$status = 3;
		}
		$internal_comment = Input::get("internal_comment", null);
		$student_comment = Input::get("student_comment", null);
		$approved_amount = Input::get("approved_amount", null);
		$round = Input::get("dropDownRound", null);
		date_default_timezone_set('America/Toronto');
		Submitted::approveForm($id, $status, $internal_comment, $student_comment, $approved_amount, $round);
		$email = Input::get("contactemailinput",null);
		$name = Input::get("nameinput", null);
//		var_dump($name);
//		die;
		if ($status == 2){
			$messages = "approved";
			$subject = "Your partnership fund application has been approved";
			Mail::send('emails.notification', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});

			Session::flash('success', "Your have approved this student proposal");
		}
		elseif ($status == 0){
			$messages = "reverted due to multiple problems,";
			$subject = "Your partnership fund application has been reverted";
			Mail::send('emails.notification', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});
			Session::flash('success', "Your have reverted this student proposal to saved");
		}
		else{
			$messages = "declined";
			$subject = "Your partnership fund application has been declined";
			Mail::send('emails.notification', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});
			Session::flash('success', "Your have declined this student proposal");
		}
		return Redirect::to('formssubmitted/2');

	}

	public function approveTravelForm(){

		$id = Input::get("case_id", null);
		if (isset($_POST["approve"])){
			$status = 2;
		}
		elseif (isset($_POST["revert"])){
			$status = 0;
		}
		else{
			$status = 3;
		}
		$internal_comment = Input::get("internal_comment", null);
		$student_comment = Input::get("student_comment", null);
		$approved_amount = Input::get("approved_amount", null);
		$round = Input::get("dropDownRound", null);
		TravelSubmitted::approveForm($id, $status, $internal_comment, $student_comment, $approved_amount,$round);
		$email = Input::get("contactemailinput",null);
		$name = Input::get("nameinput", null);
		if ($status == 2){
			$messages = "approved";
			$subject = "Your travel fund application has been approved";
			Mail::send('emails.notificationtravel', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});
			Session::flash('success', "Your have approved this student proposal");
		}
		elseif ($status == 0){
			$messages = "reverted due to multiple problems,";
			$subject = "Your travel fund application has been reverted";
			Mail::send('emails.notificationtravel', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});
			Session::flash('success', "Your have reverted this student proposal to saved");
		}
		else{
			$messages = "declined";
			$subject = "Your travel fund application has been declined";
			Mail::send('emails.notificationtravel', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});
			Session::flash('success', "Your have declined this student proposal");
		}
		return Redirect::to('formssubmitted/1');

	}

	public function filterOnlineForm(){

		$id = Input::get("case_id", null);
		$round = Input::get("round_set", null);
		$funding_type = Input::get("dropDownTypeFunding", null);
		$group = Input::get("fundGroups", null);
		$name_group_proposal = Input::get("inputNameProposal", null);
		$group2 = Input::get("add_1", null);
		$group3 = Input::get("add_2", null);
		$group4 = Input::get("add_3", null);
		$group5 = Input::get("add_4", null);
		$amount_requested = Input::get("amount_requested", null);
		$contact_phone = Input::get("inputCPhone", null);
		$funding_workshop = Input::get("workshop_date", null);
		$event_name = Input::get("nameEvent", null);
		$event_location = Input::get("location", null);
		$contribution = Input::get("contribution", null);

		$item_amount1 = Input::get("item_amount1", null);
		$item_amount2 = Input::get("item_amount2", null);
		$item_amount3 = Input::get("item_amount3", null);
		$item_amount4 = Input::get("item_amount4", null);
		$item_amount5 = Input::get("item_amount5", null);
		$item_amount6 = Input::get("item_amount6", null);
		$item_amount7 = Input::get("item_amount7", null);

		$revenue1 = Input::get("revenue1", null);
		$revenue_amount1 = Input::get("revenue_amount1", null);
		$revenue2 = Input::get("revenue2", null);
		$revenue_amount2 = Input::get("revenue_amount2", null);
		$revenue3 = Input::get("revenue3", null);
		$revenue_amount3 = Input::get("revenue_amount3", null);
		$revenue4 = Input::get("revenue4", null);
		$revenue_amount4 = Input::get("revenue_amount4", null);
		$revenue5 = Input::get("revenue5", null);
		$revenue_amount5 = Input::get("revenue_amount5", null);
		$req_and_rule = Input::get("event_overview", null);


		if (isset($_POST["approve"])){
			$gate_keeper_approve = 1;
		}
		elseif (isset($_POST["revert"])){
			$gate_keeper_approve = 0;
		}
		else {
			$gate_keeper_approve = 2;
		}

		Submitted::filterForm($id, $gate_keeper_approve, $round, $funding_type,$group, $name_group_proposal,$group2,
			$group3, $group4, $group5, $amount_requested, $contact_phone, $funding_workshop, $event_name, $event_location,
			$contribution, $item_amount1, $item_amount2, $item_amount3, $item_amount4, $item_amount5,
			$item_amount6, $item_amount7, $revenue1, $revenue_amount1, $revenue2, $revenue_amount2, $revenue3,
			$revenue_amount3, $revenue4, $revenue_amount4, $revenue5, $revenue_amount5, $req_and_rule);

		$email = Input::get("contactemailinput",null);
		$name = Input::get("nameinput", null);

		if ($gate_keeper_approve == 1){
			Session::flash('success', "Your have sent this student proposal to committee");
		}
		elseif ($gate_keeper_approve == 0){
			$messages = "reverted due to multiple problems,";
			$subject = "Your partnership fund application has been reverted";
			Mail::send('emails.notification', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});
			Session::flash('success', "Your have reverted this student proposal to saved");
		}
		else{
			$messages = "declined";
			$subject = "Your partnership fund application has been declined";
			Mail::send('emails.notification', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});
			Session::flash('success', "Your have rejected this student proposal");
		}
		return Redirect::to('formssubmitted/2');

	}

	public function filterTravelForm(){

		$id = Input::get("case_id", null);
		$round = Input::get("dropDownRound", null);
		$contact_email = Input::get("contact_email", null);
		$contact_phone = Input::get("inputPhone", null);
		$year = Input::get("dropDownYear", null);
		$program = Input::get("program", null);
		$destination = Input::get("destination", null);
		$start_date = Input::get("start_date", null);
		$end_date = Input::get("end_date", null);
		$travel_country =  Input::get("country_travel_field", null);
		$name_conference = Input::get("name_conference", null);
		$amount_travel = Input::get("amount_travel", null);
		$amount_acc = Input::get("amount_acc", null);
		$amount_con = Input::get("amount_con", null);
		$amount_mis = Input::get("amount_mis", null);
		$amount_conmeal = Input::get("amount_conmeal", null);

		if (isset($_POST['personal']) && !isset($_POST['scholarship']) && !isset($_POST['loan'])){
			$other_funding = 1;
		}
		elseif (!isset($_POST['personal']) && isset($_POST['scholarship']) && !isset($_POST['loan'])){
			$other_funding = 2;
		}
		elseif (!isset($_POST['personal']) && !isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 3;
		}
		elseif (isset($_POST['personal']) && isset($_POST['scholarship']) && !isset($_POST['loan'])){
			$other_funding = 4;
		}
		elseif (isset($_POST['personal']) && !isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 5;
		}
		elseif (!isset($_POST['personal']) && isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 6;
		}
		elseif (isset($_POST['personal']) && isset($_POST['scholarship']) && isset($_POST['loan'])){
			$other_funding = 7;
		}
		else{
			$other_funding = 0;
		}

		if (isset($_POST["approve"])){
			$gate_keeper_approve = 1;
		}
		elseif (isset($_POST["revert"])){
			$gate_keeper_approve = 0;
		}
		else {
			$gate_keeper_approve = 2;
		}
		TravelSubmitted::filterForm($id, $gate_keeper_approve, $round, $contact_email, $contact_phone, $year, $program,
			$destination, $start_date, $end_date, $travel_country,$name_conference,$other_funding,$amount_travel,$amount_acc, $amount_con, $amount_mis, $amount_conmeal);
		$email = Input::get("contactemailinput",null);
		$name = Input::get("nameinput", null);
		if ($gate_keeper_approve == 1){
			Session::flash('success', "Your have sent this student proposal to committee");
		}
		elseif ($gate_keeper_approve == 0){
			$messages = "reverted due to multiple problems,";
			$subject = "Your travel fund application has been reverted";
			Mail::send('emails.notificationtravel', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});
			Session::flash('success', "Your have reverted this student proposal to saved");
		}
		else{
			$messages = "declined";
			$subject = "Your travel fund application has been declined";
			Mail::send('emails.notificationtravel', ['updated_date'=>  date("Y-m-d h:i:sa"), 'name' => $name, 'messages' => $messages], function($message) use ($email,$subject)
			{
				$message->to($email)->subject($subject);
			});
			Session::flash('success', "Your have rejected this student proposal");
		}
		return Redirect::to('formssubmitted/1');

	}

	public function declineForm(){

		$id = Input::get("id", null);
		$status = Input::get("status", null);
		$round = Input::get("round", null);
		Submitted::declineForm($id, $status, $round);
		Session::flash('success', "Your have declined this student proposal");
		return Redirect::to('formssubmitted/2');

	}

	public function cancelForm(){

		$id = Input::get("id", null);
		$status = Input::get("status", null);
		$round = Input::get("round", null);
		Submitted::declineForm($id, $status,$round);
		Session::flash('success', "Your have canceled this student proposal");
		return Redirect::to('landing');

	}

	public function cancelTravelForm(){

		$id = Input::get("id", null);
		$status = Input::get("status", null);
		TravelSubmitted::declineForm($id, $status);
		Session::flash('success', "Your have canceled this student proposal");
		return Redirect::to('landing');

	}

	public function uploadReceipt()
	{

		// getting all of the post data
//		$receipt_1 = array('receipt_1' => Input::file('receipt_1'));
		// setting up rules
//		$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
		// doing the validation, passing post data, rules and the messages
//		$validator = Validator::make($file, $rules);
//		if ($validator->fails()) {
//			// send back to the page with the input data and errors
//			return Redirect::to('landing')->withInput()->withErrors($validator);
//		}
//		else {
		// checking file is valid.

//		if (Input::file('receipt_1')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_1')->getClientOriginalName(); // renameing image
//			Input::file('receipt_1')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}
//
//		if (Input::file('receipt_2')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_2')->getClientOriginalName(); // renameing image
//			Input::file('receipt_2')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}
//
//		if (Input::file('receipt_3')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_3')->getClientOriginalName(); // renameing image
//			Input::file('receipt_3')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}
//
//		if (Input::file('receipt_4')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_4')->getClientOriginalName(); // renameing image
//			Input::file('receipt_4')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}
//
//		if (Input::file('receipt_5')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_5')->getClientOriginalName(); // renameing image
//			Input::file('receipt_5')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}
//
//		if (Input::file('receipt_6')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_6')->getClientOriginalName(); // renameing image
//			Input::file('receipt_6')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}
//
//		if (Input::file('receipt_7')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_7')->getClientOriginalName(); // renameing image
//			Input::file('receipt_7')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}
//
//		if (Input::file('receipt_8')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_8')->getClientOriginalName(); // renameing image
//			Input::file('receipt_8')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}
//
//		if (Input::file('receipt_9')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_9')->getClientOriginalName(); // renameing image
//			Input::file('receipt_9')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}
//
//		if (Input::file('receipt_10')) {
//			$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
//			$fileName = Input::file('receipt_10')->getClientOriginalName(); // renameing image
//			Input::file('receipt_10')->move($destinationPath, $fileName); // uploading file to given path
//			// sending back with message
////			Session::flash('success', 'Upload successfully');
////			return Redirect::to('landing');
//		}

		if (isset($_POST['upload_receipt_travel']) || isset($_POST['save_receipt_travel'])){

			if (Input::file('receipt_1')) {
				$destinationPath = 'TravelFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_1')->getClientOriginalName(); // renameing image
				Input::file('receipt_1')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_2')) {
				$destinationPath = 'TravelFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_2')->getClientOriginalName(); // renameing image
				Input::file('receipt_2')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_3')) {
				$destinationPath = 'TravelFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_3')->getClientOriginalName(); // renameing image
				Input::file('receipt_3')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_4')) {
				$destinationPath = 'TravelFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_4')->getClientOriginalName(); // renameing image
				Input::file('receipt_4')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_5')) {
				$destinationPath = 'TravelFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_5')->getClientOriginalName(); // renameing image
				Input::file('receipt_5')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_6')) {
				$destinationPath = 'TravelFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_6')->getClientOriginalName(); // renameing image
				Input::file('receipt_6')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_7')) {
				$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_7')->getClientOriginalName(); // renameing image
				Input::file('receipt_7')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_8')) {
				$destinationPath = 'TravelFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_8')->getClientOriginalName(); // renameing image
				Input::file('receipt_8')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_9')) {
				$destinationPath = 'OnlineForm'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_9')->getClientOriginalName(); // renameing image
				Input::file('receipt_9')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_10')) {
				$destinationPath = 'TravelFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_10')->getClientOriginalName(); // renaming image
				Input::file('receipt_10')->move($destinationPath, $fileName); // uploading file to given path
			}

			$reflection = Input::get('reflection',null);
			$reimbursment = Input::get('reimbursment',null);
			$case_id = Input::get('case_id',null);
			$name_cheque = Input::get('name_cheque',null);

			if (isset($_POST['upload_receipt_travel'])){
				$status = 6;
			}
			else{
				$status = 7;
			}


			TravelSubmitted::uploadReceipt($reflection, $reimbursment, $case_id, $name_cheque,$status);

		}

		else{

			if (Input::file('receipt_1')) {
				$destinationPath = 'OnlineFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_1')->getClientOriginalName(); // renameing image
				Input::file('receipt_1')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_2')) {
				$destinationPath = 'OnlineFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_2')->getClientOriginalName(); // renameing image
				Input::file('receipt_2')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_3')) {
				$destinationPath = 'OnlineFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_3')->getClientOriginalName(); // renameing image
				Input::file('receipt_3')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_4')) {
				$destinationPath = 'OnlineFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_4')->getClientOriginalName(); // renameing image
				Input::file('receipt_4')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_5')) {
				$destinationPath = 'OnlineFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_5')->getClientOriginalName(); // renameing image
				Input::file('receipt_5')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_6')) {
				$destinationPath = 'OnlineFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_6')->getClientOriginalName(); // renameing image
				Input::file('receipt_6')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_7')) {
				$destinationPath = 'OnlineFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_7')->getClientOriginalName(); // renameing image
				Input::file('receipt_7')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_8')) {
				$destinationPath = 'TravelFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_8')->getClientOriginalName(); // renameing image
				Input::file('receipt_8')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_9')) {
				$destinationPath = 'OnlineFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_9')->getClientOriginalName(); // renameing image
				Input::file('receipt_9')->move($destinationPath, $fileName); // uploading file to given path
			}

			if (Input::file('receipt_10')) {
				$destinationPath = 'OnlineFundReceipt'.Input::get("case_id", ''); // upload path
				$fileName = Input::file('receipt_10')->getClientOriginalName(); // renameing image
				Input::file('receipt_10')->move($destinationPath, $fileName); // uploading file to given path
			}

			$reimbursment = Input::get('reimbursment',null);
			$case_id = Input::get('case_id',null);
			$name_cheque = Input::get('name_cheque',null);

			if (isset($_POST['upload_receipt_online'])){
				$status = 6;
			}
			else{
				$status = 7;
			}
			Submitted::uploadReceipt($reimbursment, $case_id, $name_cheque,$status);

		}


		Session::flash('success', 'Receipts upload successfully');
		return Redirect::to('landing');
	}

}

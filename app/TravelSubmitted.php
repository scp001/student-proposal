<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Auth\Login;
use Carbon\Carbon;
use DB;
class TravelSubmitted extends Model{


	/**
	 * The database table used to hold the information for each form submitted.
	 *
	 * @var string
	 */
	protected $table = 'travel_fund_form';

	public static function getUserForm(){
		$user_id = Login::getUser()->peopleID;
		return TravelSubmitted::select("id","status", "created_at", "updated_at", "gate_keeper_approve")
			->where("user_id", "=", "$user_id")->orderBy('updated_at', 'DESC');
	}

	public static function updateSavedForm($contact_name, $tcard, $contact_phone, $round, $contact_email, $year, $program, $destination, $name_conference, $start_date, $end_date, $amount_travel, $amount_acc,$amount_con,$amount_mis,$other_funding,$reflection,$user_id,$status, $id, $travel_country, $amount_conmeal, $amount_requested){

		$data["status"] = $status;
		$data["contact_name"] = $contact_name;
		$data["tcard"] = $tcard;
		$data["contact_email"] = $contact_email;
		$data["contact_phone"] = $contact_phone;
		$data["year"] = $year;
		$data["program"] = $program;
		$data["round"] = $round;
		$data["destination"] = $destination;
		$data["name_conference"] = $name_conference;
		$data["start_date"] = $start_date;
		$data["end_date"] = $end_date;
		$data["amount_travel"] = $amount_travel;
		$data["amount_acc"] = $amount_acc;
		$data["amount_con"] = $amount_con;
		$data["amount_mis"] = $amount_mis;
		$data["amount_conmeal"] = $amount_conmeal;
		$data["amount_requested"] = $amount_requested;
		$data["other_funding"] = $other_funding;
		$data["reflection"] = $reflection;
		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["user_id"] = $user_id;
		$data["travel_country"] = $travel_country;

		TravelSubmitted::where('id', '=', $id)->update($data);

	}


	public static function insertCompleteForm($contact_name, $tcard, $contact_phone, $round, $contact_email, $year, $program, $destination,
		$name_conference, $start_date, $end_date, $amount_travel, $amount_acc,$amount_con,$amount_mis,$other_funding,$reflection,$user_id,$status,$unique_id, $travel_country, $amount_requested, $amount_conmeal){

		$data["contact_name"] = $contact_name;
		$data["tcard"] = $tcard;
		$data["contact_phone"] = $contact_phone;
		$data["round"] = $round;
		$data["contact_email"] = $contact_email;
		$data["year"] = $year;
		$data["program"] = $program;
		$data["round"] = $round;
		$data["destination"] = $destination;
		$data["name_conference"] = $name_conference;

		$data["start_date"] = $start_date;
		$data["end_date"] = $end_date;
		$data["amount_travel"] = $amount_travel;
		$data["amount_acc"] = $amount_acc;
		$data["amount_con"] = $amount_con;
		$data["amount_mis"] = $amount_mis;
		$data["amount_conmeal"] = $amount_conmeal;
		$data["other_funding"] = $other_funding;
		$data["reflection"] = $reflection;

		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["created_at"] = Carbon::now('America/Toronto');
		$data["user_id"] = $user_id;
		$data["status"] = $status;
		$data["unique_id"] = $unique_id;
		$data["travel_country"] = $travel_country;
		$data["amount_requested"] = $amount_requested;

		TravelSubmitted::insert($data);

	}

	public static function getSubmitted(){

		return TravelSubmitted::select(
			"id",
			"contact_name",
			"tcard",
			"contact_email",
			"contact_phone",
			"round",
			"year",
			"program",
			"destination",
			"name_conference",
			"start_date",
			"end_date",
			"amount_travel",
			"amount_acc",
			"amount_con",
			"amount_mis",
			"other_funding",
			"reflection",
			"updated_at",
			"created_at",
			"user_id",
			"status",
			"unique_id",
			"gate_keeper_approve",
			"amount_requested"
		)
			->where('status', '>', 0)->orderBy('updated_at', 'DESC');
	}

	public static function getSubmittedById($submitted_id){

		return TravelSubmitted::select(
			"id",
			"contact_name",
			"tcard",
			"contact_email",
			"contact_phone",
			"round",
			"year",
			"program",
			"destination",
			"name_conference",
			"start_date",
			"end_date",
			"amount_travel",
			"amount_acc",
			"amount_con",
			"amount_mis",
			"other_funding",
			"reflection",
			"updated_at",
			"created_at",
			"user_id",
			"status",
			"unique_id",
			"internal_comment",
			"student_comment",
			"approved_amount",
			"gate_keeper_approve",
			"travel_country",
			"amount_requested",
			"amount_conmeal"

		)
			->where('id', '=', $submitted_id);
	}

	public static function approveForm($id, $status, $internal_comment, $student_comment, $approved_amount,$round){

		$data["status"] = $status;
		$data["internal_comment"] = $internal_comment;
		$data["student_comment"] = $student_comment;
		$data["approved_amount"] = $approved_amount;
		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["round"] = $round;

		TravelSubmitted::where('id', '=', $id)->update($data);
	}

	public static function filterForm($id, $gate_keeper_approve, $round, $contact_email, $contact_phone, $year, $program,
		$destination, $start_date, $end_date, $travel_country,$name_conference,$other_funding,$amount_travel,$amount_acc, $amount_con, $amount_mis, $amount_conmeal){

		$data["gate_keeper_approve"] = $gate_keeper_approve;
		if ($gate_keeper_approve == 0){
			$data["status"] = 0;
		}
		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["round"] = $round;
		$data["contact_phone"] = $contact_phone;
		$data["contact_email"] = $contact_email;
		$data["year"] = $year;
		$data["program"] = $program;
		$data["round"] = $round;
		$data["destination"] = $destination;
		$data["name_conference"] = $name_conference;

		$data["start_date"] = $start_date;
		$data["end_date"] = $end_date;
		$data["amount_travel"] = $amount_travel;
		$data["amount_acc"] = $amount_acc;
		$data["amount_con"] = $amount_con;
		$data["amount_mis"] = $amount_mis;
		$data["amount_conmeal"] = $amount_conmeal;
		$data["other_funding"] = $other_funding;
		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["travel_country"] = $travel_country;

		TravelSubmitted::where('id', '=', $id)->update($data);
	}

	public static function declineForm($id, $status){

//		var_dump($id);
//		die;
		$data["status"] = $status;
		$data["updated_at"] = Carbon::now('America/Toronto');

		TravelSubmitted::where('id', '=', $id)->update($data);

	}

	public static function uploadReceipt($reflection, $reimbursment, $case_id, $name_cheque,$status){


		$data["reflection"] = $reflection;
		$data["reimbursment"] = $reimbursment;
		$data["name_cheque"] = $name_cheque;
		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["status"] = $status;

		TravelSubmitted::where('id', '=', $case_id)->update($data);

	}


}

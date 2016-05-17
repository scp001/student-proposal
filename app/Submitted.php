<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Auth\Login;
use Carbon\Carbon;
use DB;
class Submitted extends Model{


	/**
	 * The database table used to hold the information for each form submitted.
	 *
	 * @var string
	 */
	protected $table = 'fund_online_form';

	public static function getUserForm(){
		$user_id = Login::getUser()->peopleID;
		return Submitted::select("id","status", "created_at", "updated_at", "gate_keeper_approve")
			->where("user_id", "=", "$user_id")->orderBy('updated_at', 'DESC');
	}

	public static function insertSavedForm($id, $status, $funding_type, $group, $name_group_proposal, $contact_name, $contact_email, $contact_phone, $funding_workshop,
		$round, $event_name, $event_location, $contribution, $item_amount1, $item_amount2,$item_amount3,$item_amount4,$item_amount5,$item_amount6,$item_amount7,
		$revenue1,$revenue_amount1, $revenue2,$revenue_amount2, $revenue3,$revenue_amount3,$revenue4,$revenue_amount4,$revenue5,$revenue_amount5,$req_and_rule, $user_id, $group2, $group3, $group4, $group5, $amount_requested){

		$data["status"] = $status;
		$data["funding_type"] = $funding_type;
		$data["group"] = $group;
		$data["name_group_proposal"] = $name_group_proposal;
		$data["group2"] = $group2;
		$data["group3"] = $group3;
		$data["group4"] = $group4;
		$data["group5"] = $group5;
		$data["amount_requested"] = $amount_requested;
		$data["contact_name"] = $contact_name;
		$data["contact_email"] = $contact_email;
		$data["contact_phone"] = $contact_phone;
		$data["funding_workshop"] = $funding_workshop;
		$data["round"] = $round;
		$data["event_name"] = $event_name;
		$data["event_location"] = $event_location;
		$data["contribution"] = $contribution;
		$data["item_amount1"] = $item_amount1;
		$data["item_amount2"] = $item_amount2;
		$data["item_amount3"] = $item_amount3;
		$data["item_amount4"] = $item_amount4;
		$data["item_amount5"] = $item_amount5;
		$data["item_amount6"] = $item_amount6;
		$data["item_amount7"] = $item_amount7;

		$data["revenue1"] = $revenue1;
		$data["revenue_amount1"] = $revenue_amount1;
		$data["revenue2"] = $revenue2;
		$data["revenue_amount2"] = $revenue_amount2;
		$data["revenue3"] = $revenue3;
		$data["revenue_amount3"] = $revenue_amount3;
		$data["revenue4"] = $revenue4;
		$data["revenue_amount4"] = $revenue_amount4;
		$data["revenue5"] = $revenue5;
		$data["revenue_amount5"] = $revenue_amount5;

		$data["req_and_rule"] = $req_and_rule;

		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["created_at"] = Carbon::now('America/Toronto');
		$data["user_id"] = $user_id;

		Submitted::where('id', '=', $id)->update($data);

	}


	public static function insertCompleteForm($status, $funding_type, $group, $name_group_proposal, $contact_name, $contact_email, $contact_phone, $funding_workshop,
		$round, $event_name, $event_location, $contribution,$item_amount1,$item_amount2,$item_amount3,$item_amount4,$item_amount5,$item_amount6,$item_amount7,
		$revenue1,$revenue_amount1, $revenue2,$revenue_amount2, $revenue3,$revenue_amount3,$revenue4,$revenue_amount4,$revenue5,$revenue_amount5,$req_and_rule, $user_id,
		$group2, $group3, $group4, $group5, $amount_requested){

		$data["status"] = $status;
		$data["funding_type"] = $funding_type;
		$data["group"] = $group;
		$data["name_group_proposal"] = $name_group_proposal;
		$data["group2"] = $group2;
		$data["group3"] = $group3;
		$data["group4"] = $group4;
		$data["group5"] = $group5;
		$data["amount_requested"] = $amount_requested;
		$data["contact_name"] = $contact_name;
		$data["contact_email"] = $contact_email;
		$data["contact_phone"] = $contact_phone;
		$data["funding_workshop"] = $funding_workshop;
		$data["round"] = $round;
		$data["event_name"] = $event_name;
		$data["event_location"] = $event_location;
		$data["contribution"] = $contribution;

		$data["item_amount1"] = $item_amount1;
		$data["item_amount2"] = $item_amount2;
		$data["item_amount3"] = $item_amount3;
		$data["item_amount4"] = $item_amount4;
		$data["item_amount5"] = $item_amount5;
		$data["item_amount6"] = $item_amount6;
		$data["item_amount7"] = $item_amount7;

		$data["revenue1"] = $revenue1;
		$data["revenue_amount1"] = $revenue_amount1;
		$data["revenue2"] = $revenue2;
		$data["revenue_amount2"] = $revenue_amount2;
		$data["revenue3"] = $revenue3;
		$data["revenue_amount3"] = $revenue_amount3;
		$data["revenue4"] = $revenue4;
		$data["revenue_amount4"] = $revenue_amount4;
		$data["revenue5"] = $revenue5;
		$data["revenue_amount5"] = $revenue_amount5;

		$data["req_and_rule"] = $req_and_rule;

		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["created_at"] = Carbon::now('America/Toronto');
		$data["user_id"] = $user_id;

		Submitted::insert($data);

	}

	public static function getSubmitted(){

		return Submitted::select(
			"id",
			"group",
			"updated_at",
			"created_at",
			"contact_name",
			"contact_email",
			"contact_phone",
			"funding_type",
			"funding_workshop",
			"round",
			"event_name",
			"event_location",
			"contribution",
			"item_amount1",
			"item_amount2",
			"item_amount3",
			"item_amount4",
			"item_amount5",
			"item_amount6",
			"item_amount7",
			"revenue1",
			"revenue2",
			"revenue3",
			"revenue4",
			"revenue5",
			"revenue_amount1",
			"revenue_amount2",
			"revenue_amount3",
			"revenue_amount4",
			"revenue_amount5",
			"status",
			"req_and_rule",
			"gate_keeper_approve",
			"amount_requested"
		)
			->where('status', '>', 0)->orderBy('updated_at', 'DESC');
	}

	public static function getSubmittedById($submitted_id){

		return Submitted::select(
			"id",
			"group",
			"updated_at",
			"contact_name",
			"contact_email",
			"contact_phone",
			"funding_type",
			"funding_workshop",
			"round",
			"event_name",
			"event_location",
			"contribution",
			"item_amount1",
			"item_amount2",
			"item_amount3",
			"item_amount4",
			"item_amount5",
			"item_amount6",
			"item_amount7",
			"revenue1",
			"revenue2",
			"revenue3",
			"revenue4",
			"revenue5",
			"revenue_amount1",
			"revenue_amount2",
			"revenue_amount3",
			"revenue_amount4",
			"revenue_amount5",
			"status",
			"req_and_rule",
			"internal_comment",
			"student_comment",
			"approved_amount",
			"name_group_proposal",
			"reimbursment",
			"name_cheque",
			"gate_keeper_approve",
			"group2",
			"group3",
			"group4",
			"group5",
			"amount_requested"

		)
			->where('id', '=', $submitted_id);
	}

	public static function approveForm($id, $status, $internal_comment, $student_comment, $approved_amount, $round){

		$data["status"] = $status;
		$data["internal_comment"] = $internal_comment;
		$data["student_comment"] = $student_comment;
		$data["approved_amount"] = $approved_amount;
		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["round"] = $round;
//		var_dump($status);
//		die;
//		var_dump($round);
//		die;
		Submitted::where('id', '=', $id)->update($data);
	}

	public static function filterForm($id, $gate_keeper_approve, $round, $funding_type,$group, $name_group_proposal,$group2,
		$group3, $group4, $group5, $amount_requested, $contact_phone, $funding_workshop, $event_name, $event_location,
		$contribution, $item_amount1, $item_amount2, $item_amount3, $item_amount4, $item_amount5,
		$item_amount6, $item_amount7, $revenue1, $revenue_amount1, $revenue2, $revenue_amount2, $revenue3,
		$revenue_amount3, $revenue4, $revenue_amount4, $revenue5, $revenue_amount5, $req_and_rule){

		$data["gate_keeper_approve"] = $gate_keeper_approve;
		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["round"] = $round;
		$data["funding_type"] = $funding_type;
		$data["group"] = $group;
		$data["name_group_proposal"] = $name_group_proposal;
		$data["group2"] = $group2;
		$data["group3"] = $group3;
		$data["group4"] = $group4;
		$data["group5"] = $group5;
		$data["amount_requested"] = $amount_requested;
		$data["contact_phone"] = $contact_phone;
		$data["funding_workshop"] = $funding_workshop;
		$data["event_name"] = $event_name;
		$data["event_location"] = $event_location;
		$data["contribution"] = $contribution;

		$data["item_amount1"] = $item_amount1;
		$data["item_amount2"] = $item_amount2;
		$data["item_amount3"] = $item_amount3;
		$data["item_amount4"] = $item_amount4;
		$data["item_amount5"] = $item_amount5;
		$data["item_amount6"] = $item_amount6;
		$data["item_amount7"] = $item_amount7;

		$data["revenue1"] = $revenue1;
		$data["revenue_amount1"] = $revenue_amount1;
		$data["revenue2"] = $revenue2;
		$data["revenue_amount2"] = $revenue_amount2;
		$data["revenue3"] = $revenue3;
		$data["revenue_amount3"] = $revenue_amount3;
		$data["revenue4"] = $revenue4;
		$data["revenue_amount4"] = $revenue_amount4;
		$data["revenue5"] = $revenue5;
		$data["revenue_amount5"] = $revenue_amount5;

		$data["req_and_rule"] = $req_and_rule;

		if ($gate_keeper_approve == 0){
			$data["status"] = 0;
		}

		Submitted::where('id', '=', $id)->update($data);
	}

	public static function declineForm($id, $status, $round){

		$data["status"] = $status;
		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["round"] = $round;

		Submitted::where('id', '=', $id)->update($data);

	}

	public static function uploadReceipt( $reimbursment, $case_id, $name_cheque,$status){


		$data["reimbursment"] = $reimbursment;
		$data["name_cheque"] = $name_cheque;
		$data["updated_at"] = Carbon::now('America/Toronto');
		$data["status"] = $status;
		Submitted::where('id', '=', $case_id)->update($data);

	}


}

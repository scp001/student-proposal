<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Auth\Login;
use Carbon\Carbon;
use DB;

class User extends Model{

	/**
	 * The database table used to hold the information for each form submitted.
	 *
	 * @var string
	 */
	protected $table = 'users';


	public static function setUserPermission($peopleid){
		$permission = User::where("peopleid", $peopleid)->where("permission_level", COMMITEE)->get()->toArray();
		if (!empty($permission)){
			return COMMITEE;
		}
		else{
			$permission2 = User::where("peopleid", $peopleid)->where("permission_level", GATEKEEPER)->get()->toArray();
			$permission3 = User::where("peopleid", $peopleid)->where("permission_level", MASTER)->get()->toArray();
			if (!empty($permission2)){
				return GATEKEEPER;
			}
			elseif (!empty($permission3)){
				return MASTER;
			}
			else{
				return STUDENTS;
			}
		}
	}

	/**
	 * Return true if current user is from committee
	 */

	public function isCommittee()
	{
		return $this instanceof Commitee;
	}

	/**
	 * Return true if current user is a student
	 */
	public function isStudent()
	{
		return $this instanceof Student;
	}

	public function isGateKeeper()
	{
		return $this instanceof GateKeeper;
	}

	public static function getAdminInfo()
	{
		return User::select(
			"peopleid",
			"firstname",
			"lastname",
			"permission_level",
			"email"
		)->where('permission_level', '=', "committee")
			->orwhere('permission_level', '=', "gatekeeper")
			->orwhere('permission_level', '=', "master");
	}

	public static function addAdmin($people_id, $email, $first, $last, $permission_level)
	{
		$data["peopleid"] = $people_id;
		$data["firstname"] = $first;
		$data["lastname"] = $last;
		$data["email"] = $email;
		$data["permission_level"] = $permission_level;
		$data["updated_at"] = Carbon::now('America/Toronto');
		User::insert($data);
	}

}

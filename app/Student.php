<?php namespace App;

use Illuminate\Database\Eloquent\Model;

require('Loginxml.php');


class Student extends User{

	public static function getFirst($utorid){
//		return Student::select("first")->where("utorid", "=", "$utorid");

//		var_dump(phpinfo());
//		die();
		$obj = new Loginxml();
		$obj->loginxml();
		$result = $obj->getProfile($utorid);
//
//		var_dump($result);
		return $result->return;
//
//
//
//		return Student::where("utorid", $utorid)->get();
	}

	public static function getFirstUTSC($utsc){
//		return Student::select("first")->where("utorid", "=", "$utorid");

//		var_dump(phpinfo());
//		die();
		$obj = new Loginxml();
		$obj->loginxml();
		$result = $obj->getProfileUTSC($utsc);
//
//		var_dump($result);
		return $result->return;
//
//
//
//		return Student::where("utorid", $utorid)->get();
	}
}

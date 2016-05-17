<?php namespace App\Http\Controllers;

use Session, Redirect, Input;
class StudentController extends BaseController {

	public function home()
	{
//		var_dump("wat");
//		die;
//		return "wtf";
//		return view('students.travelfund');
		return view('landing');
	}
}

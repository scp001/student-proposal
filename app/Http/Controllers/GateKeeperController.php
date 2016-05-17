<?php namespace App\Http\Controllers;

use Session, Redirect, Input;
class GateKeeperController extends BaseController {

	public function home()
	{
		return "welcome, gatekeeper";
	}
}

<?php namespace App\Http\Controllers;
use App\Student, App\Submitted, App\Payment, App\TravelSubmitted;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Input;
use Response;
use File;

class detailController extends Controller
{

	/**
	 * @return \Illuminate\View\View
	 */

	public function showDetail()
	{
		$submitted_id = Input::get('submitted_id');
		$submitted =  Submitted::getSubmittedById($submitted_id)->get()->first();
		return view('commitee.submittedformdetail')->with(array("submitted" => $submitted)) ;
	}

	public function showDetailGate()
	{
		$submitted_id = Input::get('submitted_id');
		$submitted =  Submitted::getSubmittedById($submitted_id)->get()->first();
		return view('gatekeeper.submittedformdetail')->with(array("submitted" => $submitted)) ;
	}


	public function showTravelDetail()
	{
		$submitted_id = Input::get('submitted_id');
		$submitted =  TravelSubmitted::getSubmittedById($submitted_id)->get()->first();
		return view('commitee.submittedtravelformdetail')->with(array("submitted" => $submitted)) ;
	}

	public function showTravelDetailGate()
	{
		$submitted_id = Input::get('submitted_id');
		$submitted =  TravelSubmitted::getSubmittedById($submitted_id)->get()->first();
		return view('gatekeeper.submittedtravelformdetail')->with(array("submitted" => $submitted)) ;
	}

	public function download($folder, $filename)
	{
//		$folder = explode("_", $filename)[0];
		$directory = 'TravelFund_' .$folder;
		$files = File::allFiles($directory);

		foreach ($files as $file)
		{
//			var_dump(pathinfo($file)['basename']);
//			die;
			if (pathinfo($file)['filename'] == $filename){
				return response()->download($file);
			}
		}
	}

	public function downloadReceipt($folder, $filename)
	{
//		$folder = explode("_", $filename)[0];
		$directory = 'TravelFundReceipt' .$folder;
		$files = File::allFiles($directory);

		foreach ($files as $file)
		{
//			var_dump(pathinfo($file)['basename']);
//			die;
			if (pathinfo($file)['filename'] == $filename){
				return response()->download($file);
			}
		}
	}

	public function downloadOnlineReceipt($folder, $filename)
	{
//		$folder = explode("_", $filename)[0];
		$directory = 'OnlineFundReceipt' .$folder;
		$files = File::allFiles($directory);

		foreach ($files as $file)
		{
//			var_dump(pathinfo($file)['basename']);
//			die;
			if (pathinfo($file)['filename'] == $filename){
				return response()->download($file);
			}
		}
	}
}

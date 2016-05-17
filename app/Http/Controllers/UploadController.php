<?php namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Request;
use Session;
class UploadController extends Controller {
	public function multiple_upload() {
		// getting all of the post data
//		var_dump("wat");
//		die;
//		$files = Input::file('images');
		$files = Input::file('images');
//		var_dump($files);
//		die;

		// Making counting of uploaded images
		$file_count = count($files);
		// start count how many uploaded
		$uploadcount = 0;
		foreach($files as $file) {
			$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			$validator = Validator::make(array('file'=> $file), $rules);
			if($validator->passes()){
				$destinationPath = 'uploads';
				$filename = $file->getClientOriginalName();
				$upload_success = $file->move($destinationPath, $filename);
				$uploadcount ++;
			}
		}
		if($uploadcount == $file_count){
			Session::flash('success', 'Upload successfully');
			return Redirect::to('student');
		}
		else {
			return Redirect::to('student')->withInput()->withErrors($validator);
		}
//		var_dump("he");
//		die;
	}
}

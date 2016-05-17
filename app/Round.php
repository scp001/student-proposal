<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Round extends Model{

	/**
	 * The database table used to hold the information for each form submitted.
	 *
	 * @var string
	 */
	protected $table = 'rounds';

	public static function editRounds($round1_start, $round1_end, $round2_start, $round2_end, $round3_start, $round3_end){
		$data["round1_start"] = $round1_start;
		$data["round1_end"] = $round1_end;
		$data["round2_start"] = $round2_start;
		$data["round2_end"] = $round2_end;
		$data["round3_start"] = $round3_start;
		$data["round3_end"] = $round3_end;
		Round::insert($data);
	}

	public static function getRoundInfo()
	{
		return Round::select(
			"round1_start",
			"round1_end",
			"round2_start",
			"round2_end",
			"round3_start",
			"round3_end"
		)->orderBy('id', 'DESC');
	}
}

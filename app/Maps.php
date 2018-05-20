<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class maps extends Model
{
	public function updatePosition($id, $position, $lat, $lng)
	{
		$result = DB::table('maps')
		->where('id', '=', $id)
		->update([
			'position' => $position,
			'lat'      => $lat,
			'lng'      => $lng
		]);
		return $result;
	}
}

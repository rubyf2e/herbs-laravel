<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maps AS MapsModel;

class MapsController extends Controller
{
	public function index()
	{
		$results = MapsModel::all();
		return response()->json($results, 200);
	}

	public function updatePosition(Request $request)
	{
		$MapsModel = new MapsModel();
		$id        = $request->input('id');
		$lng       = $request->input('lng');
		$lat       = $request->input('lat');
		$position  = json_encode(array('lat' => $lat, 'lng' => $lng));
		$results   = $MapsModel->updatePosition($id, $position, $lat, $lng);
		return response()->json($results, 200);
	}


}

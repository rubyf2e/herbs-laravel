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
}

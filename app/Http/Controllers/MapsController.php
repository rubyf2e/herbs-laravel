<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maps;

class MapsController extends Controller
{
	public function index()
	{
		$results = Maps::all();
		return response()->json($results, 201);
	}
}

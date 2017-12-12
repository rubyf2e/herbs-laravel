<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sidebars;

class SidebarsController extends Controller
{
	public function index(Request $request)
	{
		$results = Sidebars::all();
		return response()->json($results, 200);
	}

}

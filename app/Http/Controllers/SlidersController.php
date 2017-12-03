<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sliders;

class SlidersController extends Controller
{
	public function index()
	{
		$results = Sliders::all();
		return response()->json($results, 201);
	}
}

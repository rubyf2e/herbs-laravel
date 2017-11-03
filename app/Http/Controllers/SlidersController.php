<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sliders;

class SlidersController extends Controller
{
	public function index()
	{
		return Sliders::all();
	}
}

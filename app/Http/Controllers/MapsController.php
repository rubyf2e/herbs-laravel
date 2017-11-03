<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maps;

class MapsController extends Controller
{
	public function index()
	{
		return Maps::all();
	}
}

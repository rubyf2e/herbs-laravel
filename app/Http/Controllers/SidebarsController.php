<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sidebars;

class SidebarsController extends Controller
{
	public function index()
	{
		return Sidebars::all();
	}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Index;

class IndexController extends Controller
{
	public function index()
	{
		  return redirect('/');
	}
}

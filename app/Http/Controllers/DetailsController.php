<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Details;

class DetailsController extends Controller
{
	public function index()
	{
		$results =  Details::all();

		foreach ($results as $key => $order) {
			$order->slidesrc;
		}

		return response()->json($results);
	}

}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Viaturas;

class teachersController
{
	public function index()
	{
		return view('frontend.user.vehicules');
	}

	public function requestVehic()
	{
		$viaturas = Viaturas::all();
		return view('frontend.user.reqVehicules', compact('viaturas'));
	}

	public function requesting($id)
	{
		return view('frontend.user.requesting');
	}
}

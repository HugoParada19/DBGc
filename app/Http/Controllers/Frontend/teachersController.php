<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Viaturas;
use App\Models\userinf;
use App\Models\Usercat;
use Illuminate\Support\Facades\Auth;

class teachersController
{
	public function index()
	{
		return view('frontend.user.vehicules');
	}

	public function requestVehic()
	{
		$viaturas = Viaturas::with('polo', 'categoria')->get();
		$user = userinf::where('user_id', Auth::id())->with('user', 'polo')->get();

		return view('frontend.user.reqVehicules', compact('viaturas', 'user'));
	}

	public function requesting($id)
	{
		$viatura = Viaturas::find($id);
		$user = userinf::where('id', Auth::id())->with('usercat.categoria')->get();
		return view('frontend.user.requesting', compact('viatura', 'user'));
	}
}

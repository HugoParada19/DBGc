<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Viaturas;
use Illuminate\Support\Facades\Auth;
use App\Domains\Auth\Models\User;

class teachersController
{
	public function index()
	{
		return view('frontend.user.vehicules');
	}

	public function requestVehic()
	{
		$viaturas = Viaturas::with('polo', 'categoria')->get();
		$user = User::find(Auth::id())->with('userinf')->get();

		return view('frontend.user.reqVehicules', compact('viaturas', 'user'));
	}

	public function requesting($id)
	{
		return view('frontend.user.requesting');
	}
}

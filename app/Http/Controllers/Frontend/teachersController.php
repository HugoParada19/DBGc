<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Viaturas;
use App\Models\userinf;
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
		$user = userinf::where('user_id', Auth::id())->with('user', 'polo', 'categorias')->with('categorias')->get();

		return view('frontend.user.reqVehicules', compact('viaturas', 'user'));
	}

	public function requesting($id)
	{
		$viatura = Viaturas::find($id);
		$user = userinf::where('user_id', 1)->with('user', 'polo', 'categorias')->get();
		return view('frontend.user.requesting', compact('viatura', 'user'));
	}
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Viaturas;
use App\Models\userinf;
use App\Models\marcacao;
use App\Models\Polos;
use Illuminate\Support\Facades\Auth;
use date;

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
		$userinf = userinf::where('user_id', Auth::id())->with('polo')->with('usercats.categoria')->get();
		$polos = Polos::all();

		return view('frontend.user.requesting', compact('viatura', 'userinf', 'polos'));
	}

	public function reqAct(Request $request)
	{
		$polos = Polos::all();
		$user = Auth::user();
		$marcar = new marcacao;
		$marcar->user_id = $user->id;
		$marcar->poloLevantar_id = $request->polo_id;
		$marcar->dataHora_levantar = new date('d-m-y h:i:s');
		$marcar->dataHora_entrega = $request->dataHora_entrega;
		$marcar->objetivo = $request->objetivo;
		$marcar->viatura_id = $request->id;
		foreach ($polos as $polo)
		{
			if ($polo->designacao == $request->poloEntrega_id)
			{
				$marcar->poloEntrega_id = $polo->designacao;
				break;
			}
		}
		$marcar->timestamps = new date('d-m-y h:i:s');
		$marcar->save();

		return view('frontend.user.vehicules');
	}
}

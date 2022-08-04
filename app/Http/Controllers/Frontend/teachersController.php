<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Viaturas;
use App\Models\userinf;
use App\Models\marcacao;
use App\Models\Polos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DateTime;

class teachersController
{
	use ValidatesRequests;

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
		foreach ($polos as $polo)
		{
			if ($request->poloEntrega_id == $polo->designacao)
			{
				$marcar->poloEntrega_id = $polo->id;
				break;
			}
		}
		$marcar->dataHora_levantar = $request->dataHora_levantar;
		$marcar->dataHora_entrega = $request->dataHora_entrega;
		$marcar->objetivo = $request->objetivo;
		$marcar->viatura_id = $request->id;
		$viatura = Viaturas::find($request->id);
		foreach ($polos as $polo)
		{
			if ($viatura->polos_id == $polo->id)
			{
				$marcar->poloLevantar_id = $polo->id;
				break;
			}
		}
		foreach ($polos as $polo)
		{
			if ($polo->designacao == $request->poloEntrega_id)
			{
				$marcar->poloEntrega_id = $polo->id;
				break;
			}
		}
		$marcar->timestamps = new \DateTime('NOW');
		$marcar->save();
		$viatura->requisited = 1;
		$viatura->save();
		$viatura = null;
		$polos = null;
		$user = null;
		return view('frontend.user.vehicules');
	}

	public function requisitions()
	{
		$marcacoes = marcacao::where('user_id', Auth::id())->with('viatura')->with('polo')->get();

		return view('frontend.user.myReqs')->with('marcacoes', $marcacoes);
	}

	public function editReq($id)
	{
		$marcacao = marcacao::find($id);
		$viaturas = Viaturas::all();
		$polos = Polos::all();

		$dataChangable = true;
		$now = new \DateTime('NOW');
		if ($marcacao->dataHora_levantar < $now)
			$dataChangable = false;

		return view('frontend.user.editReq', compact('marcacao', 'viaturas', 'polos', 'dataChangable'));
	}

	public function cancelReq($id)
	{
		$marcacao = marcacao::find($id);
		$marcacao->delete();

		return redirect()->back();
	}

	public function edittingReq(Request $request)
	{
		$this->validate($request, 
			[
				'id' => 'required',
				'dataHora_levantar' => 'required',
				'dataHora_entrega' => 'required'
			]);
		// Setting up variables for search
		$viaturas = Viaturas::all();
		$polos = Polos::all();

		$marcacao = marcacao::find($request->id);
		$marcacao->dataHora_levantar = $request->dataHora_levantar;
		$marcacao->dataHora_entrega = $request->dataHora_entrega;

		if ($request->viatura != null)
		{
			foreach ($viaturas as $viatura)
			{
				if ($viatura->matricula == $request->viatura)
				{
					$marcacao->viatura_id = $viatura->id;
					break;
				}
			}
		}
		if ($request->polo != null)
		{
			foreach ($polos as $polo)
			{
				if ($polo->designacao == $request->polo)
				{
					$marcacao->polos_id = $polo->id;
					break;
				}
			}
		}

		$marcacao->objetivo = $request->objetivo;
		$marcacao->save();

		return redirect()->route('vehicules.requisitions');
	}
}

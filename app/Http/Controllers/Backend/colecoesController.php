<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Models\Polos;
use Illuminate\Http\Request;

/*
 * Class colecoesController.
 */

class colecoesController
{
	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function index()
	{
		return view('backend.colecoes.index');
	}

	public function polViews()
	{
		$polos = DB::table('polos')->get();
		return view('backend.colecoes.polos', compact('polos'))->with('requested', false);
	}

	public function cPolMenu()
	{
		return view('backend.colecoes.polosCreate');
	}

	public function createPolo(Request $request)
	{
		$polos = new Polos;
		$polos->designacao = $request->designacao;
		$polos->save();

		$polos = null;
		$polos = DB::table('polos')->get();
		return view('backend.colecoes.polos', compact('polos'))->with('requested', true);
	}

	public function destroyPolo($id)
	{
		Polos::find($id)->destroy();

		$polos = DB::table('polos')->get();
		return view('backend.colecoes.polos', compact('polos'))->with('requested', true);
	}
}

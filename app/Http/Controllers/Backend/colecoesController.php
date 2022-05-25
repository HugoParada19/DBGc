<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Models\Polos;

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
		return view('backend.colecoes.polos', compact('polos'));
	}
}

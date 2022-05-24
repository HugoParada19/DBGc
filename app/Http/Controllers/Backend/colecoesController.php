<?php

namespace App\Http\Controllers\Backend;

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
		return view('backend.colecoes.polos');
	}
}

<?php

namespace App\Http\Controllers\Backend\colecoesController;

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
		return view('admin.colecoes.index');
	}
}

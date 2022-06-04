<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Models\Polos;
use App\Models\categorias_contas;
use App\Models\Viaturas;
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
		Polos::find($id)->delete();

		$polos = DB::table('polos')->get();
		return view('backend.colecoes.polos', compact('polos'))->with('requested', true);
	}

	public function catView()
	{
		$categorias = DB::table('categorias_contas')->get();
		return view('backend.colecoes.categorias', compact('categorias'))->with('requested', false);
	}

	public function cCatMenu()
	{
		$categorias = DB::table('categorias_contas')->get();
		return view('backend.colecoes.catCreate', compact('categorias'));
	}

	public function createCat(Request $request)
	{
		$categoria = new categorias_contas;
		$categoria->categoria = $request->categoria;
		$categoria->save();

		$categorias = DB::table('categorias_contas')->get();
		return view('backend.colecoes.categorias', compact('categorias'))->with('requested', true);
	}

	public function destroyCat($id)
	{
		categorias_contas::find($id)->delete();

		$categorias = DB::table('categorias_contas')->get();
		return view('backend.colecoes.categorias', compact('categorias'))->with('requested', true);
	}

	public function viaView()
	{
		$viaturas = Viaturas::all();
		return view('backend.colecoes.viaturas', compact('viaturas'))->with('requested', true);
	}

	public function cViaMenu()
	{
		return view('backend.colecoes.viaCreate');
	}

	public function createVia(Request $request)
	{
		$viaturas = new Viaturas;
		$viaturas->matricula = $request->matricula;
		$viaturas->marca = $request->marca;
		$viaturas->polos_id = $request->polos_id;
		$viaturas->catConta_id = $request->catConta_id;
		$viaturas->timestamps = $request->timestamps;
		$viaturas->save();

		$viaturas = null;
		$viaturas = DB::table('viaturas')->get();

		return view('backend.colecoes.viaturas', compact('viaturas'))->with('requested', true);
	}
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Models\Polos;
use App\Models\categorias_cartas;
use App\Models\Viaturas;
use App\Models\marcacao;
use App\Models\Usercat;
use App\Models\requisicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userinf;
use App\Domains\Auth\Models\User;
use DateTime;

/*
 * Class colecoesController.
 */

class colecoesController
{
	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */

	/*Due to the amount of time that I had been working using only this controller, without making explanations to anyone who's reading the code, maybe now it's the time.
	*
	*Warning, dates here are writen the same way as they are saved in the language to avoid confusion when coding, inputing & outputing information
	*06.09.2022 */
	
	public function index() //In order for these to work, it's necessary that the route (located under the "main folder"/routes/backend/colecoes.php), has the view information placed there, it's also formatted in a different manner. (everything else is explained there)
	{
		return view('backend.colecoes.index');
	}

	public function polViews()
	{
		$polos = DB::table('polos')->get();
		return view('backend.colecoes.polos', compact('polos'))->with('requested', false)->with('iCanExist', false); //If you do know the reference you do know the reference. 👌
	}

	public function cPolMenu()
	{
		return view('backend.colecoes.polosCreate');
	}

	public function createPolo(Request $request)
	{
		$polos = DB::table('polos')->get();
		if (DB::table('polos')->where('designacao', $request->designacao)->value('designacao') == $request->designacao)
			return view('backend.colecoes.polos', compact('polos'))->with('requested', false)->with('iCanExist', true);
		else
			$polos = null;

		$polos = new Polos;
		$polos->designacao = $request->designacao;
		$polos->save();

		$polos = null;
		$polos = DB::table('polos')->get();
		return view('backend.colecoes.polos', compact('polos'))->with('requested', true)->with('iCanExist', true);
	}

	public function destroyPolo($id)
	{
		Polos::find($id)->delete();

		$polos = DB::table('polos')->get();
		return view('backend.colecoes.polos', compact('polos'))->with('requested', true);
	}

	public function catView()
	{
		$categorias = DB::table('categorias_cartas')->get();
		return view('backend.colecoes.categorias', compact('categorias'))->with('requested', true);
	}

	public function cCatMenu()
	{
		$categorias = DB::table('categorias_cartas')->get();
		return view('backend.colecoes.catCreate', compact('categorias'));
	}

	public function createCat(Request $request)
	{
		$categoria = new categorias_cartas;
		$categoria->categoria = $request->categoria;
		$categoria->save();

		$categorias = DB::table('categorias_cartas')->get();
		return view('backend.colecoes.categorias', compact('categorias'))->with('requested', true);
	}

	public function destroyCat($id)
	{
		categorias_cartas::find($id)->delete();

		$categorias = DB::table('categorias_cartas')->get();
		return view('backend.colecoes.categorias', compact('categorias'))->with('requested', true);
	}

	public function viaView()
	{
		$viaturas = Viaturas::all();
		return view('backend.colecoes.viaturas', compact('viaturas'))->with('requested', true);
	}

	public function cViaMenu()
	{
		$polos = Polos::all();
		$categorias = categorias_cartas::all();
		return view('backend.colecoes.viaCreate', compact('polos', 'categorias'));
	}

	public function createVia(Request $request)
	{
		$user = Auth::user();

		$viaturas = new Viaturas;
		$viaturas->matricula = $request->matricula;
		$viaturas->marca = $request->marca;
		$viaturas->modelo = $request->modelo;
		$viaturas->catCarta_id = DB::table('categorias_cartas')->where('categoria', $request->catCarta_id)->value('id');
		$viaturas->polos_id = DB::table('polos')->where('designacao', $request->polos_id)->value('id');
		$viaturas->timestamps = new DateTime('today');
		$viaturas->save();

		$viaturas = null;
		$viaturas = DB::table('viaturas')->get();

		return view('backend.colecoes.viaturas', compact('viaturas'))->with('requested', true);
	}

	public function reqsView()
	{
		$marcacoes = marcacao::all();
		return view('backend.colecoes.reqs')->with('marcacoes', $marcacoes);
	}

	public function requisitar(Request $request)
	{
		$requisicao = new requisicao;
		$jsonDec = json_decode($request->marcacao_id);
		$requisicao->marcacao_id = $jsonDec->id;
		$requisicao->dataHora_levantar = $request->dataHora_levantar;
		$requisicao->dataHora_entrega = $request->dataHora_entrega;
		$requisicao->kmAntes = $request->kmAntes;
		$requisicao->kmDepois = $request->kmDepois;
		$requisicao->notas = $request->notas;
		$requisicao->objetivo = $request->objetivo;
		$requisicao->save();

		return view('backend.colecoes.index');
	}

	public function manageView()
	{
		return view('backend.colecoes.manage');
	}

	public function manageUsers()
	{
		$informacoes = userinf::with('polo')->get();
		$subinformacoes = Usercat::with('categoria')->get();
		return view('backend.colecoes.manusers', compact('informacoes', 'subinformacoes'));
	}

	public function manMarcView()
	{
		return view('backend.colecoes.manmarcs');
	}

	public function modifyManUser($id)
	{
		$informacao = userinf::find($id);
		$subinformacoes = Usercat::with('categoria')->get();
		$polos = Polos::all();
		$catCartas = categorias_cartas::all();

		return view('backend.colecoes.changeUser', compact('informacao', 'subinformacoes', 'polos', 'catCartas'));
	}

	public function destroyCatCarta($id)
	{
		Usercat::find($id)->delete();

		return redirect()->route('backend.colecoes.changeUser');
	}

	public function viewOldCatCart($id)
	{
		$userinf = Usercat::where('id', $id)->with('categoria')->get();
		$catCartas = categorias_cartas::all();

		return view('backend.colecoes.editCarta', compact('catCartas', 'userinf'));
	}

	public function createNewCatCart($id)
	{
		$user = User::find($id);
		$catCartas = categorias_cartas::all();
		$usercat = Usercat::all();
		$highestNum = $usercat->count();

		return view('backend.colecoes.createCarta', compact('user', 'catCartas', 'usercat', 'highestNum'));
	}

	public function changeCatCart(Request $request)
	{
		$catCartas = Usercat::find($request->id);
		$categorias = categorias_cartas::all();

		$catCartas->catCarta_id = $request->catCarta_id;
		$catnum = 0;
		foreach ($categorias as $categoria)
		{
			if ($categoria->categoria == $request->categoria)
			{
				$catnum = $categoria->id;
				break;
			}
		}
		$catCarta->categoria = $catnum;
		$catCartas->validity = $request->validity;
		$catCarta->save();

		return redirect()->route('backend.colecoes.changeUser');
	}

	public function createCatCarta(Request $request)
	{
		$catCartas = categorias_cartas::all();
		$usercat = new Usercat;
		
		$usercat->userinf_id = $request->userinf_id;
		$catnum = 0;
		foreach ($catCartas as $catCarta)
		{
			if ($catCarta->designacao == $request->designacao)
			{
				$catnum = $catCarta->id;
				break;
			}
		}
		$usercat->categoria = $catnum;
		$usercat->validity = $request->validity;
		$usercat->save();

		return redirect()->route('backend.colecoes.changeUser');
	}

	public function editSpecificCathegory($userId, $cathegoryId)
	{
		$user = User::find($userId);
		$userCat = UserCat::find($cathegoryId);
		$categorias = categorias_cartas::all();

		return view('backend.colecoes.specific', compact('user', 'userCat', 'categorias'));
	}
}

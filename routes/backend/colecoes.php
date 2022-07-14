<?php

use App\Http\Controllers\Backend\colecoesController;
use Tabuna\Breadcrumbs\Trail;

//Due to my decision to comment this code so that you don't have to suffer for what I did, here's the explanations. (this thread begins in the php file located in "mainfolder"/app/Http/Controllers/Backend/colecoesController.php)

//The code is based on the admin.php file, located in the same directory. What is important to note is that "colecoes" is the main route, also called the parent route... In order for the route to be fully working and showing up on the browser, it is necessary to create first the route (manually as in a normal Laravel project), and identified it here, and then in a controller, which should be included (or maybe not). After that, it must be constructed the way it is show from line 10 to 15

Route::get('colecoes', [colecoesController::class,'index']) 
	->name('colecoes')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->push(__('Home'), route('admin.colecoes')); //Note: while in the controller you would identify the route with the location of the file, here you are just showing how the link will look like
	});

//Note: this only applies for the parent function

//Here we see a child route. Concept applies the same although child classes must identify the parent class in the name and route
Route::get('colecoes/polos', [colecoesController::class,'polViews'])
	->name('colecoes.polos')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->parent('admin.colecoes') //The parent class must be applied, for every route, since child classes can also be parent classes for some other classes.
			->push(__('Home'), route('admin.colecoes.polos'));
	});

Route::get('colecoes/polos/create', [colecoesController::class,'cPolMenu'])
	->name('colecoes.polos.create')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->parent('admin.colecoes')
			->push(__('Home'), route('admin.colecoes.polos.create'));
	});

Route::get('colecoes/polos/{id}/destroy', [colecoesController::class,'destroyPolo']);

Route::get('colecoes/categorias', [colecoesController::class,'catView'])
	->name('colecoes.categorias')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->parent('admin.colecoes')
			->push(__('Home'), route('admin.colecoes.categorias')); 
	});

Route::get('colecoes/categorias/create', [colecoesController::class,'cCatMenu'])
	->name('colecoes.categorias.create')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->parent('admin.colecoes.categorias')
			->push(__('Home'), route('admin.colecoes.categorias.create'));
	});

Route::get('colecoes/categorias/{id}/destroy', [colecoesController::class,'destroyCat']);

Route::get('colecoes/viaturas', [colecoesController::class,'viaView'])
	->name('colecoes.viaturas')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->parent('admin.colecoes')
			->push(__('Home'), route('admin.colecoes.viaturas'));
	});

Route::get('colecoes/viaturas/create', [colecoesController::class,'cViaMenu'])
	->name('colecoes.viaturas.create')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->parent('admin.colecoes.viaturas')
			->push(__('Home'), route('admin.colecoes.viaturas.create'));
	});

Route::get('colecoes/viaturas/requisicoes', [colecoesController::class,'requisicoes'])
	->name('colecoes.viaturas.requisicoes')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->parent('admin.colecoes.viaturas')
			->push(__('Home'), route('admin.colecoes.viaturas.requisicoes'));
	});

Route::post('colecoes/polos/create', [colecoesController::class,'createPolo']);

Route::post('colecoes/categorias/create', [colecoesController::class,'createCat']);

Route::post('colecoes/viaturas/create', [colecoesController::class,'createVia']);

Route::post('colecoes/viaturas/requisicoes', [colecoesController::class,'requisitar']);

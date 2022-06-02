<?php

use App\Http\Controllers\Backend\colecoesController;
use Tabuna\Breadcrumbs\Trail;

Route::get('colecoes', [colecoesController::class,'index'])
	->name('colecoes')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->push(__('Home'), route('admin.colecoes'));
	});

Route::get('colecoes/polos', [colecoesController::class,'polViews'])
	->name('colecoes.polos')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->parent('admin.colecoes')
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

Route::post('colecoes/polos/create', [colecoesController::class,'createPolo']);

Route::post('colecoes/categorias/create', [colecoesController::class,'createCat']);

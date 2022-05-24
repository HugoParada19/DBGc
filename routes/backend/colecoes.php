<?php

use App\Http\Controllers\Backend\colecoesController;
use Tabuna\Breadcrumbs\Trail;

Route::get('colecoes', [colecoesController::class,'index'])
	->name('colecoes')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.colecoes'));
    });

Route::get('polos', [colecoesController::class,'polViews'])
	->nmae('polos')
	->breadcrumbs(function (Trail $trail)
	{
		$trail->push(__('Home'), route('admin.colecoes.polos'));
	});

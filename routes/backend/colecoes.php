<?php

use App\Http\Controllers\Backend\colecoesController;
use Tabuna\Breadcrumbs\Trail;

Route::get('colecoes', [colecoesController::class, 'index'])
    ->name('coleções')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.colecoes.index'));
    });

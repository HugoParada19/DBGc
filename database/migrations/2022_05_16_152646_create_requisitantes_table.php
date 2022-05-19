<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitantes', function (Blueprint $table) {
            $table->id();
			$table->string('nome');
			$table->foreignId('funcao_id')->constrained('roles');
			$table->foreignId('polo_id')->constrained();
			$table->foreignId('catConta_id')->constrained('categorias_conta');
			$table->date('dataValConta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisitantes');
    }
}

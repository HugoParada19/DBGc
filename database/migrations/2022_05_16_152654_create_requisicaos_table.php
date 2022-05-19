<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicaos', function (Blueprint $table) {
            $table->id();
			$table->foreignId('marcacao_id')->constrained();
			$table->dateTime('dataHora_levantar');
			$table->dateTime('dataHora_entrega');
			$table->integer('kmAntes');
			$table->integer('kmDepois')->nullable();
			$table->string('notas');
			$table->string('objetivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicaos');
    }
}

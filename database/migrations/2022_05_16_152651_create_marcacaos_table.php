<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcacaos', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->constrained();
			$table->foreignId('poloLevantar_id')->constrained('polos');
			$table->dateTime('dataHora_levantar');
			$table->dateTime('dataHora_entrega');
			$table->string('objetivo');
			$table->foreignId('viatura_id')->constrained();
			$table->foreignId('poloEntrega_id')->constrained('polos');
			$table->boolean('done')->default(false);
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
        Schema::dropIfExists('marcacaos');
    }
}

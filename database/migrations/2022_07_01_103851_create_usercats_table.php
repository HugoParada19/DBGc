<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsercatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercats', function (Blueprint $table) {
			$table->id();
			$table->foreignId('userinf_id')->constrained('userinfs');
			$table->foreignId('catCarta_id')->constrained('categorias_cartas');
			$table->dateTime('validity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usercats');
    }
}

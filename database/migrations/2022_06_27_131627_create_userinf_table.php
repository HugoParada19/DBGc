<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaBindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carta_binds', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->unique();
			$table->foreignId('polos_id')->constrained();
			$table->foreignId('cartas_id')->constrained('user_cats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carta_binds');
    }
}

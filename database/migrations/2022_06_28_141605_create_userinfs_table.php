<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserinfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfs', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->constrained('users');
			$table->foreignId('polo_id')->constrained('polos')->nullable();
			$table->integer('numCats')->nullable();
			$table->string('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userinfs');
    }
}

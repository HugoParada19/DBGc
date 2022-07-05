<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\userinf;
use App\Models\Usercat;

class userinfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user = new userinf;
		$user->user_id = 1;
		$user->polo_id = 2;
		$user->save();

		$user = new userinf;
		$user->user_id = 2;
		$user->polo_id = 2;
		$user->save();

		$categoria = new Usercat;
		$categoria->userinf_id = 1;
		$categoria->catCarta_id = 3;
		$categoria->save();
		
		$categoria = new Usercat;
		$categoria->userinf_id = 1;
		$categoria->catCarta_id = 2;
		$categoria->save();

		$categoria = new Usercat;
		$categoria->userinf_id = 2;
		$categoria->catCarta_id = 7;
		$categoria->save();
    }
}

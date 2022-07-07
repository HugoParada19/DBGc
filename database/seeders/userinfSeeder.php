<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\userinf;
use App\Models\Usercat;
use DateTime;

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
		$user->role = "Secretario(a)";
		$user->save();

		$user = new userinf;
		$user->user_id = 2;
		$user->polo_id = 2;
		$user->role = "Professor(a)";
		$user->save();

		$categoria = new Usercat;
		$categoria->userinf_id = 1;
		$categoria->catCarta_id = 3;
		$categoria->validity = new DateTime('25-03-2025');
		$categoria->save();
		
		$categoria = new Usercat;
		$categoria->userinf_id = 1;
		$categoria->catCarta_id = 2;
		$categoria->validity = new DateTime('15-06-2026');
		$categoria->save();

		$categoria = new Usercat;
		$categoria->userinf_id = 2;
		$categoria->catCarta_id = 7;
		$categoria->validity = new DateTime('17-08-2022');
		$categoria->save();
    }
}

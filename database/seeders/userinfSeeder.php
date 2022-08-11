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
		$user->role = "Secretario(a)";
		$user->numCats = 0;
		$user->save();

		$user = new userinf;
		$user->user_id = 2;
		$user->polo_id = 2;
		$user->role = "Professor(a)";
		$user->numCats = 0;
		$user->save();

		$this->call(UserCathegories::class);

		$user = null;
		$cats = Usercat::all();
		foreach ($cats as $cat)
		{
			$user = userinf::find($cat->userinf_id);
			$user->numCats += 1;
			$user->save();
		}
		$user = null;
    }
}

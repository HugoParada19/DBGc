<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Viaturas;

class testVehSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$viaturas = new Viaturas;

		$viaturas->matricula = '97-XX-48';
		$viaturas->marca = 'Citroen';
		$viaturas->modelo = 'C3';
		$viaturas->polos_id = 2;
		$viaturas->catCarta_id = 3;
		$viaturas->save();

		$viaturas = new Viaturas;

		$viaturas->matricula = 'ER-63-TE';
		$viaturas->marca = 'Ford';
		$viaturas->modelo = 'Focus';
		$viaturas->polos_id = 2;
		$viaturas->catCarta_id = 2;
		$viaturas->save();

		$viaturas = new Viaturas;
		$viaturas->matricula = '37-PT-22';
		$viaturas->marca = 'Fiat';
		$viaturas->modelo = '500';
		$viaturas->polos_id = 2;
		$viaturas->catCarta_id = 7;
		$viaturas->save();
	}
}

<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(AnnouncementSeeder::class);

        Model::reguard();

		DB::table('polos')->insert
		([
			'designacao' => 'Amadora sede',
		]);
		DB::table('polos')->insert
		([
			'designacao' => 'Amadora centro',
		]);
		DB::table('polos')->insert
		([
			'designacao' => 'Entroncamento',
		]);
		DB::table('polos')->insert
		([
			'designacao' => 'Queluz',
		]);
		DB::table('polos')->insert
		([
			'designacao' => 'Lisboa',
		]);

		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'A - AM', ]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'A - A1',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'B - B1',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'A - A2',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'B - B',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'B - BE',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'C - C1',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'C - C1E',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'C - C',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'D - D1',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'D - D1E',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'A - A',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'D - D',
		]);
		DB::table('categorias_cartas')->insert
		([
			'categoria' => 'D - DE',
		]);
    }
}

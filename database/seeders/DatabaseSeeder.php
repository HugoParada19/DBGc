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
			'designacao' => 'Amadora polo',
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
    }
}

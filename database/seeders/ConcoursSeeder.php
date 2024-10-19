<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('concours')->insert([
            [
                'id_type_concours' => 1,
                'id_session' => 1,
                'libelle' => 'Concours A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_type_concours' => 2,
                'id_session' => 1,
                'libelle' => 'Concours B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

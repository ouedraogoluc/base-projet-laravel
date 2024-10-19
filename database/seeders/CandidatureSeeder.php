<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidatures')->insert([
            [
                'id_concours' => 1,
                'code_conc' => 'A123',
                'id_centre' => 1,
                'code_cent' => '03',
                'centre' => 'OUAGADOUGOU',
                'recepisse' => 'REC001',
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'sexe' => 'M',
                'cib' => '1234567890',
                'date_nais' => '1990-01-01',
                'tel' => '0600000000',
                'email' => 'jean.dupont@example.com',
                'id_inscription' => 'INS001',
                'code_composition' => 'COMP001',
                'etat_inscription' => 'validé',
                'ref_diplome' => 'DIP001',
                'date_obtention_diplome' => '2015-06-30',
                'intitule_diplome' => 'Baccalauréat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_concours' => 2,
                'code_conc' => 'B456',
                'id_centre' => 2,
                'code_cent' => '03',
                'centre' => 'OUAGADOUGOU',
                'recepisse' => 'REC002',
                'nom' => 'Martin',
                'prenom' => 'Marie',
                'sexe' => 'F',
                'cib' => '0987654321',
                'date_nais' => '1992-05-10',
                'tel' => '0612345678',
                'email' => 'marie.martin@example.com',
                'id_inscription' => 'INS002',
                'code_composition' => 'COMP002',
                'etat_inscription' => 'validé',
                'ref_diplome' => 'DIP002',
                'date_obtention_diplome' => '2017-07-15',
                'intitule_diplome' => 'Licence',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_concours' => 2,
                'code_conc' => 'B456',
                'id_centre' => 2,
                'code_cent' => '03',
                'centre' => 'OUAGADOUGOU',
                'recepisse' => 'REC002',
                'nom' => 'Ouedraogo',
                'prenom' => 'luc',
                'sexe' => 'F',
                'cib' => '0987654321',
                'date_nais' => '1992-05-10',
                'tel' => '73400608',
                'email' => 'marie.martin@example.com',
                'id_inscription' => 'INS002',
                'code_composition' => 'COMP002',
                'etat_inscription' => 'validé',
                'ref_diplome' => 'DIP002',
                'date_obtention_diplome' => '2017-07-15',
                'intitule_diplome' => 'Licence',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}

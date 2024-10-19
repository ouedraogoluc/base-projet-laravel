<?php

namespace App\Imports;

use App\Models\Candidature;
use Maatwebsite\Excel\Concerns\ToModel;

class CandidatureImportPreview implements ToModel 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Candidature([
            'id_concours' => $row['id_concours'],
            'code_conc' => $row['code_conc'],
            'id_centre' => $row['id_centre'],
            'code_cent' => $row['code_cent'],
            'centre' => $row['centre'],
            'recepisse' => $row['recepisse'],
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'sexe' => $row['sexe'],
            'cib' => $row['cib'],
            'date_nais' => $row['date_nais'],
            'tel' => $row['tel'],
            'email' => $row['email'],
            'id_inscription' => $row['id_inscription'],
            'code_composition' => $row['code_composition'],
            'etat_inscription' => $row['etat_inscription'],
            'ref_diplome' => $row['ref_diplome'],
            'date_obtention_diplome' => $row['date_obtention_diplome'],
            'intitule_diplome' => $row['intitule_diplome'],
        ]);
    }

}




<?php
namespace App\Imports;

use App\Models\Candidature;
use App\Models\Concours;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CandidatureImport implements ToModel, WithHeadingRow
{
    protected $concours;
    protected $userId;

    public function __construct(Concours $concours, $userId)
    {
        $this->concours = $concours;
        $this->userId = $userId;
    }

    public function model(array $row)
    {
        return Candidature::firstOrCreate([
            'id_concours' => $this->concours->id,
            'user_id' => $this->userId,
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

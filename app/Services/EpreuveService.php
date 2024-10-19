<?php

namespace App\Services;

use App\DTO\SaveEpreuveDto;
use App\Models\Epreuve;
use App\Repositories\Interfaces\EpreuveRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EpreuveService
{

    public function __construct(
        protected readonly EpreuveRepositoryInterface $epreuveRepositoryInterface,
    ) {
    }

    public function findAllEpreuve()
    {
        return $this->epreuveRepositoryInterface->all();
    }

    public function findEpreuveById(int $epreuveId): Epreuve
    {
        return $this->epreuveRepositoryInterface->findById($epreuveId);
    }
    public function createEpreuve(SaveEpreuveDto $saveEpreuveDto): Epreuve
    {
        return $this->epreuveRepositoryInterface->create(
            [
                'user_id' => Auth::id(),
                'libelle' => $saveEpreuveDto->libelle,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }
    public function updateEpreuve(SaveEpreuveDto $saveEpreuveDto, string $epreuveId): Epreuve
    {
        return $this->epreuveRepositoryInterface->update([
            'libelle' => $saveEpreuveDto->libelle,
            'updated_at' =>  Carbon::now()
        ], $epreuveId);
    }

    public function deleteEpreuve(int $epreuveId): bool
    {
        $epreuve = $this->findEpreuveById($epreuveId);
        return $epreuve ? $this->epreuveRepositoryInterface->delete($epreuveId) : false;
    }
}

<?php

namespace App\Repositories;

use App\Models\Epreuve;
use App\Repositories\Interfaces\EpreuveRepositoryInterface;

class EpreuveRepository implements EpreuveRepositoryInterface {

    public function all() {
        return Epreuve::latest()->get();
    }

    public function create(array $data): Epreuve {
        return Epreuve::create($data);
    }

    public function update(array $data, int $epreuveId): Epreuve {
        $epreuve = $this->findById($epreuveId);
        $epreuve->update($data);
        return $epreuve;
    }

    public function delete(int $epreuveId): bool {
        $epreuve = $this->findById($epreuveId);
        $epreuve->delete();
        return true;
    }

    public function findById(int $id): Epreuve {
        return Epreuve::findOrFail($id);
    }
}

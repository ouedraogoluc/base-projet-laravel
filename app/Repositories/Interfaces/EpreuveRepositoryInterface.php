<?php

namespace App\Repositories\Interfaces;

use App\Models\Epreuve;

interface EpreuveRepositoryInterface {
    public function all();
    public function create(array $data): Epreuve;
    public function update(array $data, int $id): Epreuve;
    public function delete(int $id): bool;
    public function findById(int $id): Epreuve;
}

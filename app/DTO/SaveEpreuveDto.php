<?php

namespace App\DTO;

class SaveEpreuveDto
{
  public function __construct(
    public int $id,
    public string $libelle,

  ) {}
}

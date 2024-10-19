<?php

namespace App\DTO;

class SaveCustomerAccountDto
{
  public function __construct(
    public int $id,
    public float $amount,
    public int $customerId,
  ) {}
}

<?php

namespace App\DTO;

class SaveCustomerDto extends SaveUserDto
{
  public function __construct(
    public string $id,
    public string $name,
    public string $email,
    public string $phone,
    public string $address,
    public string $gender,
    public string $job
  ) {
    parent::__construct($id, $name, $email, $phone, $address, $gender);
  }
}

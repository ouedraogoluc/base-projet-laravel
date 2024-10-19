<?php

namespace App\DTO;

class SaveUserDto
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $phone,
        public string $address,
        public string $gender
    ) {
    }
}

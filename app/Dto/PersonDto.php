<?php

namespace App\Dto;

class PersonDto
{
    public function __construct(
        public readonly ?int    $personId = null,
        public readonly ?string $name = null,
        public readonly ?int    $age = null,
    )
    {
    }
}

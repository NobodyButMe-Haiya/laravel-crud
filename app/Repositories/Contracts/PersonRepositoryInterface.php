<?php

namespace App\Repositories\Contracts;

use App\Dto\PersonDto;
use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;

interface PersonRepositoryInterface
{
    public function add(PersonDto $dto): Person;
    // Change return type to Illuminate\Database\Eloquent\Collection
    public function getAll(): Collection;
    // Change return type to Illuminate\Database\Eloquent\Collection
    public function search(?string $search = null): Collection;
    public function update(PersonDto $dto): Person;
    public function remove(PersonDto $dto): bool;
}

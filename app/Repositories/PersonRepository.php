<?php

namespace App\Repositories;

use App\Dto\PersonDto;
use App\Models\Person;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PersonRepository implements PersonRepositoryInterface
{
    public function add(PersonDto $dto): Person
    {
        return DB::transaction(function () use ($dto) {
            return Person::create([
                'name' => $dto->name,
                'age' => $dto->age
            ]);
        });
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Person::all();  // Returns a collection of Person models
    }
    public function search(?string $search = null): \Illuminate\Database\Eloquent\Collection
    {
        $query = Person::query();

        if ($search && strlen($search) >= 2) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->get();
    }
    public function update(PersonDto $dto): Person
    {
        $person = $this->findOrFail($dto->personId);
        $person->update([
            'name' => $dto->name,
            'age' => $dto->age,
        ]);
        return $person;
    }
    public function remove(PersonDto $dto): bool
    {
        $person = $this->findOrFail($dto->personId);
        return $person->delete();
    }
    public function findOrFail(int $personId): Person
    {
        return Person::find($personId,'personId');
    }
}

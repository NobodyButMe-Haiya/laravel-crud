<?php

namespace App\Http\Controllers\Api;

use App\Dto\PersonDto;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\PersonRepositoryInterface;
use App\Services\Contracts\PersonServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    protected  PersonRepositoryInterface $person;
    public function __construct(PersonRepositoryInterface $person)
    {
        $this->person = $person;
    }
    /**
     * Create a new person.
     * @param Request $request
     * @return JsonResponse
     */
    public function add(Request $request): \Illuminate\Http\JsonResponse
    {
        $person = $this->person->add(new PersonDto(
            personId: $request->input('id'),
            name: $request->input('name'),
            age: $request->input('age'),
        ));

        return response()->json([
            'success' => true,
            'key' => $person->personId
        ]);
    }

    public function read(): JsonResponse
    {
        return response()
            ->json($this->person
                        ->getAll());
    }
    public function search(Request $request): JsonResponse
    {

        $searchTerm = trim(strip_tags($request->input('search', '')));

        if (strlen($searchTerm) < 2) {
            return response()->json([
                'error' => 'Search term must be at least 2 characters.'
            ], 400);
        }

        return response()->json(
            $this->person->search($searchTerm)
        );
    }

    /**
     * Update an existing person.
     * @param Request $request $request
     * @return JsonResponse
     */
    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $person = $this->person->update(new PersonDto(
            personId: $request->input('personId'),
            name: $request->input('name'),
            age: $request->input('age'),
        ));

        return response()->json([
            'success' => true,
            'message' => 'Updated.',
            'data' => $person,
        ]);
    }

    /**
     * Remove a person.
     * @param Request $request $request
     * @return JsonResponse
     */
    public function remove(Request $request): \Illuminate\Http\JsonResponse
    {
        $key = $request->input('personId');
        if($key != null) {
            $this->person->remove(new PersonDto(
                personId: $key
            ));
            return response()->json(['success' => true]);
        }else {
            return response()->json(['success'=>false]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonController extends Controller
{
    /**
     * Lista todas as pessoas.
     * GET /api/people
     */
    public function index()
    {
        return response()->json(Person::all(), Response::HTTP_OK);
    }

    /**
     * Cria uma nova pessoa.
     * POST /api/people
     */
    public function store(StorePersonRequest $request)
    {
        $person = Person::create($request->validated());
        
        return response()->json($person, Response::HTTP_CREATED);
    }

    /**
     * Exibe uma pessoa específica.
     * GET /api/people/{person}
     */
    public function show(Person $person)
    {
        return response()->json($person);
    }

    /**
     * Atualiza uma pessoa existente.
     * PUT/PATCH /api/people/{person}
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $person->update($request->validated());

        return response()->json($person, Response::HTTP_OK);
    }

    /**
     * Remove uma pessoa.
     * DELETE /api/people/{person}
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
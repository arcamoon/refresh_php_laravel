<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    private $names = [
        1 => ['name' => 'ana', 'age' => 30],
        2 => ['name' => 'anibal', 'age' => 28],
        3 => ['name' => 'rodrigo', 'age' => 28],
    ];
    public function get(int $id = 0)
    {
        if (isset($this->names[$id])) {
            return response()->json([
                'success' => true,
                'message' => 'Hola',
                'id' => $id,
            ]);
        } else {
            return response()->json(["error" => "Persona no existente"], Response::HTTP_NOT_FOUND);
        }
    }

    public function getAll()
    {
        return response()->json($this->names);
    }

    public function create(Request $request)
    {
        $person = [
            "id" => count($this->names) + 1,
            "name" => $request->input('name'),
            "age" => $request->input('age'),
        ];

        $this->names[$person['id']] = $person;

        return response()->json(['message' => 'Persona creada', "person" => $person], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {
        if (isset($this->names[$id])) {
            $this->names[$id]['name'] = $request->input('name', 'Rodrigo');
            $this->names[$id]['age'] = $request->input('age', $this->names[$id]['age']);

            return response()->json(['message' => 'Persona actualizada', 'person' => $this->names[$id]]);
        }

        return response()->json(["error" => "Persona no existente"], Response::HTTP_NOT_FOUND);
    }

    public function delete(int $id)
    {
        if (isset($this->names[$id])) {
            unset($this->names[$id]);
            return response()->json(['message' => 'Persona eliminada exitosamente']);
        }
        return response()->json(["error" => "Persona no existente"], Response::HTTP_NOT_FOUND);
    }
}

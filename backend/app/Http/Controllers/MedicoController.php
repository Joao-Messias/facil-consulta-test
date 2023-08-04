<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Http\Resources\MedicoResource;
use App\Http\Resources\MedicoWithoutTimestampsResource;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index(): object
    {
        try {
            $medicos = Medico::all();
            if ($medicos->isEmpty()) {
                return response()->json(['message' => 'Nenhum médico encontrado'], 404);
            }
            return response()->json(MedicoWithoutTimestampsResource::collection($medicos));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function store(MedicoRequest $request)
    {
        try {
            $medico = Medico::create($request->all());
            return response()->json(new MedicoResource($medico), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

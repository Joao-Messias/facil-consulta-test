<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function store(PacienteRequest $request)
    {
        try {
            $paciente = Paciente::create($request->all());
            return response()->json(new PacienteResource($paciente), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update($id, UpdatePacienteRequest $request)
    {
        try {
            $paciente = Paciente::findOrFail($id);
            $paciente->update($request->all());
            return response()->json(new PacienteResource($paciente), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

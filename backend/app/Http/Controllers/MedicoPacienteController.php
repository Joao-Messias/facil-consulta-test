<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoPacienteRequest;
use App\Http\Resources\MedicoPacienteResource;
use App\Http\Resources\PacienteResource;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class MedicoPacienteController extends Controller
{
    public function index($id): object // SOMENTE AUTENTICADO
    {
        try {
            $medicos = Medico::with('pacientes')->findOrFail($id);
            if (!$medicos) {
                return response()->json(['message' => 'Médico não encontrado'], 404);
            }
            if ($medicos->pacientes->isEmpty()) {
                return response()->json(['message' => 'Médico não possui pacientes'], 404);
            }
            return response()->json(PacienteResource::collection($medicos->pacientes));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function vincularPaciente(MedicoPacienteRequest $request): object // SOMENTE AUTENTICADO
    {
        try {
            $medico = Medico::find($request->medico_id);

            if (!$medico) {
                return response()->json(['message' => 'Médico não encontrado'], 404);
            }
            $paciente = Paciente::find($request->paciente_id);
            if (!$paciente) {
                return response()->json(['message' => 'Paciente não encontrado'], 404);
            }
            if ($medico->pacientes->contains($paciente)) {
                return response()->json(['message' => 'Paciente já está vinculado a este médico'], 400);
            }
            $medico->pacientes()->attach($paciente);

            return response()->json(new MedicoPacienteResource($medico, $paciente));

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

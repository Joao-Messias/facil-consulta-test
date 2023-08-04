<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedicoCidadeResource;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoCidadeController extends Controller
{
    public function buscaMedicosPorCidade($id_cidade): object
    {
        try {
            $medicos = Medico::where('cidade_id', $id_cidade)->get();
            if ($medicos->isEmpty()) {
                return response()->json(['message' => 'Nenhum médico encontrado'], 404);
            }
            return response()->json(MedicoCidadeResource::collection($medicos));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

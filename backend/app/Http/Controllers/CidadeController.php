<?php

namespace App\Http\Controllers;

use App\Http\Resources\CidadeResource;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function index(): object
    {
        try {
            $cidades = Cidade::all();
            if ($cidades->isEmpty()) {
                return response()->json(['message' => 'Nenhuma cidade encontrada'], 404);
            }
            return response()->json(CidadeResource::collection($cidades));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

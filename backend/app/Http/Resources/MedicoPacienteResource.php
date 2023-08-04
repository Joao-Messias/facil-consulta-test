<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicoPacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'medico' => [
                'id' => $this->id,
                'nome' => $this->nome,
                'especialidade' => $this->especialidade,
                'cidade_id' => $this->cidade_id,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                'deleted_at' => $this->deleted_at,
            ],
            'paciente' => [
                'id' => $this->id,
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'celular' => $this->celular,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                'deleted_at' => $this->deleted_at,
            ],
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->formatarCpf($this->cpf),
            'celular' => $this->formatarCelular($this->celular),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'deleted_at' => $this->deleted_at ?? null,
        ];
    }

    private function formatarCpf($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', (string)$cpf);
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }

    private function formatarCelular($celular)
    {
        $celular = preg_replace('/[^0-9]/', '', (string)$celular);
        return '(' . substr($celular, 0, 2) . ') ' . substr($celular, 2, 5) . '-' . substr($celular, 7);
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicoWithoutTimestampsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nome' => $this->nome,
            'especialidade' => $this->especialidade,
            'cidade_id' => $this->cidade_id,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
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
            'especialidade' => $this->especialidade,
            'cidade_id' => $this->cidade_id,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
            'deleted_at' => $this->deleted_at ?? null
        ];
    }
}

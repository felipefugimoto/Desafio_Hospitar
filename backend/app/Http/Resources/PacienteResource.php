<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'nome'=> $this->nome,
            'nascimento'=> $this->nascimento,
            'codigo'=> $this->codigo,
            'guia'=> $this->guia,
            'entrada'=> $this->entrada,
            'saida'=> $this->saida
        ];
    }
}

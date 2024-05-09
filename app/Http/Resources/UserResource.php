<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'anggota_id' => $this->anggota_id,
            'jumlah_pinjaman' => $this->pinjaman()->sum('jumlah'),
            'jumlah_simpanan' => $this->simpanan()->whereStatus(true)->sum('jumlah'),

            'pinjaman' => PinjamanResource::collection($this->whenLoaded('pinjaman')),
            'simpanan' => SimpananResource::collection($this->whenLoaded('simpanan')),
        ];
    }
}

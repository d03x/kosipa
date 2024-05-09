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
            'pinjaman_count' => $this->pinjaman()->count(),
            'simpanan_count' => $this->simpanan()->whereStatus(true)->count(),

            'pinjaman' => PinjamanResource::collection($this->whenLoaded('pinjaman')),
            'simpanan' => SimpananResource::collection($this->whenLoaded('simpanan')),
        ];
    }
}

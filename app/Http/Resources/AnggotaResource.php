<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Anggota */
class AnggotaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'nama' => $this->nama,
            'no_telepon' => $this->no_telepon,
            'email' => $this->email,
            'agama' => $this->agama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'User' => new UserResource($this->whenLoaded('user')),
        ];
    }
}

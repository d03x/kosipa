<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Simpanan */
class SimpananResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'jumlah' => $this->jumlah,
            'status' => $this->status,
            'tanggal' => $this->tanggal->format('d-M-Y'),
            'keterangan' => $this->keterangan,
            'jenis_simpanan_id' => $this->jenis_simpanan_id,
            'user_id' => $this->user_id,
            'jenisSimpanan' => new JenisSimpananResource($this->whenLoaded('jenisSimpanan')),
            'user' => $this->user,
        ];
    }
}

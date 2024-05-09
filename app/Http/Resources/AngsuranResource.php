<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Angsuran */
class AngsuranResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'no' => $this->no,
            'jumlah' => $this->jumlah,
            'keterangan' => $this->keterangan,
            'ke' => $this->ke,
            'status' => $this->status,
            'waktu_bayar' => $this->waktu_bayar,

            'pinjaman_id' => $this->pinjaman_id,

            'pinjaman' => new PinjamanResource($this->whenLoaded('pinjaman')),
        ];
    }
}

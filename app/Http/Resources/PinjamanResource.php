<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Pinjaman */
class PinjamanResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'jumlah' => $this->jumlah,
            'bunga' => $this->bunga,
            'tenor' => $this->tenor,
            'tanggal_jatuh_tempo' => $this->tanggal_jatuh_tempo,
            'tanggal' => $this->tanggal,
            'angsuran_per_bln' => $this->angsuran_per_bln,
            'sisa_pinjaman' => $this->sisa_pinjaman,
            'keterangan' => $this->keterangan,
            'biaya_admin' => $this->biaya_admin,
            'user_id' => $this->user_id,
            "user" => new UserResource($this->whenLoaded('user')),
        ];
    }
}

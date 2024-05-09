<?php

namespace App\Services\Anggota;

use Illuminate\Support\Facades\Auth;

class AnggotaService
{
    public function getStatistic()
    {
        $user = Auth::user();
        $jumlah_simpanan = array_sum($user->simpanan()->whereStatus(true)->pluck('jumlah')->toArray());
        return [
            'jumlah_simpanan' => $jumlah_simpanan,
            'jumlah_pinjaman' => 0,
        ];
    }
}

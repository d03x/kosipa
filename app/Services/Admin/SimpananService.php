<?php

namespace App\Services\Admin;

use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SimpananService
{
    public function getStatistic()
    {
        $jumlah_simpanan = array_sum(Simpanan::whereStatus(true)->pluck('jumlah')->toArray());
        return [
            'jumlah_simpanan' => $jumlah_simpanan,
            'jumlah_pinjaman' => 0,
            'jumlah_anggota' => User::count(),
        ];
    }
}

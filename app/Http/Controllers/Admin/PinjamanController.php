<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnggotaResource;
use App\Http\Resources\PinjamanResource;
use App\Models\Anggota;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjaman = PinjamanResource::collection(Pinjaman::with('user')->get());
        $anggota = AnggotaResource::collection(Anggota::with('user')->get());
        return Inertia::render("Admin/Pinjaman/Index",compact('pinjaman','anggota'));
    }

    public function store(Request $request){
        //jumlah pinjaman
       $jumlahPinjaman = (int) $request->jumlah;
       $bunga = (double) $request->bunga;
       $tenor = (int) $request->tenor;

        dd(\App\HitungBunga::kalkulasiEfektif($jumlahPinjaman,$bunga,$tenor));


    }
}

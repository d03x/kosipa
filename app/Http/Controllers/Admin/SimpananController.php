<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnggotaResource;
use App\Http\Resources\JenisSimpananResource;
use App\Http\Resources\SimpananResource;
use App\Models\Anggota;
use App\Models\JenisSimpanan;
use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SimpananController extends Controller
{
    public function index()
    {
        return Inertia::render("Admin/Simpanan/Index",[
            'simpanan' => SimpananResource::collection(Simpanan::with(['user','jenisSimpanan'])->get()),
            'anggota' => AnggotaResource::collection(Anggota::with('user')->get()),
            'jenis_simpanan' => JenisSimpananResource::collection(JenisSimpanan::all())
        ]);
    }
    public function confirm(Simpanan $simpanan, Request $request){
        $simpanan->update([
            'status' => !$simpanan->status,
        ]);
        return Redirect::back();
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'jumlah' => 'required',
            'user_id' => "required",
            'jenis_simpanan_id' => 'required'
        ]);
        Simpanan::create([
            ...$data,
            'tanggal' => now(),
            'keterangan' => '-',
            'status'=> true,
         ]);
    }
}

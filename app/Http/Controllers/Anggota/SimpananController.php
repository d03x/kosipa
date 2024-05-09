<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Resources\JenisSimpananResource;
use App\Http\Resources\SimpananResource;
use App\Models\JenisSimpanan;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SimpananController extends Controller
{
    public function index(Request $request)
    {
        $simpanan = SimpananResource::collection(
            Simpanan::with(['jenisSimpanan'])->where('user_id',Auth::id())
                ->get()
        );
        $jenisSimpanan = JenisSimpananResource::collection(JenisSimpanan::all());
        return Inertia::render('Anggota/Simpanan/Index',
            compact('simpanan','jenisSimpanan')
        );
    }
    public function store(Request $request){
        $data = $request->validate([
            'jenis_simpanan_id' => "required|numeric",
            'jumlah' => "required",
            'keterangan' => "nullable"
        ]);
        try{
            Auth::user()->simpanan()->create([
                ...$data,
                'status' =>false,
                'tanggal' => now(),
            ]);
        }catch(\Exception $e) {
            Log::error($e->getMessage());
        }
        return \redirect()->route('anggota.simpanan');
    }
}

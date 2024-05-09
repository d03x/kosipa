<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjamanAnggota = Auth::user()->pinjaman()->get();

        return Inertia::render('Anggota/Pinjaman/Index', [
            'pinjaman' => $pinjamanAnggota,
        ]);
    }
}

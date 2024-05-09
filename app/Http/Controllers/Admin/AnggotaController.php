<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnggotaResource;
use App\Models\Anggota;
use Inertia\Inertia;

class AnggotaController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Anggota/Index',[
            'anggota' => AnggotaResource::collection(Anggota::with('user')->get()),
        ]);
    }
}

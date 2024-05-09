<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PinjamanController extends Controller
{
    public function index()
    {
        return Inertia::render('Anggota/Pinjaman/Index');
    }
}

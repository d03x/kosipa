<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Services\Anggota\AnggotaService;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(AnggotaService $pinjamanService)
    {
        return Inertia::render('Index',[
            'statistik'  => $pinjamanService->getStatistic(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\SimpananService;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(SimpananService $simpananService)
    {
        return Inertia::render('Admin/Index',[
            'statistik' => $simpananService->getStatistic()
        ]);
    }
}

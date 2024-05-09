<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\SimpananResource;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SimpananController extends Controller
{
    public function index()
    {
        return Inertia::render("Admin/Simpanan/Index",[
            'simpanan' => SimpananResource::collection(Simpanan::with(['user','jenisSimpanan'])->get()),

        ]);
    }
    public function confirm(Simpanan $simpanan, Request $request){
        $simpanan->update([
            'status' => !$simpanan->status,
        ]);
        return Redirect::back();
    }
}

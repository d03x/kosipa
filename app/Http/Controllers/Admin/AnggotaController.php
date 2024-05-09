<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnggotaResource;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AnggotaController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Anggota/Index', [
            'anggota' => AnggotaResource::collection(Anggota::with('user')->get()),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_telepon' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'akun.password' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $user = User::query();
            $anggota = Anggota::query();
            // angota
            $anggota = $anggota->create([
                'nama' => $data['nama'],
                 'no_telepon' => $data['no_telepon'],
                 'email' => $data['email'],
                 'agama' => 'ISLAM',
                 'jenis_kelamin' => $data['jenis_kelamin'],
                 'alamat' => $data['alamat'],
              ]);
            // pertama simpan dulu user
            $user->create([
                 'anggota_id' => $anggota->id,
                 'name' => $data['nama'],
                 'role' => 'anggota',
                 'email' => $data['email'],
                 'password' => Hash::make($data['akun']['password']),
             ]);
             DB::commit();
             return Redirect::back()->withInput()->withErrors([
                'success' => true,
             ]);
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}

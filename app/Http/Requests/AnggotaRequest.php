<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nama' => ['required'],
            'no_telp' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'pekerjaan' => ['required'],
            'jenis_kelamin' => ['required'],
            'tanggal_gabung' => ['required'],
            'alamat' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

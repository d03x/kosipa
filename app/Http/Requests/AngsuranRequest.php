<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AngsuranRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pinjaman_id' => ['required', 'exists:pinjamans'],
            'no' => ['required'],
            'jumlah' => ['required'],
            'keterangan' => ['required'],
            'ke' => ['required'],
            'status' => ['required'],
            'waktu_bayar' => ['required', 'date'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}

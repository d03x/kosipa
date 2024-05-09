<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjamans';
    protected $fillable = [
        'jumlah',
        'user_id',
        'bunga',
        'tenor',
        'tanggal_jatuh_tempo',
        'tanggal',
        'angsuran_per_bln',
        'sisa_pinjaman',
        'keterangan',
        'biaya_admin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts()
    {
        return [
            'tanggal_jatuh_tempo' => 'date',
            'tanggal' => 'date',
        ];
    }
}

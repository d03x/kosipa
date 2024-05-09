<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    protected $fillable = [
        'pinjaman_id',
        'no',
        'jumlah',
        'keterangan',
        'ke',
        'status',
        'waktu_bayar',
    ];

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }

    protected function casts()
    {
        return [
            'waktu_bayar' => 'datetime',
        ];
    }
}

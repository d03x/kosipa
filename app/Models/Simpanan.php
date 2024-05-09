<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Simpanan extends Model
{
    protected $fillable = [
        'jenis_simpanan_id',
        'id',
        'jumlah',
        'status',
        'tanggal',
        'user_id',
        'keterangan',
    ];

    /**
     * @return BelongsTo
     */
    public function jenisSimpanan() : BelongsTo
    {
        return $this->belongsTo(JenisSimpanan::class);
    }

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @var string[]
     */
    protected $casts = ['tanggal' => 'date:d-M-Y','status'=>"boolean"];
}

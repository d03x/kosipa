<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSimpanan extends Model
{
    protected $fillable = [
        'id',
        'nama',
    ];
    public function simpanan(){
        return $this->hasMany(Simpanan::class);
    }
}

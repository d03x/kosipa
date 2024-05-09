<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';
    protected $fillable = [
        'nama',
        'no_telp',
        'email',
        'pekerjaan',
        'jenis_kelamin',
        'tanggal_gabung',
        'alamat',
    ];
    public function user(){
        return $this->hasOne(User::class);
    }
}

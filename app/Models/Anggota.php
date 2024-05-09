<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';
    protected $fillable = [
        'nama',
        'no_telepon',
        'email',
        'agama',
        'pekerjaan',
        'jenis_kelamin',
        'alamat',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}

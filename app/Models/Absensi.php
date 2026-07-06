<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'mahasiswa_id',
    'tanggal',
    'jam',
    'status',
])]
class Absensi extends Model
{
    protected $table = 'absensi';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
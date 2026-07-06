<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'nim',
    'nama',
    'email',
    'no_hp',
    'kelas_id',
    'qr_code',
    'qr_token',
])]
class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    public function absensi()
{
    return $this->hasMany(Absensi::class);
}
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }
}
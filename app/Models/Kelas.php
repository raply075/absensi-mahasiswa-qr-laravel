<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'kode',
    'nama',
    'angkatan',
])]
class Kelas extends Model
{
    public function mahasiswa(): HasMany
{
    return $this->hasMany(Mahasiswa::class);
}
}
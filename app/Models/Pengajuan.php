<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan_dospem';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,'mhs_nim','nim');
    }

    public function scopeUnverified($query)
    {
        return $query->where('status',0);
    }
}

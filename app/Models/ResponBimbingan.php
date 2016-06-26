<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponBimbingan extends Model
{
    protected $table = 'respon_bimbingan';

    public function dosen()
    {
        return $this->belongsTo(Pegawai::class,'dosen_nip');
    }
}

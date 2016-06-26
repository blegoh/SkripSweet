<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';

    public function pengajuanDosPem()
    {
        return $this->hasMany(Pengajuan::class,'mhs_nim');
    }

    public function sempro()
    {
        return $this->hasMany(Sempro::class,'mhs_nim');
    }

    public function dosenPembimbing()
    {
        return $this->belongsToMany(Pegawai::class,'dospem','mhs_nim','dosen_nip');
    }

    public function bimbingans()
    {
        return $this->hasMany(Bimbingan::class,'mhs_nim','nim');
    }

    public function scopePengaju($query)
    {
        return $query
            ->select('nim','nama')
            ->distinct()
            ->join('pengajuan_dospem', 'pengajuan_dospem.mhs_nim', '=', 'mahasiswa.nim');
    }

}

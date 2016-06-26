<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    protected $table = 'bimbingan';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,'mhs_nim');
    }

    public function respons()
    {
        return $this->hasMany(ResponBimbingan::class,'bimbingan_id');
    }

    public function respon($nip)
    {
        
    }

    public function isResponed($nip)
    {
        $count = $this->respons()->where('dosen_nip',$nip)->get()->count(); //> 0
        if($count > 0 ){
            return true;
        }
        return false;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Illuminate\Support\Collection;

class Pegawai extends Model
{
    private $bimbingan;
    protected $table = 'pegawai';
    protected $primaryKey = 'nip';

    public function mahasiswaBimbingan()
    {
        return $this->belongsToMany(Mahasiswa::class,'dospem','dosen_nip','mhs_nim')->withPivot('jenis');
    }


    public function bimbingans()
    {
        $mhs = new Collection();
        foreach ($this->mahasiswaBimbingan as $m) {
            $pengajuan = Pengajuan::where('mhs_nim',$m->nim)->get()->first();
            if ($pengajuan->status == 1){
                $mhs->push(Mahasiswa::find($pengajuan->mhs_nim));
            }
        }
        return $mhs;

    }

    public function isiBimbingan($status)
    {
        $this->bimbingan = new Collection();
        $bimbingans =  DB::table('bimbingan as b')
            ->join('mahasiswa as m', 'b.mhs_nim', '=', 'm.nim')
            ->join('dospem as dp', 'm.nim', '=', 'dp.mhs_nim')
            ->select('b.*')
            ->where('dp.dosen_nip',Auth::user()->pegawai->nip);
        if ($status == 0){
            $bimbingans->whereRaw("(SELECT COUNT(*) FROM respon_bimbingan WHERE dosen_nip = dp.dosen_nip AND bimbingan_id = b.id) = 0");
        }else{
            $bimbingans->whereRaw("(SELECT COUNT(*) FROM respon_bimbingan WHERE dosen_nip = dp.dosen_nip AND bimbingan_id = b.id) = 1");
        }
        //$bimbingans->get();
        foreach ($bimbingans->get() as $bimbingan) {
            $this->bimbingan->push(Bimbingan::find($bimbingan->id));
        }
    }

    /**
     * @param int $status
     * @return mixed
     * untuk mengambil bimbingan yg dilakukan mahasiswa
     */
    public function bimbingan($status = 0)
    {
        $this->isiBimbingan($status);
        return $this->bimbingan;
    }

}

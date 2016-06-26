<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 09/06/16
 * Time: 7:54
 */

namespace App\Models;

use DB;


class Dosen
{

    public static function all(){
        $userDosens = DB::table('role_user')->where('role_id', 2)->get();
        $idUser = [];
        foreach ($userDosens as $userDosen){
            $idUser[] = $userDosen->user_id;
        }
        return Pegawai::whereIn('user_id',$idUser)->get();
    }

    public static function whichDospem($dosen,$mhs)
    {
        $dospem = DB::table('dospem')
            ->where('dospem_nip',$dosen)
            ->where('mhs_nim',$mhs)
            ->get()->first();
        return $dospem->jenis;
    }

}
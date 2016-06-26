<?php
/**
 * Created by PhpStorm.
 * User: blegoh
 * Date: 09/06/16
 * Time: 20:39
 */

namespace App\Models;

use DB;


class Kombi
{

    public static function all(){
        $userKombis = DB::table('role_user')->where('role_id', 3)->get();
        $idUser = [];
        foreach ($userKombis as $userKombi){
            $idUser[] = $userKombi->user_id;
        }
        return Pegawai::whereIn('user_id',$idUser)->get();
    }

}
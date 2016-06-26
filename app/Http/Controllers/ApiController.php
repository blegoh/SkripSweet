<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public function dosen($id)
    {
        $pegawai = Pegawai::find($id);
        return $pegawai->bimbingans()->count();
    }
}

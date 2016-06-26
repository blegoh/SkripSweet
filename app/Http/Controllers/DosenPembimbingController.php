<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pegawai;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class DosenPembimbingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showFormPengajuan()
    {
        $dosens = Dosen::all();
        return view('pengajuan.dosenpembimbing',compact('dosens'));
    }

    public function pengajuanDosPem(Request $request)
    {
        $mhs = Auth::user()->mahasiswa;
        $pengajuan = new Pengajuan();
        $pengajuan->mhs_nim = $mhs->nim;
        $pengajuan->judul = $request->input('judul');
        $fileName = $mhs->nim.".".$request->file('proposal')->getClientOriginalExtension();
        $pengajuan->draft_proposal = $fileName;
        $pengajuan->save();

        $request->file('proposal')->move(public_path('draft-proposal'),$fileName);

        $dosen1 = Pegawai::find($request->input('pembimbing1'));
        $dosen2 = Pegawai::find($request->input('pembimbing2'));
        $mhs->dosenPembimbing()->attach($dosen1,['jenis' => 'pembimbing 1']);
        $mhs->dosenPembimbing()->attach($dosen2,['jenis' => 'pembimbing 2']);
        return redirect()->route('home');
    }

    public function listPengaju()
    {
        $pengaju = Pengajuan::unverified()->get();
        return view('kombi.list-pengaju',compact('pengaju'));
    }

    public function showFormAddDospem($id)
    {
        $pengajuan = Pengajuan::find($id);
        $dosens = Dosen::all();
        return view('kombi.add-dosenpembimbing',compact('dosens','pengajuan'));
    }

    public function addDospem($id,Request $request)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->status = 1;
        $pengajuan->update();
        $mhs = $pengajuan->mahasiswa;
        $mhs->dosenPembimbing()->detach();
        $dosen1 = Pegawai::find($request->input('pembimbing1'));
        $dosen2 = Pegawai::find($request->input('pembimbing2'));
        $mhs->dosenPembimbing()->attach($dosen1,['jenis' => 'pembimbing 1']);
        $mhs->dosenPembimbing()->attach($dosen2,['jenis' => 'pembimbing 2']);
        return redirect()->route('home');
    }

}

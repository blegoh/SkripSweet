<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Sempro;
use Illuminate\Http\Request;

use App\Http\Requests;

class SemproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosens = Dosen::all();
        return view('pengajuan.sempro',compact('dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sempro = new Sempro();
        $sempro->mhs_nim = auth()->user()->mahasiswa->nim;
        $sempro->judul_id = $request->input('judul_id');
        $sempro->judul_en = $request->input('judul_en');
        $sempro->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function aprove($id)
    {
        $dosen = auth()->user()->pegawai();
        $sempro = Sempro::find($id);
        $jenis = Dosen::whichDospem($dosen->nip,$sempro->mhs_nip);
        if ($jenis == 'pembimbing 1'){
            $sempro->aproved_dospem1 = true;
        }else{
            $sempro->aproved_dospem2 = true;
        }
        $sempro->save();
    }

    public function execute()
    {

    }
}

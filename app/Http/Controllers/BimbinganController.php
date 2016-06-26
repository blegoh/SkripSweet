<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\ResponBimbingan;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class BimbinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bimbingans = Auth::user()->mahasiswa->bimbingans;
        return view('mahasiswa.bimbingan.index',compact('bimbingans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.bimbingan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bimbingan = new Bimbingan();
        $bimbingan->perihal = $request->input('perihal');
        $bimbingan->isi = $request->input('isi');
        $bimbingan->mhs_nim = Auth::user()->mahasiswa->nim;
        $bimbingan->lampiran = '';
        $bimbingan->save();
        $fileName = $bimbingan->id.".".$request->file('lampiran')->getClientOriginalExtension();
        $bimbingan->lampiran = $fileName;
        $bimbingan->update();
        $request->file('lampiran')->move(public_path('bimbingan-lampiran'), $fileName);
        return redirect('bimbingan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bimbingan = Bimbingan::find($id);
        return view('mahasiswa.bimbingan.detail',compact('bimbingan'));
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

    public function showRespon($bimbinganId,$nip)
    {
        $respon = ResponBimbingan::where('dosen_nip',$nip)->where('bimbingan_id',$bimbinganId)->get()->first();
        return view('mahasiswa.bimbingan.respon',compact('respon','bimbinganId'));
    }
}

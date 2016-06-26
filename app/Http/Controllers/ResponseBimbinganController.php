<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\ResponBimbingan;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class ResponseBimbinganController extends Controller
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
    public function index($status = 0)
    {
        $dosen = Auth::user()->pegawai;
        $bimbingans = $dosen->bimbingan($status);
        return view('dosen.list-bimbingan',compact('bimbingans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        //return $bimbingan->respons()->where('dosen_nip',Auth::user()->pegawai->nip)->get()->count();
        return view('dosen.detail',compact('bimbingan'));
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
        $respon = new ResponBimbingan();
        $respon->respon = $request->input('respon');
        $respon->bimbingan_id = $id;
        $respon->dosen_nip = Auth::user()->pegawai->nip;
        $respon->lampiran = '';
        $respon->save();
        $fileName = $respon->id.".".$request->file('lampiran')->getClientOriginalExtension();
        $respon->lampiran = $fileName;
        $respon->update();
        $request->file('lampiran')->move(public_path('respon-bimbingan'), $fileName);
        return redirect('/respon');
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
}

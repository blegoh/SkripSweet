<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Http\Requests;

class SuratController extends Controller
{
    public function index()
    {
        $data = [];
        //def("DOMPDF_ENABLE_REMOTE", true);
        $pdf = PDF::loadView('pdf.bimbingan', $data);
        $pdf->setPaper('a4', 'portrait');
        //return view('pdf.bimbingan');
        return $pdf->stream();
    }
}

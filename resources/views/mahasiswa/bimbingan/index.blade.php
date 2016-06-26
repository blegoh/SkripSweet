@extends('master')


@section('content')

<div class="page-heading">
    <h1>Bimbingan</h1>
</div>

@if(Auth::user()->mahasiswa->dosenPembimbing()->count() > 0)
    @if(Auth::user()->mahasiswa->pengajuanDosPem->first()->status == 0)
        <div class="page-heading">
            <h2>Menunggu keputusan kombi</h2>
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <a class="btn btn-md btn-primary btn-raised" href="{{url('bimbingan/create')}}">
                                {{Auth::user()->mahasiswa->pengajuanDosPem->first()->status}}
                                Bimbingan baru
                            </a>
                            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                            <div class="options">

                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table m-n">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Perihal</th>
                                    <th style="width:15%;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 1)
                                @foreach($bimbingans as $bimbingan)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$bimbingan->perihal}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-default btn-raised" href="{{url('bimbingan/'.$bimbingan->id)}}" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya"><i class="fa fa-search"></i></a>
                                            <a class="btn btn-sm btn-warning btn-raised" href="#" data-toggle="tooltip" data-placement="bottom" title="Sunting"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .container-fluid -->
    @endif
@else
    <div class="page-heading">
        <h2>Ajukan Dosen Pembimbing Terlebih Dahulu</h2>
    </div>
@endif

@endsection
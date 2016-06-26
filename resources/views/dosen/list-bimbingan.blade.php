@extends('master')

@section('content')
    <div class="page-heading">
        <h1>Permintaan Bimbingan Baru</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-body">
                        <table class="table m-n">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Perihal</th>
                                <th style="width:8%;">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($bimbingans as $bimbingan)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$bimbingan->mhs_nim}}</td>
                                    <td>{{$bimbingan->mahasiswa->nama}}</td>
                                    <td>{{$bimbingan->perihal}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-default btn-raised" href="{{url('respon/'.$bimbingan->id)}}" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya"><i class="fa fa-search"></i></a>
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

@endsection
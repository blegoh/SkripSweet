@extends('master')

@section('content')

    <div class="page-heading">
        <h1>List Pengajuan Dospem</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                        <div class="options">

                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table m-n">
                            <thead>
                            <tr>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th style="width:15%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pengaju as $pengaju)
                                <tr>
                                    <td>{{$pengaju->mahasiswa->nim}}</td>
                                    <td>{{$pengaju->mahasiswa->nama}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-default btn-raised" href="/pengajuan/dospem/{{$pengaju->id}}" data-toggle="tooltip" data-placement="bottom" title="Detail Pengajuan">
                                            <i class="fa fa-search"></i>
                                        </a>
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

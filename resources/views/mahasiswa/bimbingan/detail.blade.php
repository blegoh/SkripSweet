@extends('master')

@section('content')
    <ol class="breadcrumb">
        <li class="active"><a href="bimbingan.html">Bimbingan</a></li>
        <li>Detail Bimbingan</li>
    </ol>
    <div class="page-heading">
        <h1>Detail Bimbingan</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-xs btn-default" href="{{url('bimbingan')}}"><i class="material-icons">arrow_back</i></a>
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <h2>{{$bimbingan->perihal}}</h2>
                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                    </div>
                    <div class="panel-body">
                        {!! $bimbingan->isi !!}
                    </div>
                    <div class="panel-footer">
                        <span class="text-gray"><em>Lihat Komentar Dosen</em></span><br>
                        @foreach($bimbingan->mahasiswa->dosenPembimbing as $pembimbing)
                            <div class="avatar pull-left m-xs">
                                <a href="{{url('bimbingan/respon/'.$bimbingan->id.'/'.$pembimbing->nip)}}" data-toggle="tooltip" data-placement="bottom" title="{{$pembimbing->nama}}">
                                    <img src="/assets/demo/avatar/avatar_16.png" class="img-responsive img-circle">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- .container-fluid -->
@endsection
@extends('master')

@section('content')
    <div class="page-heading">
        <h1>Komentar Dosen Pembimbing</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-xs btn-default" href="{{url('bimbingan/'.$bimbinganId)}}"><i class="material-icons">arrow_back</i></a>
                @if($respon != null)
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <div class="avatar pull-left mt">
                            <img src="/assets/demo/avatar/avatar_16.png" class="img-responsive img-circle">
                        </div>
                        <span class="label label-primary mt-lg ml-sm">{{$respon->dosen->nama}}</span>
                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                    </div>
                    <div class="panel-body">
                        {!! $respon->respon !!}
                    </div>
                    <div class="panel-footer">
                        Download <a href="/respon-bimbingan/{{$respon->lampiran}}">Lampiran</a>
                    </div>
                </div>
                @else
                <h3>Dosen Belum merespon</h3>
                @endif
            </div>
        </div>

    </div>
    </div>
    <!-- .container-fluid -->
@endsection
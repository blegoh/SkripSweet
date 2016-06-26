@extends('master')

@section('content')
    <div class="page-heading">
        <h1>Pengajuan Tugas Akhir</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-editbox" data-widget-controls=""></div>
                    <div class="panel-heading">
                        <a href="{{url('pengajuan/pengaju')}}" class="btn btn-lg btn-default"><i class="material-icons">arrow_back</i></a>
                    </div>
                    <form action="/pengajuan/dospem/{{$pengajuan->id }}" class="form-horizontal row-border" method="post">
                        {!! csrf_field() !!}
                    <div class="panel-body">

                        <div class="row">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NIM</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" readonly required value="{{$pengajuan->mahasiswa->nim}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" readonly required value="{{$pengajuan->mahasiswa->nama}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Judul Tugas Akhir</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" readonly required value="{{$pengajuan->judul}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Dosen Pembimbing 1</label>
                                    <div class="col-sm-5">
                                        <select name="pembimbing1" id="pembimbing1" class="select form-control" placeholder="This is a placeholder">
                                            <option value="">Dosen Pembimbing 1</option>
                                            @foreach($dosens as $dosen)
                                                <option value="{{$dosen->nip}}" @if($dosen->nip == $pengajuan->mahasiswa->dosenPembimbing[0]->nip) selected @endif>{{$dosen->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="alert alert-warning" id="alert-pembimbing1">Dosen ini membimbing n mahasiswa.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Dosen Pembimbing 2</label>
                                    <div class="col-sm-5">
                                        <select name="pembimbing2" id="pembimbing2" class="select form-control" placeholder="This is a placeholder">
                                            <option value="">Dosen Pembimbing 2</option>
                                            @foreach($dosens as $dosen)
                                                <option value="{{$dosen->nip}}" @if($dosen->nip == $pengajuan->mahasiswa->dosenPembimbing[1]->nip) selected @endif>{{$dosen->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="alert alert-warning" id="alert-pembimbing2">Dosen ini membimbing n mahasiswa.
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button class="btn-raised btn-primary btn">OK</button>
                                <button class="btn-default btn">Batal</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- .container-fluid -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            if($('#pembimbing1').val() != null){
                $.ajax({
                    url: "/api/dosen/"+$('#pembimbing1').val()
                }).done(function(data) {
                    $('#alert-pembimbing1').html("Dosen ini membimbing "+data+" mahasiswa.");
                });
            }
            if($('#pembimbing2').val() != null){
                $.ajax({
                    url: "/api/dosen/"+$('#pembimbing2').val()
                }).done(function(data) {
                    $('#alert-pembimbing2').html("Dosen ini membimbing "+data+" mahasiswa.");
                });
            }
            $('#pembimbing1').change(function () {
                $.ajax({
                    url: "/api/dosen/"+$('#pembimbing1').val()
                }).done(function(data) {
                    $('#alert-pembimbing1').html("Dosen ini membimbing "+data+" mahasiswa.");
                });
            });
            $('#pembimbing2').change(function () {
                $.ajax({
                    url: "/api/dosen/"+$('#pembimbing2').val()
                }).done(function(data) {
                    $('#alert-pembimbing2').html("Dosen ini membimbing "+data+" mahasiswa.");
                });
            });
        });
    </script>
@endsection

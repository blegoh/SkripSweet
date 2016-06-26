@extends('master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-editbox" data-widget-controls=""></div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Auth::user()->mahasiswa->pengajuanDosPem()->count()  == 0)
                        <div class="alert alert-info">
                            <h4>Ajukan 2 Dosen Pembimbing</h4>
                            <p>Pengajuan dosen pembimbing akan dipertimbangkan oleh Kombi. Perolehan dosen pembimbing untuk mahasiswa dapat berubah sesuai dengan keputusan Kombi.</p>
                        </div>
                        <div class="row">
                            <form action="{{url('pengajuan/add')}}" method="post" class="form-horizontal row-border" id="form" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Judul Tugas Akhir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="judul" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Dosen Pembimbing 1</label>
                                    <div class="col-sm-5">
                                        <select name="pembimbing1" id="pembimbing1" class="select form-control" placeholder="This is a placeholder">
                                            <option selected>Dosen Pembimbing 1</option>
                                            @foreach($dosens as $dosen)
                                                <option value="{{$dosen->nip}}">{{$dosen->nama}}</option>
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
                                            <option selected>Dosen Pembimbing 2</option>
                                            @foreach($dosens as $dosen)
                                                <option value="{{$dosen->nip}}">{{$dosen->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="alert alert-warning" id="alert-pembimbing2">Dosen ini membimbing n mahasiswa.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Draft Proposal</label>
                                    <div class="col-sm-8">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
																	<span class="btn btn-default btn-file">
																		<span class="fileinput-new">Pilih file</span>
																		<span class="fileinput-exists">Ganti</span>
																		<input type="file" name="proposal">
																	</span>
                                            <span class="fileinput-filename"></span>
                                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                        </div>
                                    </div>
                                </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" class="btn-raised btn-primary btn">OK</button>
                                        <button class="btn-default btn">Batal</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        @elseif(Auth::user()->mahasiswa->pengajuanDosPem->first()->status == 1)
                            <div class="alert alert-warning">
                                <h4>Sudah memiliki dosen pembimbing</h4>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <h4>Sudah melakukan pengajuan</h4>
                                <p>Menunggu keputusan kombi.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .container-fluid -->


@endsection

@section('script')
    <script src="/assets/plugins/form-jasnyupload/fileinput.min.js"></script>
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
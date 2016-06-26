@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-editbox" data-widget-controls=""></div>
                    <div class="panel-body">

                        @if(Auth::user()->mahasiswa->pengajuanDosPem()->count()  > 0)
                            @if(Auth::user()->mahasiswa->pengajuanDosPem->first()->status == 1)
                                <div class="alert alert-info">
                                    <h4>Pengajuan Sempro</h4>
                                    <p>Sempro dilaksanakan setelah kedua pembimbing menyetujui</p>
                                </div>
                                <div class="row">
                                    <form action="{{url('pengajuan/sempro/')}}" method="post" class="form-horizontal row-border" id="form" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Judul Indonesia</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="judul_id" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Judul Inggrisr</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="judul_en" class="form-control" required>
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
                            @else
                                <div class="alert alert-warning">
                                    <h4>Belum mendapat dosen pembimbing</h4>
                                </div>
                            @endif


                        @else
                            <div class="alert alert-warning">
                                <h4>Ajukan dosen pembimbing terlebih dahulu</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .container-fluid -->
@endsection
@extends('master')

@section('style')
    <link href="/assets/plugins/summernote/dist/summernote.css" type="text/css" rel="stylesheet">
@endsection

@section('content')
    <div class="page-heading">
        <h1>Buat Bimbingan Baru</h1>
    </div>

    <div class="container-fluid pt-md">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inbox">
                    <div class="panel-body">
                        <div class="inbox-mail-heading">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <a href="{{url('bimbingan')}}" class="btn btn-lg btn-default"><i class="material-icons">arrow_back</i></a>
                                </div>

                            </div>
                        </div>
                        <form action="{{url('bimbingan')}}" method="post" role="form" id="inbox-compose-form" class="form-horizontal p-md" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group mb-sm">
                                <div class="col-md-12">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">Perihal:</span>
                                        <input type="text" class="form-control input-lg" value="" id="" name="perihal" required>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-lg">
                                <div class="form-group mb-sm">
                                    <label class="col-sm-1 control-label" style="color:#212121;">Lampiran</label>
                                    <div class="col-sm-11">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename"></span>
                                                </div>
                                                        <span class="input-group-btn">
                                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Pilih file</span>
                                                                <span class="fileinput-exists">Ganti</span>
                                                                <input type="file" name="lampiran">
                                                            </span>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-sm" style="display:none;">
                                <div class="col-md-12"><input type="text" class="form-control"></div>
                            </div>
                            <div class="form-group mb-n">
                                <div class="col-xs-12">
                                    <textarea name="isi" class="composer" id="isi">
                                        <h4>Lorem Ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, nobis laboriosam repellat ipsum deserunt voluptate eos praesentium atque eligendi libero. Nam, id, eligendi natus facilis ullam pariatur numquam amet illum repudiandae ex porro labore in perferendis vero nobis iure ratione? Repudiandae, vel, quo, dolores velit vero debitis sed non odio culpa quasi excepturi tempore saepe atque quod repellendus aliquam eum neque dolorem beatae veniam quis id deserunt dignissimos voluptatum incidunt necessitatibus inventore reprehenderit consequatur esse perferendis ipsum earum pariatur et eaque sequi a harum sit similique itaque dicta expedita unde. Animi, quo, facilis laudantium quas commodi aut harum reprehenderit explicabo.</p>
                                    </textarea>
                                </div>
                            </div>

                        <div class="inbox-mail-footer">
                            <div class="clearfix">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-lg btn-primary btn-raised">Kirim</button>
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
            <script src="/assets/plugins/summernote/dist/summernote.js"></script>  						<!-- Summernote -->


            <script src="/assets/plugins/form-jasnyupload/fileinput.min.js"></script>               			<!-- File Input -->

            {{--<script src="/assets/demo/demo-formcomponents.js"></script>--}}
<!-- KALO MAU PAKE INLINE EDITOR !-->
<script>
    $(document).ready(function() {
        $('#isi').summernote();
    });
</script>
@endsection

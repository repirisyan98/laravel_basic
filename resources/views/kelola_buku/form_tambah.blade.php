@extends('adminlte::page')

@section('title', 'Kelola Buku')

@section('content')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{route('kelola_buku.index')}}"><i
                            class="fa fa-arrow-alt-circle-left"></i></a> {{ __('Form Tambah Buku') }}</div>
                <div class="card-body">
                    <form action="{{route('kelola_buku.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Buku</label>
                            <div class="col-sm-10 col-md-6">
                                <input name="nama_buku" type="text" required class="form-control" id="inputEmail3"
                                    maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Kategori Buku</label>
                            <div class="col-sm-10 col-md-6">
                                <select name="kategori_buku" class="form-control" id="exampleFormControlSelect1"
                                    required>
                                    <option selected disabled value="">-- Pilih Kategori Buku --</option>
                                    <option>Bahasa</option>
                                    <option>Teknologi</option>
                                    <option>Budaya</option>
                                    <option>Agama</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Penerbit</label>
                            <div class="col-sm-10 col-md-6">
                                <input name="penerbit" required type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-10 col-md-3">
                                <input name="tahun_terbit" required type="date" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Cover Buku</label>
                            <div class="col-sm-10 col-md-3">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile"
                                            accept="image/x-png,image/jpeg,image/jpg" name="cover">
                                        <label class="custom-file-label" for="customFile">Pilih Cover</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
$('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $('.custom-file-label').html(fileName);
});
</script>
@stop
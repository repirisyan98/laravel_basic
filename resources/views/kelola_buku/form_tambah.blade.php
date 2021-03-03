@extends('adminlte::page')

@section('title', 'Kelola Buku')

@section('content')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Form Tambah Buku') }}</div>
                <div class="card-body">
                    <form action="{{route('kelola_buku.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Buku</label>
                            <div class="col-sm-10 col-md-6">
                                <input name="nama_buku" type="text" required class="form-control" id="inputEmail3" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Kategori Buku</label>
                            <div class="col-sm-10 col-md-6">
                                <select name="kategori_buku" class="form-control" id="exampleFormControlSelect1" required>
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
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambah</button>
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
console.log('Hi!');
</script>
@stop
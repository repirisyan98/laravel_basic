@extends('adminlte::page')

@section('title', 'Kelola Buku')


@section('content')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Kelola Buku') }}</div>
                <div class="card-body">
                    <a href="{{route('kelola_buku.create')}}" class="btn btn-primary text-decoration-none"
                        style="color: white;">Tambah <i class="fa fa-plus"></i></a>
                    <table class="table mt-4">
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th style="text-align: center;">Aksi</th>
                        @foreach($data as $i)
                        <tr>
                            <td>{{$i->nama}}</td>
                            <td>{{$i->kategori}}</td>
                            <td>{{$i->penerbit}}</td>
                            <td>{{$i->tahun_terbit}}</td>
                            <td style="text-align: center;"><a style="color: white;" class="btn btn-warning"
                                    href="{{route('kelola_buku.edit',$i->id)}}">Ubah</a>
                                <button type="button" style="color: white;" class="btn btn-danger" data-toggle="modal"
                                    data-target="#ModalHapus{{$i->id}}">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
@foreach($data as $i)
<div class="modal fade" id="ModalHapus{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data tersebut ?

                <form action="{{route('kelola_buku.destroy',$i->id)}}" method="post">
                    @csrf
                    @method('DELETE')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
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
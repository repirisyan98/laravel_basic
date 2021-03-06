@extends('adminlte::page')

@section('title', 'Kelola Buku')
@section('content_header')
<h1>Kelola Buku</h1>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Kelola Buku') }}</div>
                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route('kelola_buku.create')}}" class="btn btn-primary text-decoration-none"
                            style="color: white;">Tambah <i class="fa fa-plus"></i></a>
                        <a href="{{route('kelola_buku.print.book')}}" target="_blank"
                            class="btn btn-success text-decoration-none" style="color: white;">Cetak <i
                                class="fa fa-print"></i></a>
                        <a href="{{route('admin.book.export')}}" class="btn btn-secondary text-decoration-none"
                            style="color: white;">Export <i class="fa fa-file-export"></i></a>
                        <a href="#" id="importFile" class="btn btn-secondary text-decoration-none"
                            style="color: white;">Import <i class="fa fa-file-import"></i></a>

                        <form hidden action="{{route('kelola.buku.import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="theFileInput" name="import_file" style="display:none;" />
                            <button type="submit" id="btn_import"></button>
                        </form>
                    </div>

                    <table id="table-data" class="table mt-4 table-hover table-bordered display nowrap"
                        style="width:100%">
                        <thead class="thead-dark text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Cover</th>
                            <th style="text-align: center;">Aksi</th>
                            <?php $no = 1?>
                        </thead>
                        <tbody>
                            @foreach($data as $i)
                            <tr>
                                <td class="align-middle">{{$no++}}</td>
                                <td class="align-middle">{{$i->nama}}</td>
                                <td class="align-middle">{{$i->kategori}}</td>
                                <td class="align-middle">{{$i->penerbit}}</td>
                                <td class="align-middle">{{$i->tahun_terbit}}</td>
                                <td class="align-middle">
                                    <img src="{{Storage::url('img/'.$i->cover)}}" width="100" height="100">
                                </td>
                                <td style="text-align: center;" class="align-middle"><a style="color: white;"
                                        class="btn btn-sm btn-warning" href="{{route('kelola_buku.edit',$i->id)}}"><i
                                            class="fa fa-pencil-alt"></i>&nbspUbah</a>
                                    <button type="button" style="color: white;" class="btn-hapus btn btn-sm btn-danger"
                                        data-toggle="modal" data-id="{{$i->id}}" data-target="#hapusModal"><i
                                            class="fa fa-trash-alt"></i>&nbspHapus</a>
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
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data buku <b><span id="text_buku_hapus"></span></b> ?

                <form method="post" id="form-hapus">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="hapus-id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#importFile').click(function() {
        $('#theFileInput').click();
    });

    $('#theFileInput').change(function() {
       $('#btn_import').click();
    });

    $(".btn-hapus").click(function() {
        let id = $(this).data('id');
        console.log(baseurl + '/admin/ajaxadmin/dataBuku/' + id);
        $.ajax({
            type: "GET",
            url: baseurl + '/admin/ajaxadmin/dataBuku/' + id,
            dataType: 'json',
            success: function(res) {
                $('#hapus-id').val(res.id);
                $('#form-hapus').attr('action', baseurl + '/kelola_buku/' + id);
                $('#text_buku_hapus').text(res.nama);
            },
            error: function(jqXHR) {
                console.log(jqXHR);
            },

        });
    });
});
</script>
@stop
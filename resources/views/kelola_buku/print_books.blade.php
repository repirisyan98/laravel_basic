<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">Data Buku</h1>
    <p class="text-center">Laporan Data Buku Tahun 2021</p>
    <br />
    <table class="table table-bordered text-center">
        <thead class="text-center">
            <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>KATEGORI</th>
                <th>PENERBIT</th>
                <th>TAHUN TERBIT</th>
                <th>COVER</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($books as $book)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $book->nama }}</td>
                <td>{{ $book->kategori }}</td>
                <td>{{ $book->penerbit }}</td>
                <td>{{ $book->tahun_terbit }}</td>
                <td>
                    @if($book->cover !== null)
                    <img src="{{public_path('storage/img/'.$book->cover)}}" width="80px">
                    @else
                    [Gambar tidak tersedia]
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
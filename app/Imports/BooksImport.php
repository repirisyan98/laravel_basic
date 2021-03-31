<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            return new Book([
                'nama' => $row[0],
                'kategori' => $row[1],
                'penerbit' => $row[2],
                'tahun_terbit' => $row[3],
                ]);
    }
}
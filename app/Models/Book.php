<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'penerbit',
        'tahun_terbit',
        'cover',
    ];

    public static function getDataBooks()
    {
        $books = Book::all();
        $books_filter = [];
        $no = 1;
        for ($i=0; $i < $books->count(); $i++) {
            $books_filter[$i]['no'] = $no++;
            $books_filter[$i]['nama'] = $books[$i]->nama;
            $books_filter[$i]['kategori'] = $books[$i]->kategori;
            $books_filter[$i]['penerbit'] = $books[$i]->penerbit;
            $books_filter[$i]['tahun_terbit'] = $books[$i]->tahun_terbit;
        }
        return $books_filter;
    }
}
<?php
namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BooksExport implements FromArray, WithHeadings, ShouldAutoSize{
    public function headings(): array{
    return [
            'No',
            'Judul',
            'Kategori',
            'Penerbit',
            'Tahun Terbit'
        ];
    }
    public function array(): array{
        return Book::getDataBooks();
    }
}
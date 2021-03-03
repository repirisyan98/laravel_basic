<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class KelolaBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __contruct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Book::all();
        return view('kelola_buku.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelola_buku.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Book $book)
    {
        $book = Book::create([
            'nama' => $request->nama_buku,
            'kategori' => $request->kategori_buku,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        $book->save();

        return redirect()->route('kelola_buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $book = Book::find($id);
        return view('kelola_buku.form_edit',compact('book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newdata = Book::find($id);
        $newdata->nama = $request->nama_buku;
        $newdata->kategori = $request->kategori_buku;
        $newdata->penerbit = $request->penerbit;
        $newdata->tahun_terbit = $request->tahun_terbit;
        $newdata->save();

        return redirect(route('kelola_buku.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book::find($id);
        $book->delete();
    
        return redirect(route('kelola_buku.index'));
    }
}
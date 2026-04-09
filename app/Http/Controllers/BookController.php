<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('admin.book.index', compact('books'));
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku'     => 'required|unique:books,kode_buku',
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:255',
            'penerbit'      => 'nullable|string|max:255',
            'tahun_terbit'  => 'nullable|digits:4',
            'status'        => 'required|in:tersedia,dipinjam',
            'deskripsi'     => 'nullable|string',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        return view('admin.book.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'kode_buku'     => 'required|unique:books,kode_buku,' . $book->id,
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:255',
            'penerbit'      => 'nullable|string|max:255',
            'tahun_terbit'  => 'nullable|digits:4',
            'status'        => 'required|in:tersedia,dipinjam',
            'deskripsi'     => 'nullable|string',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')   // Perbaiki route jika perlu
                         ->with('success', 'Buku berhasil dihapus!');
    }

    public function indexUser()
    {
        $books = Book::latest()->paginate(10);
        return view('user.book.index', compact('books'));
    }
}
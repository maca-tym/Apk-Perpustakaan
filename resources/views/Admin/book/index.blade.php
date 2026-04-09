@extends('layouts.admin')

@section('title', 'Kelola Buku')
@section('page-header')
    <h1>Kelola Data Buku</h1>
    <p>Daftar semua buku perpustakaan</p>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Daftar Buku</h2>
        <a href="{{ route('books.create') }}" 
           class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
            + Tambah Buku Baru
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Kode Buku</th>
                    <th class="px-6 py-3 text-left">Judul</th>
                    <th class="px-6 py-3 text-left">Penulis</th>
                    <th class="px-6 py-3 text-left">Penerbit</th>
                    <th class="px-6 py-3 text-center">Tahun</th>
                    <th class="px-6 py-3 text-center">Stok</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-6 py-4 font-mono">{{ $book->kode_buku }}</td>
                    <td class="px-6 py-4">{{ $book->judul }}</td>
                    <td class="px-6 py-4">{{ $book->penulis }}</td>
                    <td class="px-6 py-4">{{ $book->penerbit ?? '-' }}</td>
                    <td class="px-6 py-4 text-center">{{ $book->tahun_terbit ?? '-' }}</td>
                    <td class="px-6 py-4 text-center font-semibold {{ $book->stok < 5 ? 'text-red-600' : '' }}">
                        {{ $book->stok }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('books.edit', $book) }}" 
                           class="text-blue-600 hover:underline mr-3">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus buku ini?')" 
                                    class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-8 text-gray-500">Belum ada data buku</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $books->links() }}
    </div>
</div>
@endsection
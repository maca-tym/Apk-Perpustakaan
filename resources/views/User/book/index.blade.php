@extends('layouts.user')

@section('title', 'Kelola Buku')
@section('page-header')
    <h1>Kelola Data Buku</h1>
    <p>Daftar semua buku perpustakaan</p>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Daftar Buku</h2>
    </div>

    <div class="card overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Kode Buku</th>
                    <th class="px-6 py-3 text-left">Judul</th>
                    <th class="px-6 py-3 text-left">Penulis</th>
                    <th class="px-6 py-3 text-left">Penerbit</th>
                    <th class="px-6 py-3 text-center">Tahun</th>
                    <th class="px-6 py-3 text-center">Status</th>
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
                    
                    <!-- STATUS -->
                    <td class="px-6 py-4 text-center">
                        @if($book->status === 'tersedia')
                            <span class="bg-green-100 text-green-700 px-4 py-1.5 rounded-full text-sm font-medium">
                                Tersedia
                            </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-4 py-1.5 rounded-full text-sm font-medium">
                                Dipinjam
                            </span>
                        @endif
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
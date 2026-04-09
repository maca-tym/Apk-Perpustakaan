@extends('layouts.user')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between mb-6">
        <h1 class="text-3xl font-bold">Transaksi Peminjaman</h1>
        <a href="{{ route('loans.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg">
            + Tambah Peminjaman
        </a>
    </div>

    <div class="card overflow-hidden">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="px-6 py-4">Anggota</th>
                    <th class="px-6 py-4">Buku</th>
                    <th class="px-6 py-4 text-center">Tgl Pinjam</th>
                    <th class="px-6 py-4 text-center">Tgl Kembali</th>
                    <th class="px-6 py-4 text-center">Durasi</th>
                    <th class="px-6 py-4 text-center">Denda</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($loans as $loan)
                <tr>
                    <td class="px-6 py-4">{{ $loan->user->name }}</td>
                    <td class="px-6 py-4">{{ $loan->book->judul }}</td>
                    <td class="px-6 py-4 text-center">{{ $loan->tanggal_pinjam }}</td>
                    <td class="px-6 py-4 text-center">{{ $loan->tanggal_kembali ?? '-' }}</td>
                    <td class="px-6 py-4 text-center">{{ $loan->durasi_hari }} hari</td>
                    <td class="px-6 py-4 text-center text-red-600">
                        @if($loan->denda > 0) Rp {{ number_format($loan->denda) }} @else - @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($loan->status == 'dipinjam')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">Dipinjam</span>
                        @elseif($loan->status == 'terlambat')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">Terlambat</span>
                        @else
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">Dikembalikan</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($loan->status == 'dipinjam')
                            <a href="{{ route('loans.return', $loan) }}" 
                               class="text-green-600 hover:underline">Kembalikan</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-12">Belum ada transaksi</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Riwayat Transaksi Peminjaman')

@section('page-header')
    <h1>Riwayat Transaksi Peminjaman</h1>
    <p>Semua riwayat peminjaman dan pengembalian buku</p>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Daftar Riwayat Peminjaman</h2>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="card overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left">Kode Buku</th>
                    <th class="px-6 py-4 text-left">Judul Buku</th>
                    <th class="px-6 py-4 text-left">Peminjam</th>
                    <th class="px-6 py-4 text-center">Tanggal Pinjam</th>
                    <th class="px-6 py-4 text-center">Batas Kembali</th>
                    <th class="px-6 py-4 text-center">Tanggal Kembali</th>
                    <th class="px-6 py-4 text-center">Durasi</th>
                    <th class="px-6 py-4 text-center">Denda</th>
                    <th class="px-6 py-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($loans as $loan)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-6 py-4 font-mono">{{ $loan->book->kode_buku }}</td>
                    <td class="px-6 py-4">{{ $loan->book->judul }}</td>
                    <td class="px-6 py-4">{{ $loan->user->name }}</td>
                    <td class="px-6 py-4 text-center">{{ \Carbon\Carbon::parse($loan->tanggal_pinjam)->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-center">
                        {{ \Carbon\Carbon::parse($loan->tanggal_pinjam)->addDays($loan->durasi_hari)->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $loan->tanggal_kembali ? \Carbon\Carbon::parse($loan->tanggal_kembali)->format('d M Y') : '-' }}
                    </td>
                    <td class="px-6 py-4 text-center">{{ $loan->durasi_hari }} hari</td>
                    <td class="px-6 py-4 text-center font-semibold text-red-600">
                        @if($loan->denda > 0)
                            Rp {{ number_format($loan->denda, 0) }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($loan->status == 'dipinjam')
                            <span class="bg-yellow-100 text-yellow-700 px-4 py-1 rounded-full text-xs font-medium">Sedang Dipinjam</span>
                        @elseif($loan->status == 'terlambat')
                            <span class="bg-red-100 text-red-700 px-4 py-1 rounded-full text-xs font-medium">Terlambat</span>
                        @else
                            <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-xs font-medium">Dikembalikan</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-12 text-gray-500">Belum ada riwayat transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4">
            {{ $loans->links() }}
        </div>
    </div>
</div>
@endsection
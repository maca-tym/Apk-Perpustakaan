@extends('layouts.user')

@section('title', 'Pengembalian Buku')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="card p-8">
        <h2 class="text-2xl font-semibold mb-6">Pengembalian Buku</h2>

        <div class="bg-gray-50 p-6 rounded-lg mb-6">
            <p><strong>Anggota:</strong> {{ $loan->user->name }}</p>
            <p><strong>Buku:</strong> {{ $loan->book->judul }}</p>
            <p><strong>Tanggal Pinjam:</strong> {{ $loan->tanggal_pinjam }}</p>
            <p><strong>Batas Kembali:</strong> {{ \Carbon\Carbon::parse($loan->tanggal_pinjam)->addDays($loan->durasi_hari)->format('d M Y') }}</p>
        </div>

        <form method="POST" action="{{ route('loans.return.process', $loan) }}">
            @csrf
            <button type="submit" 
                    onclick="return confirm('Yakin ingin mengembalikan buku ini?')"
                    class="w-full bg-green-600 text-white py-4 rounded-lg text-lg">
                ✅ Konfirmasi Pengembalian
            </button>
        </form>
    </div>
</div>
@endsection
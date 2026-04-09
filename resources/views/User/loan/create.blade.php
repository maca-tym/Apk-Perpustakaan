@extends('layouts.user')

@section('title', 'Tambah Peminjaman')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card p-8">
        <h2 class="text-2xl font-semibold mb-6">Form Peminjaman Buku</h2>

        <form method="POST" action="{{ route('loans.store') }}">
            @csrf

            <div class="space-y-6">
                <div>
                    <label>Anggota</label>
                    <select name="user_id" class="w-full p-3 border rounded-lg" required>
                        <option value="">Pilih Anggota</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Buku</label>
                    <select name="book_id" class="w-full p-3 border rounded-lg" required>
                        <option value="">Pilih Buku</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}">{{ $book->kode_buku }} - {{ $book->judul }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" value="{{ now()->toDateString() }}" class="w-full p-3 border rounded-lg">
                    </div>
                    <div>
                        <label>Durasi (Hari)</label>
                        <input type="number" name="durasi_hari" value="7" min="1" class="w-full p-3 border rounded-lg">
                    </div>
                </div>
            </div>

            <button type="submit" class="mt-8 w-full bg-blue-600 text-white py-4 rounded-lg">Proses Peminjaman</button>
        </form>
    </div>
</div>
@endsection
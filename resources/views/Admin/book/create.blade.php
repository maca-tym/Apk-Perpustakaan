@extends('layouts.admin')

@section('title', 'Tambah Buku Baru')

@section('content')
<div style="max-width: 700px;" class="mx-auto">
    <div class="card">
        <h2 class="text-xl font-semibold mb-6">Tambah Buku Baru</h2>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 p-4 rounded mb-6">
                <ul class="list-disc pl-5 text-red-600 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-1">Kode Buku</label>
                    <input type="text" name="kode_buku" class="w-full p-3 border rounded-lg" required>
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-1">Judul Buku</label>
                    <input type="text" name="judul" class="w-full p-3 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Penulis</label>
                    <input type="text" name="penulis" class="w-full p-3 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Penerbit</label>
                    <input type="text" name="penerbit" class="w-full p-3 border rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" maxlength="4" class="w-full p-3 border rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Stok</label>
                    <input type="number" name="stok" value="0" min="0" class="w-full p-3 border rounded-lg" required>
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="w-full p-3 border rounded-lg"></textarea>
            </div>

            <div class="mt-8 flex gap-3">
                <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-medium">
                    Simpan Buku
                </button>
                <a href="{{ route('books.index') }}" 
                   class="flex-1 text-center border border-gray-300 py-3 rounded-lg">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
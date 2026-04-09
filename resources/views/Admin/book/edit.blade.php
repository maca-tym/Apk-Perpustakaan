@extends('layouts.admin')

@section('title', 'Edit Buku')

@section('page-header')
    <h1>Edit Buku</h1>
    <p>Perbarui data buku "{{ $book->judul }}"</p>
@endsection

@section('content')
<div style="max-width: 700px;" class="mx-auto">
    <div class="card">

        {{-- Pesan Error Validasi --}}
        @if($errors->any())
        <div style="background:#fef2f2;border:1px solid #fecaca;border-radius:9px;padding:14px 16px;margin-bottom:22px;">
            <div style="font-size:13px;font-weight:600;color:#dc2626;margin-bottom:6px;">⚠️ Periksa kembali inputan:</div>
            <ul style="list-style:none;padding:0;margin:0;">
                @foreach($errors->all() as $error)
                <li style="font-size:12.5px;color:#b91c1c;padding:2px 0;">• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('books.update', $book) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">
                <!-- Kode Buku -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Buku <span class="text-red-500">*</span></label>
                    <input type="text" 
                           name="kode_buku" 
                           value="{{ old('kode_buku', $book->kode_buku) }}"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           required>
                </div>

                <!-- Judul Buku -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Buku <span class="text-red-500">*</span></label>
                    <input type="text" 
                           name="judul" 
                           value="{{ old('judul', $book->judul) }}"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           required>
                </div>

                <!-- Penulis -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penulis <span class="text-red-500">*</span></label>
                    <input type="text" 
                           name="penulis" 
                           value="{{ old('penulis', $book->penulis) }}"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           required>
                </div>

                <!-- Penerbit -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penerbit</label>
                    <input type="text" 
                           name="penerbit" 
                           value="{{ old('penerbit', $book->penerbit) }}"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Tahun Terbit -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Terbit</label>
                    <input type="text" 
                           name="tahun_terbit" 
                           value="{{ old('tahun_terbit', $book->tahun_terbit) }}"
                           maxlength="4"
                           placeholder="Contoh: 2024"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Stok -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Stok <span class="text-red-500">*</span></label>
                    <input type="number" 
                           name="stok" 
                           value="{{ old('stok', $book->stok) }}"
                           min="0"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           required>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="mt-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" 
                          rows="5"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">{{ old('deskripsi', $book->deskripsi) }}</textarea>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-8 flex gap-3">
                <button type="submit" 
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg transition">
                    💾 Perbarui Buku
                </button>
                
                <a href="{{ route('books.index') }}" 
                   class="flex-1 text-center border border-gray-300 hover:bg-gray-50 font-medium py-3 rounded-lg transition">
                    Batal
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
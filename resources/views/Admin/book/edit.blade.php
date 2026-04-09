@extends('layouts.admin')

@section('title', 'Edit Buku')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card p-8">

        <h2 class="text-2xl font-semibold mb-6">Edit Buku - {{ $book->judul }}</h2>

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-6">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('books.update', $book) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">
                <!-- Kode Buku -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kode Buku <span class="text-red-500">*</span></label>
                    <input type="text" 
                           name="kode_buku" 
                           value="{{ old('kode_buku', $book->kode_buku) }}"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           required>
                </div>

                <!-- Judul Buku -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Buku <span class="text-red-500">*</span></label>
                    <input type="text" 
                           name="judul" 
                           value="{{ old('judul', $book->judul) }}"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           required>
                </div>

                <!-- Penulis -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Penulis <span class="text-red-500">*</span></label>
                    <input type="text" 
                           name="penulis" 
                           value="{{ old('penulis', $book->penulis) }}"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           required>
                </div>

                <!-- Penerbit -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Penerbit</label>
                    <input type="text" 
                           name="penerbit" 
                           value="{{ old('penerbit', $book->penerbit) }}"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Tahun Terbit -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Terbit</label>
                    <input type="text" 
                           name="tahun_terbit" 
                           value="{{ old('tahun_terbit', $book->tahun_terbit) }}"
                           maxlength="4"
                           placeholder="2025"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <!-- Status Buku -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status Buku <span class="text-red-500">*</span></label>
                    <select name="status" 
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            required>
                        <option value="tersedia" {{ old('status', $book->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="dipinjam" {{ old('status', $book->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    </select>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" 
                          rows="4"
                          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">{{ old('deskripsi', $book->deskripsi) }}</textarea>
            </div>

            <div class="flex gap-4 mt-8">
                <button type="submit" 
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg transition">
                    Perbarui Buku
                </button>
                <a href="{{ route('books.index') }}" 
                   class="flex-1 text-center border border-gray-300 hover:bg-gray-50 py-3 rounded-lg transition">
                    Batal
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
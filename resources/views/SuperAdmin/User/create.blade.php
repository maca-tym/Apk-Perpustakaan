@extends('layouts.superadmin')

@section('title', 'Tambah Anggota')
@section('breadcrumb', 'Tambah Anggota')

@section('page-header')
    <h1>Tambah Anggota</h1>
    <p>Isi form berikut untuk mendaftarkan anggota baru.</p>
@endsection

@section('content')
<div style="max-width:520px;">
    <div class="card">

        {{-- Validasi Error --}}
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

        <form method="POST" action="/superadmin/users/store">
            @csrf

            <input type="text" 
                   name="name" 
                   placeholder="Nama Lengkap" 
                   class="w-full mb-3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                   required>

            <input type="email" 
                   name="email" 
                   placeholder="Email" 
                   class="w-full mb-3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                   required>

            <div class="relative mb-3">
                <input type="password" 
                       id="passwordInput"
                       name="password" 
                       placeholder="Password" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                       required>
                <button type="button" 
                        onclick="togglePassword()" 
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                    👁
                </button>
            </div>

            <select name="role" 
                    class="w-full mb-3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium p-3 rounded-lg transition">
                Simpan Anggota
            </button>
        </form>

    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePassword() {
    const input = document.getElementById('passwordInput');
    const icon = this; // jika ingin ubah icon nanti
    
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}
</script>
@endpush
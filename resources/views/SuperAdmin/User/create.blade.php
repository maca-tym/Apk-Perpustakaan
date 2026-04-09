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

    <input name="name" placeholder="Nama" class="w-full mb-3 p-2 border rounded">

    <input name="email" placeholder="Email" class="w-full mb-3 p-2 border rounded">

    <input name="password" type="password" placeholder="Password" class="w-full mb-3 p-2 border rounded">

    <select name="role" class="w-full mb-3 p-2 border rounded">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>

    <button class="w-full bg-blue-500 text-white p-2 rounded">
        Simpan
    </button>
</form>

</div>
</div>

@endsection

@push('scripts')
<script>
function togglePassword() {
    const input = document.getElementById('passwordInput');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
@endpush
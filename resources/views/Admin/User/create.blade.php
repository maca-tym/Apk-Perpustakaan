{{-- resources/views/admin/users/create.blade.php --}}

@extends('layouts.admin')

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

    <form method="POST" action="/admin/users/store">
        @csrf

        {{-- Nama --}}
        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:6px;text-transform:uppercase;letter-spacing:.8px;">
                Nama Lengkap
            </label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="cth. Budi Santoso"
                style="width:100%;padding:10px 13px;border:1px solid {{ $errors->has('name') ? '#fca5a5' : 'var(--border)' }};border-radius:9px;font-size:13.5px;font-family:inherit;outline:none;background:{{ $errors->has('name') ? '#fff5f5' : '#fff' }};transition:border .15s;"
                onfocus="this.style.borderColor='#f59e0b'"
                onblur="this.style.borderColor='{{ $errors->has('name') ? '#fca5a5' : 'var(--border)' }}'"
            >
            @error('name')
                <div style="font-size:12px;color:#ef4444;margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:6px;text-transform:uppercase;letter-spacing:.8px;">
                Email
            </label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="cth. budi@email.com"
                style="width:100%;padding:10px 13px;border:1px solid {{ $errors->has('email') ? '#fca5a5' : 'var(--border)' }};border-radius:9px;font-size:13.5px;font-family:inherit;outline:none;background:{{ $errors->has('email') ? '#fff5f5' : '#fff' }};transition:border .15s;"
                onfocus="this.style.borderColor='#f59e0b'"
                onblur="this.style.borderColor='{{ $errors->has('email') ? '#fca5a5' : 'var(--border)' }}'"
            >
            @error('email')
                <div style="font-size:12px;color:#ef4444;margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:6px;text-transform:uppercase;letter-spacing:.8px;">
                Password
            </label>
            <div style="position:relative;">
                <input
                    type="password"
                    name="password"
                    id="passwordInput"
                    placeholder="Minimal 8 karakter"
                    style="width:100%;padding:10px 40px 10px 13px;border:1px solid {{ $errors->has('password') ? '#fca5a5' : 'var(--border)' }};border-radius:9px;font-size:13.5px;font-family:inherit;outline:none;background:{{ $errors->has('password') ? '#fff5f5' : '#fff' }};transition:border .15s;"
                    onfocus="this.style.borderColor='#f59e0b'"
                    onblur="this.style.borderColor='{{ $errors->has('password') ? '#fca5a5' : 'var(--border)' }}'"
                >
                <button type="button" onclick="togglePassword()"
                    style="position:absolute;right:11px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;font-size:16px;color:#9ca3af;padding:0;"
                    title="Tampilkan password">
                    👁️
                </button>
            </div>
            @error('password')
                <div style="font-size:12px;color:#ef4444;margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:6px;text-transform:uppercase;letter-spacing:.8px;">
                Konfirmasi Password
            </label>
            <input
                type="password"
                name="password_confirmation"
                placeholder="Ulangi password"
                style="width:100%;padding:10px 13px;border:1px solid var(--border);border-radius:9px;font-size:13.5px;font-family:inherit;outline:none;transition:border .15s;"
                onfocus="this.style.borderColor='#f59e0b'"
                onblur="this.style.borderColor='var(--border)'"
            >
        </div>

        {{-- Role --}}
        <div style="margin-bottom:26px;">
            <label style="display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:6px;text-transform:uppercase;letter-spacing:.8px;">
                Role
            </label>
            <select
                name="role"
                style="width:100%;padding:10px 13px;border:1px solid var(--border);border-radius:9px;font-size:13.5px;font-family:inherit;outline:none;background:#fff;cursor:pointer;transition:border .15s;"
                onfocus="this.style.borderColor='#f59e0b'"
                onblur="this.style.borderColor='var(--border)'"
            >
                <option value="anggota" {{ old('role') === 'anggota' ? 'selected' : '' }}>👤 Anggota</option>
                <option value="admin"   {{ old('role') === 'admin'   ? 'selected' : '' }}>🛡️ Admin</option>
            </select>
            @error('role')
                <div style="font-size:12px;color:#ef4444;margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Actions --}}
        <div style="display:flex;gap:10px;">
            <a href="/admin/users"
               style="flex:1;display:block;text-align:center;padding:11px;border:1px solid var(--border);border-radius:9px;font-size:13.5px;font-weight:500;color:#374151;text-decoration:none;transition:background .15s;"
               onmouseover="this.style.background='#f9fafb'"
               onmouseout="this.style.background=''">
                ← Batal
            </a>
            <button type="submit"
                style="flex:2;padding:11px;background:#f59e0b;color:#111827;border:none;border-radius:9px;font-size:13.5px;font-weight:700;cursor:pointer;font-family:inherit;transition:opacity .15s;"
                onmouseover="this.style.opacity='.85'"
                onmouseout="this.style.opacity='1'">
                Simpan Anggota
            </button>
        </div>

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
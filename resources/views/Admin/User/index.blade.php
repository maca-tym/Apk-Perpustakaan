{{-- resources/views/admin/users/index.blade.php --}}

@extends('layouts.admin')

@section('title', 'Kelola Anggota')
@section('breadcrumb', 'Kelola Anggota')

@section('page-header')
    <h1>Kelola Anggota</h1>
    <p>Daftar seluruh pengguna yang terdaftar di sistem perpustakaan.</p>
@endsection

@section('content')

<div class="card">

    {{-- Toolbar --}}
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;">

        {{-- Search --}}
        <div style="position:relative;">
            <span style="position:absolute;left:10px;top:50%;transform:translateY(-50%);font-size:14px;">🔍</span>
            <input
                type="text"
                placeholder="Cari nama atau email..."
                style="padding:8px 12px 8px 32px;border:1px solid var(--border);border-radius:8px;font-size:13px;width:240px;outline:none;font-family:inherit;"
                oninput="filterTable(this.value)"
            >
        </div>

        {{-- Tambah User --}}
        <a href="/admin/users/create"
           style="display:inline-flex;align-items:center;gap:6px;background:#f59e0b;color:#111827;font-weight:700;padding:9px 18px;border-radius:8px;font-size:13px;text-decoration:none;">
            ➕ Tambah Anggota
        </a>

    </div>

    {{-- Table --}}
    <div style="overflow-x:auto;">
        <table id="userTable" style="width:100%;border-collapse:collapse;font-size:13.5px;">
            <thead>
                <tr style="background:#f9fafb;border-bottom:1px solid var(--border);">
                    <th style="text-align:left;padding:11px 14px;font-size:11px;text-transform:uppercase;letter-spacing:1.2px;color:#6b7280;font-weight:600;">Nama</th>
                    <th style="text-align:left;padding:11px 14px;font-size:11px;text-transform:uppercase;letter-spacing:1.2px;color:#6b7280;font-weight:600;">Email</th>
                    <th style="text-align:left;padding:11px 14px;font-size:11px;text-transform:uppercase;letter-spacing:1.2px;color:#6b7280;font-weight:600;">Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="user-row" style="border-bottom:1px solid #f3f4f6;transition:background .12s;">
                    {{-- Nama + Avatar --}}
                    <td style="padding:13px 14px;">
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#d97706);display:grid;place-items:center;font-weight:700;font-size:13px;color:#fff;flex-shrink:0;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <span style="font-weight:500;color:#111827;">{{ $user->name }}</span>
                        </div>
                    </td>

                    {{-- Email --}}
                    <td style="padding:13px 14px;color:#6b7280;">{{ $user->email }}</td>

                    {{-- Role Badge --}}
                    <td style="padding:13px 14px;">
                        @if($user->role === 'admin')
                            <span style="background:#fef3c7;color:#d97706;padding:3px 10px;border-radius:20px;font-size:11.5px;font-weight:600;">
                                Admin
                            </span>
                        @else
                            <span style="background:#f0fdf4;color:#16a34a;padding:3px 10px;border-radius:20px;font-size:11.5px;font-weight:600;">
                                Anggota
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:48px;color:#9ca3af;font-size:14px;">
                        😕 Belum ada data pengguna.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

@push('scripts')
<script>
function filterTable(query) {
    const q = query.toLowerCase();
    document.querySelectorAll('#userTable .user-row').forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(q) ? '' : 'none';
    });
}

// Row hover effect
document.querySelectorAll('#userTable .user-row').forEach(row => {
    row.addEventListener('mouseenter', () => row.style.background = '#fafafa');
    row.addEventListener('mouseleave', () => row.style.background = '');
});
</script>
@endpush
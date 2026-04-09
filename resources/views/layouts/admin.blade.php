<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Pustaka Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Lora:wght@700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-bg:   #111827;
            --sidebar-w:    256px;
            --accent:       #f59e0b;
            --accent-dim:   rgba(245,158,11,.12);
            --surface:      #f9fafb;
            --card:         #ffffff;
            --border:       #e5e7eb;
            --text:         #111827;
            --muted:        #6b7280;
            --danger:       #ef4444;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--surface);
            color: var(--text);
        }

        /* ─── SIDEBAR ─────────────────────────────────────── */
        #sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 200;
            transition: transform .25s ease;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 24px 20px 18px;
            border-bottom: 1px solid rgba(255,255,255,.07);
        }

        .brand-icon {
            width: 38px; height: 38px;
            background: var(--accent);
            border-radius: 10px;
            display: grid; place-items: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .brand-name {
            font-family: 'Lora', serif;
            font-size: 17px;
            color: #fff;
            line-height: 1.1;
        }

        .brand-sub {
            font-size: 10px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 1.4px;
        }

        /* Nav groups */
        .nav-wrap {
            flex: 1;
            overflow-y: auto;
            padding: 12px 10px;
            scrollbar-width: none;
        }
        .nav-wrap::-webkit-scrollbar { display: none; }

        .nav-group-label {
            font-size: 10px;
            font-weight: 700;
            color: #4b5563;
            text-transform: uppercase;
            letter-spacing: 1.6px;
            padding: 14px 10px 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 9px;
            color: #9ca3af;
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: background .15s, color .15s;
            margin-bottom: 2px;
        }

        .nav-item:hover {
            background: rgba(255,255,255,.06);
            color: #fff;
        }

        .nav-item.active {
            background: var(--accent-dim);
            color: var(--accent);
            font-weight: 600;
        }

        .nav-item .icon {
            width: 30px; height: 30px;
            border-radius: 7px;
            background: rgba(255,255,255,.05);
            display: grid; place-items: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .nav-item.active .icon {
            background: var(--accent-dim);
        }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 12px 10px;
            border-top: 1px solid rgba(255,255,255,.07);
        }

        .nav-logout {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 9px;
            color: #f87171;
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: background .15s;
        }
        .nav-logout:hover { background: rgba(239,68,68,.1); }
        .nav-logout .icon {
            width: 30px; height: 30px;
            border-radius: 7px;
            background: rgba(239,68,68,.1);
            display: grid; place-items: center;
            font-size: 14px;
        }

        /* ─── TOPBAR ──────────────────────────────────────── */
        #topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: 60px;
            background: var(--card);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 100;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--muted);
        }

        .breadcrumb .sep { color: #d1d5db; }
        .breadcrumb .current { color: var(--text); font-weight: 600; }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .notif-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: var(--muted);
            padding: 4px 6px;
            border-radius: 8px;
            transition: background .15s;
        }
        .notif-btn:hover { background: #f3f4f6; }

        .admin-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f9fafb;
            border: 1px solid var(--border);
            border-radius: 30px;
            padding: 4px 12px 4px 4px;
            cursor: pointer;
        }

        .admin-avatar {
            width: 30px; height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent) 0%, #d97706 100%);
            display: grid; place-items: center;
            font-weight: 700;
            font-size: 12px;
            color: #fff;
            flex-shrink: 0;
        }

        .admin-info { line-height: 1.25; }
        .admin-name { font-size: 12.5px; font-weight: 600; }
        .admin-role { font-size: 10.5px; color: var(--muted); }

        /* ─── MAIN CONTENT ────────────────────────────────── */
        #main {
            margin-left: var(--sidebar-w);
            padding-top: 60px;
            min-height: 100vh;
        }

        .page-body {
            padding: 32px 28px;
        }

        /* Page header — dipakai via @section('page-header') */
        .page-header {
            margin-bottom: 24px;
        }
        .page-header h1 {
            font-family: 'Lora', serif;
            font-size: 26px;
            color: var(--text);
            margin-bottom: 3px;
        }
        .page-header p {
            font-size: 13.5px;
            color: var(--muted);
        }

        /* Utility cards */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,.04);
        }

        /* ─── ANIMASI MASUK ───────────────────────────────── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .page-body { animation: fadeUp .3s ease both; }

        /* ─── RESPONSIVE ──────────────────────────────────── */
        @media (max-width: 768px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.open { transform: translateX(0); }
            #topbar, #main { left: 0; margin-left: 0; }
            #topbar { left: 0; }
        }
    </style>

    @stack('styles')
</head>
<body>

{{-- ═══════════════════════════════════════════════ --}}
{{--  SIDEBAR                                        --}}
{{-- ═══════════════════════════════════════════════ --}}
<aside id="sidebar">

    {{-- Brand --}}
    <div class="sidebar-brand">
        <div class="brand-icon">📚</div>
        <div>
            <div class="brand-name">Pustaka</div>
            <div class="brand-sub">Admin Panel</div>
        </div>
    </div>

    {{-- Navigation --}}
    <div class="nav-wrap">

        <div class="nav-group-label">Utama</div>

        <a href="/admin/dashboard"
           class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="icon">🏠</span> Dashboard
        </a>

        <div class="nav-group-label">Manajemen</div>

        <a href="{{url('books')}}"
           class="nav-item {{ request()->routeIs('books.*') ? 'active' : '' }}">
            <span class="icon">📖</span> Kelola Buku
        </a>

        <a href="{{url('loan')}}"
           class="nav-item {{ request()->routeIs('loan.*') ? 'active' : '' }}">
            <span class="icon">🔄</span> Riwayat
        </a>


    </div>

    {{-- Footer / Logout --}}
    <div class="sidebar-footer">
        <a href="/logout"
           class="nav-logout"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
            <span class="icon">🚪</span> Keluar
        </a>
        <form id="logout-form" action="/logout" method="POST" hidden>
            @csrf
        </form>
    </div>

</aside>


{{-- ═══════════════════════════════════════════════ --}}
{{--  TOPBAR                                         --}}
{{-- ═══════════════════════════════════════════════ --}}
<header id="topbar">

    <div class="breadcrumb">
        <span>Perpustakaan</span>
        <span class="sep">›</span>
        <span class="current">@yield('breadcrumb', 'Dashboard')</span>
    </div>

    <div class="topbar-right">
        <button class="notif-btn" title="Notifikasi">🔔</button>

        <div class="admin-chip">
            <div class="admin-avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="admin-info">
                <div class="admin-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                <div class="admin-role">Administrator</div>
            </div>
        </div>
    </div>

</header>


{{-- ═══════════════════════════════════════════════ --}}
{{--  KONTEN UTAMA                                   --}}
{{-- ═══════════════════════════════════════════════ --}}
<main id="main">
    <div class="page-body">

        {{-- Page Header (opsional, override di child view) --}}
        @hasSection('page-header')
        <div class="page-header">
            @yield('page-header')
        </div>
        @endif

        {{-- Konten halaman --}}
        @yield('content')

    </div>
</main>


@stack('scripts')
<script>
    // Mobile sidebar toggle
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') sidebar.classList.remove('open');
        });
    });
</script>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan — SMA Negeri 1</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:      #f2ede3;
            --surface: #e9e2d4;
            --dark:    #211d13;
            --mid:     #6b6148;
            --border:  #d5cdb8;
            --amber:   #7a5c1e;
            --amber-bg:#f0e4c4;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--dark);
            min-height: 100vh;
        }

        /* ── NAV ── */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 40px;
            border-bottom: 1px solid var(--border);
            background: var(--bg);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-mark {
            width: 34px; height: 34px;
            background: var(--dark);
            border-radius: 5px;
            display: grid; place-items: center;
            color: var(--bg);
            font-weight: 600;
            font-size: 14px;
        }

        .brand-name {
            font-family: 'Instrument Serif', serif;
            font-size: 16px;
        }

        .brand-sub {
            font-size: 11px;
            color: var(--mid);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-links a {
            font-size: 13px;
            color: var(--mid);
            text-decoration: none;
            transition: color .15s;
        }
        .nav-links a:hover { color: var(--dark); }

        .btn-login {
            background: var(--dark);
            color: var(--bg) !important;
            padding: 8px 22px;
            border-radius: 5px;
            font-weight: 500;
            transition: opacity .15s !important;
        }
        .btn-login:hover { opacity: .8; }

        /* ── HERO (2 kolom penuh) ── */
        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: calc(100vh - 61px);
        }

        .hero-left {
            padding: 64px 56px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-right: 1px solid var(--border);
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--amber-bg);
            border: 1px solid #d4b87a;
            border-radius: 4px;
            padding: 5px 12px;
            font-size: 11.5px;
            color: var(--amber);
            font-weight: 500;
            letter-spacing: .3px;
            width: fit-content;
            margin-bottom: 32px;
        }

        .tag-dot {
            width: 6px; height: 6px;
            background: var(--amber);
            border-radius: 50%;
        }

        .hero-left h1 {
            font-family: 'Instrument Serif', serif;
            font-size: 52px;
            font-weight: 400;
            line-height: 1.08;
            letter-spacing: -.5px;
            margin-bottom: 20px;
        }

        .hero-left h1 i {
            font-style: italic;
            color: var(--amber);
        }

        .hero-left p {
            font-size: 15px;
            color: var(--mid);
            line-height: 1.75;
            font-weight: 300;
            margin-bottom: 40px;
            max-width: 440px;
        }

        .cta {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 56px;
        }

        .cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--dark);
            color: var(--bg);
            padding: 13px 26px;
            border-radius: 5px;
            font-size: 13.5px;
            font-weight: 500;
            text-decoration: none;
            transition: opacity .15s;
        }
        .cta-primary:hover { opacity: .8; }

        .cta-ghost {
            font-size: 13px;
            color: var(--mid);
            text-decoration: none;
        }
        .cta-ghost:hover { color: var(--dark); }

        /* Stats row */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            border-top: 1px solid var(--border);
            padding-top: 32px;
        }

        .stat {
            padding-right: 24px;
        }
        .stat + .stat {
            border-left: 1px solid var(--border);
            padding-left: 24px;
            padding-right: 0;
        }

        .stat-n {
            font-family: 'Instrument Serif', serif;
            font-size: 32px;
            color: var(--dark);
            line-height: 1;
        }

        .stat-l {
            font-size: 12px;
            color: var(--mid);
            margin-top: 5px;
        }

        /* ── HERO RIGHT (panel gelap dengan konten) ── */
        .hero-right {
            background: var(--dark);
            padding: 56px 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        /* grid lines dekoratif */
        .hero-right::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(90deg, rgba(255,255,255,.03) 0, rgba(255,255,255,.03) 1px, transparent 1px, transparent 80px),
                repeating-linear-gradient(0deg, rgba(255,255,255,.03) 0, rgba(255,255,255,.03) 1px, transparent 1px, transparent 80px);
            pointer-events: none;
        }

        .panel-label {
            font-size: 10.5px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: rgba(255,255,255,.3);
            font-weight: 500;
            position: relative;
        }

        /* Buku stack cards */
        .books-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: relative;
            flex: 1;
            justify-content: center;
            padding: 32px 0;
        }

        .book-row {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 8px;
            padding: 14px 18px;
        }

        .book-strip {
            width: 4px;
            height: 44px;
            border-radius: 2px;
            flex-shrink: 0;
        }

        .book-meta { flex: 1; }

        .book-title {
            font-family: 'Instrument Serif', serif;
            font-size: 14px;
            color: rgba(242,237,227,.9);
            margin-bottom: 3px;
        }

        .book-author {
            font-size: 11.5px;
            color: rgba(255,255,255,.35);
        }

        .book-badge {
            font-size: 10.5px;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .badge-ok  { background: rgba(34,197,94,.12);  color: #86efac; }
        .badge-out { background: rgba(251,191,36,.12); color: #fde68a; }

        /* Info baris bawah panel */
        .panel-footer {
            position: relative;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .panel-info {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 8px;
            padding: 16px 18px;
        }

        .panel-info-n {
            font-family: 'Instrument Serif', serif;
            font-size: 26px;
            color: rgba(242,237,227,.9);
            line-height: 1;
        }

        .panel-info-l {
            font-size: 11px;
            color: rgba(255,255,255,.35);
            margin-top: 4px;
        }

        /* ── FITUR BARIS BAWAH ── */
        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            border-top: 1px solid var(--border);
        }

        .feature {
            padding: 28px 36px;
            border-right: 1px solid var(--border);
        }
        .feature:last-child { border-right: none; }

        .feature-num {
            font-family: 'Instrument Serif', serif;
            font-size: 13px;
            color: var(--mid);
            margin-bottom: 14px;
        }

        .feature-title {
            font-size: 14px;
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .feature-desc {
            font-size: 12.5px;
            color: var(--mid);
            line-height: 1.65;
            font-weight: 300;
        }

        /* ── FOOTER ── */
        footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 40px;
            border-top: 1px solid var(--border);
            font-size: 12px;
            color: var(--mid);
        }

        @media (max-width: 860px) {
            .hero { grid-template-columns: 1fr; min-height: auto; }
            .hero-left { border-right: none; border-bottom: 1px solid var(--border); padding: 48px 28px; }
            .hero-right { padding: 40px 28px; }
            .hero-left h1 { font-size: 38px; }
            .features { grid-template-columns: 1fr; }
            .feature { border-right: none; border-bottom: 1px solid var(--border); padding: 24px 28px; }
            nav { padding: 16px 24px; }
            footer { padding: 14px 24px; }
        }
    </style>
</head>
<body>

    {{-- Nav --}}
    <nav>
        <div class="brand">
            <div class="brand-mark">P</div>
            <div>
                <div class="brand-name">Perpustakaan</div>
                <div class="brand-sub">SMA Negeri 1</div>
            </div>
        </div>
        <div class="nav-links">
            <a href="#">Koleksi Buku</a>
            <a href="#">Tentang</a>
            <a href="/login" class="btn-login">Masuk</a>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="hero">

        {{-- Kiri --}}
        <div class="hero-left">
            <div class="tag">
                <div class="tag-dot"></div>
                Tahun Ajaran 2024 / 2025
            </div>

            <h1>
                Kelola peminjaman<br>
                buku dengan <i>mudah</i>
            </h1>

            <p>
                Platform perpustakaan digital untuk siswa dan staf pengajar
                SMA Negeri 1. Cari koleksi, pinjam, dan pantau pengembalian
                dari satu halaman.
            </p>

            <div class="cta">
                <a href="/login" class="cta-primary">
                    Masuk ke sistem →
                </a>
                <a href="#" class="cta-ghost">Lihat koleksi buku</a>
            </div>

            <div class="stats">
                <div class="stat">
                    <div class="stat-n">1.248</div>
                    <div class="stat-l">Koleksi buku</div>
                </div>
                <div class="stat">
                    <div class="stat-n">342</div>
                    <div class="stat-l">Anggota aktif</div>
                </div>
                <div class="stat">
                    <div class="stat-n">87</div>
                    <div class="stat-l">Dipinjam kini</div>
                </div>
            </div>
        </div>

        {{-- Kanan --}}
        <div class="hero-right">
            <div class="panel-label">Koleksi terbaru</div>

            <div class="books-list">
                <div class="book-row">
                    <div class="book-strip" style="background:#c8882a;"></div>
                    <div class="book-meta">
                        <div class="book-title">Laskar Pelangi</div>
                        <div class="book-author">Andrea Hirata</div>
                    </div>
                    <div class="book-badge badge-ok">Tersedia</div>
                </div>

                <div class="book-row">
                    <div class="book-strip" style="background:#4a8fc8;"></div>
                    <div class="book-meta">
                        <div class="book-title">Bumi Manusia</div>
                        <div class="book-author">Pramoedya Ananta Toer</div>
                    </div>
                    <div class="book-badge badge-out">Dipinjam</div>
                </div>

                <div class="book-row">
                    <div class="book-strip" style="background:#4aaa72;"></div>
                    <div class="book-meta">
                        <div class="book-title">Sitti Nurbaya</div>
                        <div class="book-author">Marah Rusli</div>
                    </div>
                    <div class="book-badge badge-ok">Tersedia</div>
                </div>

                <div class="book-row">
                    <div class="book-strip" style="background:#a87ac8;"></div>
                    <div class="book-meta">
                        <div class="book-title">Atheis</div>
                        <div class="book-author">Achdiat K. Mihardja</div>
                    </div>
                    <div class="book-badge badge-ok">Tersedia</div>
                </div>

                <div class="book-row">
                    <div class="book-strip" style="background:#c84a4a;"></div>
                    <div class="book-meta">
                        <div class="book-title">Ronggeng Dukuh Paruk</div>
                        <div class="book-author">Ahmad Tohari</div>
                    </div>
                    <div class="book-badge badge-out">Dipinjam</div>
                </div>
            </div>

            <div class="panel-footer">
                <div class="panel-info">
                    <div class="panel-info-n">23</div>
                    <div class="panel-info-l">Dikembalikan hari ini</div>
                </div>
                <div class="panel-info">
                    <div class="panel-info-n">14</div>
                    <div class="panel-info-l">Jatuh tempo minggu ini</div>
                </div>
            </div>
        </div>

    </section>

    {{-- Fitur --}}
    <div class="features">
        <div class="feature">
            <div class="feature-num">01</div>
            <div class="feature-title">Katalog Digital</div>
            <div class="feature-desc">Telusuri seluruh koleksi buku — pelajaran, fiksi, dan referensi — dalam satu pencarian.</div>
        </div>
        <div class="feature">
            <div class="feature-num">02</div>
            <div class="feature-title">Peminjaman Online</div>
            <div class="feature-desc">Ajukan peminjaman dan perpanjangan langsung dari browser, tanpa perlu datang ke loket.</div>
        </div>
        <div class="feature">
            <div class="feature-num">03</div>
            <div class="feature-title">Pantau Riwayat</div>
            <div class="feature-desc">Lihat status peminjaman aktif, histori buku, dan notifikasi jatuh tempo secara real-time.</div>
        </div>
    </div>

    <footer>
        <span>© 2025 Perpustakaan SMA Negeri 1</span>
        <span>Sistem Manajemen Perpustakaan Digital</span>
    </footer>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Superadmin — Pustaka</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #f9fafb;
            font-family: sans-serif;
        }
        .sidebar {
            width: 260px;
            background: #111827;
            color: white;
            min-height: 100vh;
        }
        .menu:hover {
            background: rgba(255,255,255,0.08);
        }
    </style>
</head>
<body>

<div class="flex">

    <!-- SIDEBAR -->
    <div class="sidebar p-5">

        <h2 class="text-xl font-bold mb-6">👑 Superadmin</h2>

        <a href="/superadmin/dashboard"
           class="block p-2 rounded menu mb-2">
            🏠 Dashboard
        </a>

        <a href="/superadmin/users"
           class="block p-2 rounded menu mb-2">
            👥 Kelola Anggota
        </a>

        <a href="/logout"
           class="block mt-10 bg-red-500 text-center p-2 rounded">
            Logout
        </a>

    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-10">

        <h1 class="text-3xl font-bold mb-3">
            Dashboard Superadmin
        </h1>

        <p class="text-gray-600">
            Kelola akun admin dan user di sini
        </p>

        <!-- CARD -->
        <div class="mt-6 bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-2">Quick Info</h3>
            <p class="text-sm text-gray-500">
                Gunakan menu di samping untuk mengelola anggota sistem.
            </p>
        </div>

    </div>

</div>

</body>
</html>
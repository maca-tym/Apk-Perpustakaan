<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 bg-blue-600 text-white min-h-screen p-5">
        <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>

        <ul>
            <li class="mb-3">
                <a href="#" class="hover:underline">📚 Kelola Buku</a>
            </li>

            <li class="mb-3">
                <a href="/admin/users" class="hover:underline">👥 Kelola Anggota</a>
            </li>

            <li class="mb-3">
                <a href="admin/books" class="hover:underline">📚 Kelola Buku</a>
            </li>

            <li class="mb-3">
                <a href="#" class="hover:underline">🔄 Transaksi</a>
            </li>

            <li class="mb-3">
                <a href="#" class="hover:underline">🔍 Pencarian</a>
            </li>

            <li class="mt-10">
                <a href="/logout" class="bg-red-500 px-3 py-1 rounded">Logout</a>
            </li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-10">
        <h1 class="text-3xl font-bold mb-4">Dashboard Admin</h1>

        <p>Selamat datang di sistem perpustakaan 📚</p>
    </div>

</div>

</body>
</html>
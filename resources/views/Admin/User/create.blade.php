<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-md mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Tambah User</h2>

    <form method="POST" action="/admin/users/store">
        @csrf

        <input name="name" placeholder="Nama"
            class="w-full mb-3 p-2 border rounded">

        <input name="email" placeholder="Email"
            class="w-full mb-3 p-2 border rounded">

        <input name="password" type="password" placeholder="Password"
            class="w-full mb-3 p-2 border rounded">

        <button class="w-full bg-blue-500 text-white p-2 rounded">
            Simpan
        </button>
    </form>

</div>

</body>
</html>
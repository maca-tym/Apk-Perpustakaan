<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Data User</h2>

    <a href="/admin/users/create"
       class="bg-blue-500 text-white px-3 py-2 rounded">
       ➕ Tambah User
    </a>

    <table class="w-full mt-4 border">
        <tr class="bg-gray-200">
            <th class="p-2">Nama</th>
            <th>Email</th>
            <th>Role</th>
        </tr>

        @foreach($users as $user)
        <tr class="text-center border-t">
            <td class="p-2">{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
        </tr>
        @endforeach
    </table>

</div>

</body>
</html>
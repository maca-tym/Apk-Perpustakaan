<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-green-400 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-80">
    <h2 class="text-2xl font-bold text-center mb-4">Login</h2>

    @if(session('error'))
        <div class="text-red-500 text-sm mb-2">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 p-2 border rounded">

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-3 p-2 border rounded">

        <button class="w-full bg-blue-500 text-white p-2 rounded">
            Login
        </button>
    </form>
</div>

</body>
</html>
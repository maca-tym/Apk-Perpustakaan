@extends('layouts.superadmin')

@section('title','Kelola Anggota')

@section('content')

<h1 class="text-3xl font-bold mb-4">Kelola Anggota</h1>

<p class="text-gray-600 mb-6">
    Daftar semua user yang terdaftar di sistem.
</p>

{{-- ALERT --}}
@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

{{-- TOMBOL TAMBAH --}}
<a href="/superadmin/users/create"
   class="bg-yellow-400 text-black px-4 py-2 rounded font-semibold">
    ➕ Tambah Anggota
</a>

{{-- TABEL --}}
<div class="mt-6 bg-white p-5 rounded shadow">

    <table class="w-full text-left border-collapse">

        <thead>
            <tr class="border-b">
                <th class="p-3">Nama</th>
                <th class="p-3">Email</th>
                <th class="p-3">Role</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $user->name }}</td>
                <td class="p-3">{{ $user->email }}</td>
                <td class="p-3">
                    @if($user->role == 'admin')
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">
                            Admin
                        </span>
                    @else
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                            User
                        </span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center p-5 text-gray-400">
                    Belum ada data
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection
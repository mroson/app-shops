@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-6">Lista de Usuarios</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nombre</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Phone</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Fecha de Creación</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Country</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Residence</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">@insta_user</th>




                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->phone }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->created_at }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->country }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->residence }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->instagram_username }}</td>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    @endsection

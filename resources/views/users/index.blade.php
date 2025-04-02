@extends('layouts.app')

@section('content')
<main class="main-wrapper relative overflow-x-clip">

<!--...::: Breadcrumb Section Start :::... -->
<section class="section-breadcrumb">
    <div class="bg-colorTextTitle">
        <div class="breadcrumb-space">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="mb-[50px] text-white">Users</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-edit-profile">
    <div class="section-space">
        <div class="container">
                
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
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Country</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Residence</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Instagram Username</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Roles</th> <!-- Nueva columna para roles -->
                    @if(auth()->user()->hasRole('admin_user')) <!-- Verifica si el usuario tiene el rol de admin_user -->
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Acciones</th> <!-- Columna para editar roles -->
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->phone }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->country }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->residence }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->instagram_username }}</td>

                        <!-- Mostrar roles -->
                        <td class="px-4 py-2 text-sm text-gray-700">
                            @foreach($user->roles as $role)
                                <span class="inline-block bg-gray-200 text-gray-700 text-xs rounded-md px-2 py-1">{{ $role->name }}</span>
                            @endforeach
                        </td>

                        @if(auth()->user()->hasRole('admin_user')) <!-- Solo los admin_users pueden editar roles -->
                            <td class="px-4 py-2 text-sm text-gray-700">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Editar Roles</a> <!-- Enlace para editar -->
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
</div>
</section>
@endsection

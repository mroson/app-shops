@extends('layouts.app')

@section('content')
<main class="main-wrapper relative overflow-x-clip">
    <section class="section-breadcrumb">
        <div class="bg-colorTextTitle">
            <div class="breadcrumb-space">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="mb-[50px] text-white">Editar Usuario</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Usuarios
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-reset-password">
        <div class="section-space">
            <div class="container">
                <div class="mx-auto max-w-[860px]">
                    <div class="rounded-[10px] bg-white p-5 shadow-custom-1 sm:p-[50px]">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" class="grid grid-cols-1 gap-y-6">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="name" class="mb-4 block font-semibold text-colorTextTitle">Nombre</label>
                                    <input type="text" name="name" id="name" placeholder="Nombre Completo"
                                        value="{{ old('name', $user->name) }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required>
                                </div>
                                <div>
                                    <label for="email" class="mb-4 block font-semibold text-colorTextTitle">Email</label>
                                    <input type="email" name="email" id="email" placeholder="example@email.com"
                                        value="{{ old('email', $user->email) }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none"
                                        required>
                                </div>
                                <div>
                                    <label for="phone" class="mb-4 block font-semibold text-colorTextTitle">Teléfono</label>
                                    <input type="text" name="phone" id="phone" placeholder="123-456-7890"
                                        value="{{ old('phone', $user->phone) }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                                </div>
                                <div>
                                    <label for="residence" class="mb-4 block font-semibold text-colorTextTitle">Residencia</label>
                                    <input type="text" name="residence" id="residence" placeholder="Ciudad, Estado"
                                        value="{{ old('residence', $user->residence) }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                                </div>
                                <div>
                                    <label for="country" class="mb-4 block font-semibold text-colorTextTitle">País</label>
                                    <input type="text" name="country" id="country" placeholder="País"
                                        value="{{ old('country', $user->country) }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                                </div>
                                <div>
                                    <label for="instagram_username" class="mb-4 block font-semibold text-colorTextTitle">Instagram</label>
                                    <input type="text" name="instagram_username" id="instagram_username" placeholder="@usuario"
                                        value="{{ old('instagram_username', $user->instagram_username) }}"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                                </div>
                                <div>
                                    <label for="role_id" class="mb-4 block font-semibold text-colorTextTitle">Rol</label>
                                    <select name="role_id" id="role_id"
                                        class="w-full rounded-[50px] border border-colorTextTitle bg-white px-[30px] py-4 text-base leading-none outline-none">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex justify-start gap-6">
                                <button type="submit" class="btn btn-primary flex w-full">
                                    <span>Actualizar</span>
                                    <span>Actualizar</span>
                                </button>
                            </div>
                        </form>
                        <p class="mb-[30px] mt-6">
                            ¿Quieres volver?
                            <a href="{{ route('users.index') }}" class="font-bold text-colorTextTitle">Ver Usuarios</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

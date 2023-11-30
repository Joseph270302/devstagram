@extends('layouts.app')

@section('titulo')
    Editar Perfil
@endsection

@section('contenido')
    <div class="w-full md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" method="post" class="mt-10 md:mt-10" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">username</label>
                    <input type="text" name="username" id="username"
                        class="border p-3 w-full rounded-lg 
                    @error('username')
                    border-red-500
                    @enderror"
                        value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen perfil</label>
                    <input type="file" name="imagen" id="imagen" class="border p-3 w-full rounded-lg"
                        accept=".jpg, .png, .jpeg">
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" name="email" id="email" class="border p-3 w-full rounded-lg"
                        value="{{ auth()->user()->email }}">
                </div>
                <input type="submit" value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

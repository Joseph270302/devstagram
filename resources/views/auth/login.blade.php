@extends('layouts.app')

@section('titulo')
    Iniciar Sesion
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 p-5">
            <img src="{{ asset('img/reset-password.jpg') }}" class="object-contain" alt="reset-password-img">
        </div>
        <div class="md:w-4/12 bg-white shadow-xl p-6 rounded-xl">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                @if (session('message'))
                    <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                        {{ session('message') }}
                    </p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">email</label>
                    <input type="email" name="email" id="email"
                        class="border p-3 w-full rounded-lg 
                        @error('email')
                        border-red-500
                        @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">password</label>
                    <input type="password" name="password" id="password"
                        class="border p-3 w-full rounded-lg 
                        @error('password')
                        border-red-500
                        @enderror">
                    @error('password')
                        <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember">
                    <span class="text-sm">Mantener sesion
                        abierta
                    </span>
                </div>
                <input type="submit" value="Iniciar Sesion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

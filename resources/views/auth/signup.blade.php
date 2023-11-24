@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 p-5">
            <img src="{{ asset('img/reset-password.jpg') }}" alt="reset-password-img">
        </div>
        <div class="md:w-4/12 bg-white shadow-xl p-6 rounded-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">nombre</label>
                    <input type="text" name="name" id="name"
                        class="border p-3 w-full rounded-lg 
                        @error('name')
                        border-red-500
                        @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">username</label>
                    <input type="text" name="username" id="username"
                        class="border p-3 w-full rounded-lg 
                        @error('username')
                        border-red-500
                        @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">repetir
                        password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="border p-3 w-full rounded-lg 
                        @error('password_confirmation')
                         border-red-500
                        @enderror">
                </div>
                <input type="submit" value="Registrarse"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

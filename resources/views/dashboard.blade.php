@extends('layouts.app')
@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center w-full">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="md:container  md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ $user->imagen ? asset('perfiles' . '/' . $user->imagen) : asset('img/user.png') }}"
                    alt="imagen_usuario" height="300px" height="300px">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <div class="flex gap-2 mb-3">
                    <p class="text-gray-700"> {{ $user->username }} </p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <div class="mb-3">
                    <p class="text-gray-800 text-sm font-bold">
                        {{ $user->followers->count() }}
                        <span class="font-normal mb-3">@choice('Seguidor|Seguidores', $user->followers->count())</span>
                    </p>
                    <p class="text-gray-800 text-sm font-bold">
                        {{ $user->followings->count() }}
                        <span class="font-normal mb-3">Siguiendo</span>
                    </p>
                    <p class="text-gray-800 text-sm font-bold">
                        {{ $user->posts->count() }}
                        <span class="font-normal mb-3">Publicaciones</span>
                    </p>
                </div>
                <div>
                    @auth
                        @if ($user->id !== auth()->user()->id)
                            @if (!$user->siguiendo(auth()->user()))
                                <form action="{{ route('users.follow', ['user' => $user]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="bg-blue-300 px-4 py-2 rounded-lg cursor-pointer flex gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                        </svg>
                                        Seguir
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('users.unfollow', ['user' => $user]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 px-4 py-2 rounded-lg cursor-pointer flex gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                        </svg>
                                        Dejar de seguir
                                    </button>
                                </form>
                            @endif
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <section class="container mx-auto mt-10">
        <h2 class="text-xl text-center font-black my-10 uppercase">Publicaciones</h2>
        <x-listar-post :posts="$posts" />
    </section>
@endsection

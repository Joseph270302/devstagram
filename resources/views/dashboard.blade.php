@extends('layouts.app')
@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="md:container  md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/user.png') }}" alt="imagen_usuario" height="300px" height="300px">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <p class="text-gray-700 mb-3"> {{ $user->username }} </p>
                <p class="text-gray-800 text-sm font-bold">
                    0
                    <span class="font-normal mb-3">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm font-bold">
                    0
                    <span class="font-normal mb-3">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm font-bold">
                    0
                    <span class="font-normal mb-3">Publicaciones</span>
                </p>
            </div>
        </div>
    </div>
    <section class="container mx-auto mt-10">
        <h2 class="text-xl text-center font-black my-10 uppercase">Publicaciones</h2>
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-5">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                            <img src="{{ asset('uploads/' . $post->imagen) }}" alt="post_image.{{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div>
                {{-- Paginacion --}}
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
        @endif
    </section>
@endsection

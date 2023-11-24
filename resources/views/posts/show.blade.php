@extends('layouts.app')

@section('contenido')
    <div class="w-full container flex flex-col lg:flex-row items-center lg:items-start gap-5">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads/' . $post->imagen) }}" alt="post_image.{{ $post->titulo }}">
            <div class="p-2 flex space-x-3 justify-between">
                <div class="flex">
                    <div class="mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                    0 likes
                </div>
                <div>
                    <span class="text-gray-600 text-sm font-italic">by</span>
                    <span class="font-bold">{{ $post->user->username }}</span>
                </div>
            </div>
            <div class="flex flex-col flex-1 gap-2">
                <div class="font-bold text-3xl uppercase">{{ $post->titulo }}</div>
                <div class="text-gray-600 text-sm">
                    {{ $post->created_at->diffForHumans() }}
                </div>
                <div class="flex flex-col">
                    <span class="text-gray-600 text-sm">Descripcion</span>
                    {{ $post->descripcion }}
                </div>
            </div>

        </div>
        <div class="md:w-1/2">
            <div class="bg-white shadow-sm rounded-xl p-5">
                <p class="uppercase font-bold text-2xl text-center mb-4">Comentarios</p>
                @auth
                    <form action="" class="w-full" novalidate>
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Agrega un
                                comentario</label>
                            <textarea type="text" name="comentario" id="comentario"
                                class="border p-3 w-full rounded-lg resize-none text-sm
                            @error('comentario')
                            border-red-500
                            @enderror"
                                placeholder="Agregar comentario"></textarea>
                            @error('comentario')
                                <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <input type="submit" value="COMENTAR"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
                    </form>
                @endauth
            </div>
        </div>

    </div>
@endsection

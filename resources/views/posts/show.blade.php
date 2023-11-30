@extends('layouts.app')

@section('titulo')
    Posts
@endsection

@section('contenido')
    <div class="w-full container flex flex-col lg:flex-row items-center lg:items-start gap-5">
        <div class="w-full lg:w-1/2">
            <div class="flex justify-center mb-5">
                <img src="{{ asset('uploads/' . $post->imagen) }}" class="lg:w-3/4" alt="post_image.{{ $post->titulo }}">
            </div>
            <div class="p-2 flex space-x-3 justify-between">
                @auth
                    <livewire:like-post :post="$post" />
                @endauth
                <div>
                    <span class="text-gray-600 text-sm font-italic">by</span>
                    <a href="{{ route('posts.index', ['user' => $post->user]) }}"
                        class="font-bold">{{ $post->user->username }}</a>
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
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <div class="mt-4 flex justify-end">
                        @method('DELETE')
                        @csrf
                        <form action="{{ route('posts.destroy', ['post' => $post]) }}">
                            <input type="submit" value="Eliminar publicacion"
                                class="font-bold p-3 bg-red-500 cursor-pointer rounded-lg text-white">
                        </form>
                    </div>
                @endif
            @endauth
        </div>
        <div class="w-full lg:w-1/2">
            @auth
                <div class="bg-white shadow-sm rounded-xl p-5 mb-4">
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" class="w-full"
                        method="POST" novalidate>
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
                </div>
            @endauth
            <div class="bg-white shadow-sm rounded-xl p-5">
                <p class="uppercase font-bold text-2xl text-center mb-4">Comentarios</p>
                @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario)
                        <div class="py-2 px-4 shadow-sm border-gray-400 border-b mb-2 flex flex-col">
                            <a href="{{ route('posts.index', ['user' => $comentario->user]) }}">
                                <p class="font-bold">{{ $comentario->user->username }}</p>
                            </a>
                            <p>{{ $comentario->comentario }}</p>
                            <p class="text-right text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

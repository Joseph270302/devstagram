@extends('layouts.app')

@section('titulo')
    Crear publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="w-full px-5 flex flex-col md:flex-row gap-5 ">
        <div class="md:w-8/12 px-10">

            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-8/12 px-10 bg-white py-6 rounded-lg shadow-xl mt-10 md:mt-0 flex items-center">
            <form action="{{ route('posts.store') }}" method="POST" class="w-full" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">titulo</label>
                    <input type="text" name="titulo" id="titulo"
                        class="border p-3 w-full rounded-lg 
                        @error('titulo')
                        border-red-500
                        @enderror"
                        value="{{ old('titulo') }}">
                    @error('titulo')
                        <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">descripcion</label>
                    <textarea type="text" name="descripcion" id="descripcion"
                        class="border p-3 w-full rounded-lg resize-none text-sm
                        @error('descripcion')
                        border-red-500
                        @enderror"></textarea>
                    @error('descripcion')
                        <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}" />
                    @error('imagen')
                        <p class="text-center bg-red-500 text-white rounded-lg p-3 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input type="submit" value="Publicar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
    @vite('resources/js/dropzone.js')
@endsection

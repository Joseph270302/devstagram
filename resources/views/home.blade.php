@extends('layouts.app')

@section('titulo')
    Publicaciones
@endsection

@section('contenido')
    {{-- <h1>Mostrando slot</h1>
    <x-listar-post>
        <x-slot:titulo>
            <p>Hola my king :v</p>
        </x-slot:titulo>
    </x-listar-post> --}}
    <x-listar-post :posts="$posts" />
@endsection

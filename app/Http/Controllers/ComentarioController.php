<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
        // VALIDAR
        $this->validate($request, [
            'comentario' => ['required', 'max:255'],
        ]);

        // SOLO PUEDE COMENTAR LOS USUARIOS AUNTENTIFICADOS
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->get('comentario'),
        ]);

        return back()->with('mensaje', 'Comentario realizado con exito');
    }
}

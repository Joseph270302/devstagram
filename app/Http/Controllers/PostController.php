<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'index');
    }

    public function index(User $user)
    {
        // CON get TREA LOS RESULTADOS
        // SOLO SE PUEDE PAGINAR CON ESTE TIPO DE CONSULTAS
        $posts = Post::where('user_id', $user->id)->paginate(4);

        // OTRA FORMA SIN USAR LA PAGINACION
        // $user->posts

        return view('dashboard', ['user' => $user, 'posts' => $posts]);
    }

    public function create(User $user)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => ['required', 'max:255'],
            'descripcion' => ['required'],
            'imagen' => ['required'],
        ]);

        // Post::create([
        //     'titulo' => $request->get('titulo'),
        //     'descripcion' => $request->get('descripcion'),
        //     'imagen' => $request->get('imagen'),
        //     'user_id' => auth()->user()->id,
        // ]);

        $request->user()->posts()->create([
            'titulo' => $request->get('titulo'),
            'descripcion' => $request->get('descripcion'),
            'imagen' => $request->get('imagen'),
            'user_id' => auth()->user()->id,
        ]);


        return redirect()->route('posts.index', ['user' => auth()->user()]);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // OBTENER A QUIEN SEGUIMOS
        $ids = auth()->user()->followings->pluck('id')->toArray();
        // whereIn PARA FILTRAR SEGUN UN ARREGLO
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', ['posts' => $posts]);
    }
}

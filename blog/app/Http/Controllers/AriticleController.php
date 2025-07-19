<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class AriticleController extends Controller
{
    public function index()
    {
        $data = Article::all();

        return view("articles.index", [
            'articles' => $data,
        ]);
    }

    public function detail($id)
    {
        return "Controller Detail $id";
    }
}

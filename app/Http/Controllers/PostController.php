<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        sleep(30);
        return Inertia('Index',[
            'posts' => $posts
        ]);
    }
}

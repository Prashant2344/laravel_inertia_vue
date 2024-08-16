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
        sleep(3);
        return Inertia('Index',[
            'posts' => $posts
        ]);
    }
}

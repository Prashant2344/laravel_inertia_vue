<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::get();
        // sleep(3);
        // return Inertia('Index',[
        //     'posts' => $posts
        // ]);
        // return Inertia::render('Index', [
        //     'posts' => $posts
        // ]);
        return Inertia::render('Index', compact('posts'));
    }

    public function getPosts() {
        $posts = Post::get();

        return $this->sendResponse($posts, 'Post Fetch successfully.');
    }
}

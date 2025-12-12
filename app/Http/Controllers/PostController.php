<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        echo 'creating post';
    }
}

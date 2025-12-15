<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GeneralController;
use App\Models\Post;

class PostController extends Controller
{
    public function editPost(Post $post)
    {
        return view('edit-post', ['post' => $post]);
    }

    public function createPost(Request $request)
    {
        $dataInput = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $dataInput['title'] = strip_tags($dataInput['title']);
        $dataInput['content'] = strip_tags($dataInput['content']);
        $dataInput['user_id'] = Auth::id();

        Post::create([
            'title' => $dataInput['title'],
            'content' => $dataInput['content'],
            'user_id' => $dataInput['user_id']
        ]);

        return redirect('/');
    }
}

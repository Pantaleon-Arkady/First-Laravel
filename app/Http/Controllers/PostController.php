<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GeneralController;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $dataInput = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $dataInput['title'] = strip_tags($dataInput['title']);
        $dataInput['content'] = strip_tags($dataInput['content']);
        $dataInput['user_id'] = Auth::id();

        GeneralController::fastPrint($dataInput);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CrudUserController extends Controller
{
    public function userRegister(Request $request)
    {
        $dataPosted = $request->validate([
            'name' => ['required', 'min:5', 'max:20'],
            'email' => 'required',
            'password' => ['required', 'min:8', 'max:50']
        ]);

        $dataPosted['password'] = bcrypt($dataPosted['password']);

        User::create($dataPosted);

        return 'Registered response string from controller';
    }
}

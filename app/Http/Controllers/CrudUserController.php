<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CrudUserController extends Controller
{
    public function userRegister(Request $request)
    {
        $dataPosted = $request->validate([
            'name' => ['required', 'min:3', 'max:12', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:50']
        ]);

        $dataPosted['password'] = bcrypt($dataPosted['password']);

        $user = User::create($dataPosted);

        /** @var \Illuminate\Contracts\Auth\StatefulGuard $guard */
        $guard = auth()->guard();   // or just auth('web')

        $guard->login($user);

        return redirect('/');
    }
}

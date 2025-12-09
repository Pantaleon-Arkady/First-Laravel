<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{

    public static function guard()
    {
        /** @var \Illuminate\Contracts\Auth\StatefulGuard $guard */
        $guard = auth()->guard();   // or just auth('web')
        
        return $guard;
    }

    public function userRegister(Request $request)
    {
        $dataValidated = $request->validate([
            'name' => ['required', 'min:3', 'max:12', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', Password::defaults()]
        ]);

        $user = User::create([
            'name' => $dataValidated['name'],
            'email' => $dataValidated['email'],
            'password' => bcrypt($dataValidated['password']),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function userLogin(Request $request)
    {
        $dataPosted = $request->validate([
            'logName' => 'required',
            'logPassword' => 'required'
        ]);


        $dataVerified = $this->guard()->attempt([
            'name' => $dataPosted['logName'],
            'password' => $dataPosted['logPassword']
        ]);

        if ($dataVerified) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }

    public function userLogout()
    {
        $this->guard()->logout();
        return redirect('/');
    }
}

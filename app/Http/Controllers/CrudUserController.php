<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $dataPosted = $request->validate([
            'name' => ['required', 'min:3', 'max:12', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:50']
        ]);

        $dataPosted['password'] = bcrypt($dataPosted['password']);

        $user = User::create($dataPosted);

        // /** @var \Illuminate\Contracts\Auth\StatefulGuard $guard */
        // $guard = auth()->guard();   // or just auth('web')

        // $guard->login($user);

        $this->guard()->login($user);

        return redirect('/');
    }

    public function userLogin(Request $request)
    {
        // $dataPosted = $request->validate([
        //     'name' => 'required',
        //     'password' => 'required'
        // ]);



        // $dataVerified = auth()->attempt([
        //     'name' => $dataPosted['name'],
        //     'password' => $dataPosted['password']
        // ]);

        // if ($dataVerified) {

        // }
    }

    public function userLogout()
    {
        $this->guard()->logout();
        return redirect('/');
    }
}

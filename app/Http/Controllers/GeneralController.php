<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function choosePokemon(Request $request)
    {
        if ($request->isMethod('post')) {

            $pokemon = $request->input('pokemon');

            echo "youve chosen this pokemon: $pokemon";
        } else {
            echo 'request method not allowed';
        }
    }

    public static function fastPrint($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

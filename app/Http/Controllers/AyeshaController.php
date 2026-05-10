<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AyeshaController extends Controller
{

    public function index()
    {

        $response = Http::withoutVerifying()->get(
            'https://jsonplaceholder.typicode.com/users'
        );

        $users = $response->json();

        return view('ayesha-users', compact('users'));

    }

}
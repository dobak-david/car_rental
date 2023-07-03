<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        /* $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) { */
            // Sikeres bejelentkezés, hozz létre egy "admin" szerepkört a felhasználónak
            /* $adminRole = Role::findOrCreate('admin',['name' => 'admin']);
            auth()->user()->assign($adminRole); */

            config(['admin.loggedIn' => true]);
            return redirect()->route('index');
       // }

        //return redirect()->route('cars.index')->with('error', 'Sikertelen bejelentkezés');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /*
    protected function redirectTo()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return route('/dashboard');
        } elseif ($user->role == 'user') {
            return route('/');
        }

        return '/home';
    }
    */

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect('/dashboard');
        } elseif ($user->role == 'user') {
            return redirect('/');
        }

        return redirect('/home');
    }
}

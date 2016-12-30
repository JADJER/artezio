<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    use AuthenticatesUsers;

    public function __construct() {
        $this->middleware('auth');
    }

    public function logout() {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('/');
    }

}

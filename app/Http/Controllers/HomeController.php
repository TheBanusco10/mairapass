<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        foreach (Auth::user()->passwords as $password) {
            $password->web = EncryptionController::decrypt($password->web);
            $password->email = EncryptionController::decrypt($password->email);
            $password->password = EncryptionController::decrypt($password->password);
        }

        return view('home', [
            'passwords' => Auth::user()->passwords
        ]);
    }

    public function settings(User $user) {

        return view('settings', [
            'usuario' => $user
        ]);

    }
}

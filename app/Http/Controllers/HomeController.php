<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $NUMBER_PASSWORDS_FREE_ACCOUNT = 10;

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
        $user = Auth::user();

        $numberPasswords = Password::where('user_id', $user->id)->count();

        $canAddPasswords = true;

        if (!$user->isPro)
            $canAddPasswords = $numberPasswords < $this->NUMBER_PASSWORDS_FREE_ACCOUNT;

        foreach ($user->passwords as $password) {
            $password->web = EncryptionController::decrypt($password->web);
            $password->url_web = EncryptionController::decrypt($password->url_web);
            $password->email = EncryptionController::decrypt($password->email);
            $password->password = EncryptionController::decrypt($password->password);
        }

        return view('home', [
            'passwords' => $user->passwords,
            'usuario' => Auth::user(),
            'canAddPasswords' => $canAddPasswords
        ]);
    }

    public function email() {
        return view('emails.purchase-success');
    }

    public function settings(User $user) {

        return view('settings', [
            'usuario' => $user
        ]);

    }
}

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

        // Comprobamos las contraseñas
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

        foreach ($user->credit_cards as $card) {

            $card->title = EncryptionController::decrypt($card->title);
            $card->card_number = EncryptionController::decrypt($card->card_number);
            $card->expiration = EncryptionController::decrypt($card->expiration);
            $card->ccv = EncryptionController::decrypt($card->ccv);
        }

        $buscando = false;
        $resultados = [];

        if (isset($_GET['search']) && !empty($_GET['q'])) {
            $buscando = true;

            $name = strtolower($_GET['q']);

            foreach ($user->passwords as $password) {
                if (str_contains(strtolower($password->web), $name)) array_push($resultados, $password);
            }

        }

        return view('home', [
            'passwords' => $user->passwords,
            'credit_cards' => $user->credit_cards,
            'usuario' => Auth::user(),
            'canAddPasswords' => $canAddPasswords,
            'resultados' => $resultados,
            'buscando' => $buscando
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

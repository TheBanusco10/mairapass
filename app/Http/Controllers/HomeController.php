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
    public function index(Request $request)
    {

        $user = Auth::user();

        // Comprobamos el número de contraseñas que tiene
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

        $buscandoPassword = false;
        $buscandoCard = false;
        $resultados = [];

        if (isset($_GET['searchPassword']) && !empty($_GET['q'])) {

            $buscandoPassword = true;
            $resultados = $this->search($user->passwords, 'web');

        }else if (isset($_GET['searchCard']) && !empty($_GET['q'])) {
            $buscandoCard = true;
            $resultados = $this->search($user->credit_cards, 'title');
        }

        return view('home', [
            'passwords' => $user->passwords,
            'credit_cards' => $user->credit_cards,
            'usuario' => Auth::user(),
            'canAddPasswords' => $canAddPasswords,
            'resultados' => $resultados,
            'buscandoPassword' => $buscandoPassword,
            'buscandoCard' => $buscandoCard,
            'request' => $request
        ]);
    }

    public function email() {
        return view('emails.purchase-success');
    }

    public function settings(Request $request) {

        return view('settings', [
            'usuario' => Auth::user(),
            'request' => $request
        ]);

    }

    /**
     * @description Función que devuelve un array con los resultados de la búsqueda
     * @param $elements El array en el que se va a buscar
     * @param $match Qué campo del array tiene que coincidir con la búsqueda para que sea válido (Ej: title, web...)
     * @return array
     */
    function search($elements, $match) {

        $name = strtolower($_GET['q']);

        $resultados = [];

        foreach ($elements as $element) {

            if (str_contains(strtolower($element[$match]), $name)) array_push($resultados, $element);

        }

        return $resultados;
    }
}

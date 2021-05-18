<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EncryptionController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Password;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function create() {
        return view('passwords.create');
    }

    public function store(Request $request) {


        $password = new Password($this->validateForm());

        $password->user_id = auth()->id();
        $password->email = EncryptionController::encrypt($password->email);
        $password->web = EncryptionController::encrypt($password->web);
        $password->url_web = EncryptionController::encrypt($password->url_web);
        $password->password = EncryptionController::encrypt($password->password);

        $password->save();

        Alert::storeAlert('Contraseña añadida correctamente');


        return redirect(route('home'));

    }

    public function edit(Password $password) {

        if ($password->user_id != Auth::user()->id) {
            Alert::storeAlert('No tienes permisos para realizar esta acción', 'danger');
            return redirect(route('home'));
        }

        $password->web = EncryptionController::decrypt($password->web);
        $password->url_web = EncryptionController::decrypt($password->url_web);
        $password->email = EncryptionController::decrypt($password->email);
        $password->password = EncryptionController::decrypt($password->password);

        return view('passwords.edit', [
            'password' => $password
        ]);

    }

    public function update(Password $password) {

        if ($this->validateForm()) {

            request()->merge([
                'web' => EncryptionController::encrypt(request()->input('web')),
                'url_web' => EncryptionController::encrypt(request()->input('url_web')),
                'email' => EncryptionController::encrypt(request()->input('email')),
                'password' => EncryptionController::encrypt(request()->input('password'))

            ]);

            Password::where('id', $password->id)->update([
                'web' => request()->input('web'),
                'url_web' => request()->input('url_web'),
                'email' => request()->input('email'),
                'password' => request()->input('password')
            ]);

            Alert::storeAlert('Contraseña editada correctamente');

            return redirect(route('home'));
        }


    }

    public function delete($id) {

        $password = Password::findOrFail($id);

        $password->delete();

        Alert::storeAlert('Contraseña eliminada correctamente');


        return redirect(route('home'));

    }

    protected function validateForm(): array
    {

        return request()->validate([
            'web' => 'required',
            'url_web' =>'url',
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }
}

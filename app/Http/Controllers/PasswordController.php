<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password;

class PasswordController extends Controller
{
    public function create() {
        return view('passwords.create');
    }

    public function store() {


        $password = new Password($this->validatePassword());

        $password->user_id = auth()->id();

        $password->save();

        return redirect(route('home'));

    }

    public function delete($id) {

        $password = Password::findOrFail($id);

        $password->delete();

        return redirect(route('home'));

    }

    protected function validatePassword(): array
    {
        return request()->validate([
            'web' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
    }
}

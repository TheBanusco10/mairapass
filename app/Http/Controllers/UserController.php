<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function updateInformation(User $user) {
        User::where('id', $user->id)->update($this->validateForm());

        return redirect(route('settings', $user));

    }

    public function updatePro(User $user) {
        User::where('id', $user->id)->update(['isPro' => true]);

        return view('purchase-success');

    }

    protected function validateForm(): array
    {
        return request()->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\PurchaseSuccess;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Mail;

class UserController extends Controller
{
    public function updateInformation(User $user) {
        User::where('id', $user->id)->update($this->validateForm());

        return redirect(route('settings', $user));

    }

    public function updatePro(User $user) {

        // Si la cuenta es Pro, redirigimos al inicio para evitar otra compra
        if (Auth::user()->isPro) return redirect(route('home'));

        User::where('id', $user->id)->update(['isPro' => true]);

        Mail::to(Auth::user()->email)->send(new PurchaseSuccess());

        return view('purchase-success');

    }

    public function updateAvatar(User $user, Request $request) {

        if (isset($_POST['change_avatar']))
            User::where('id', $user->id)->update(['avatar_image' => $request->input('avatar_image')]);
        else if (isset($_POST['reset_avatar']))
            User::where('id', $user->id)->update(['avatar_image' => NULL]);

        return redirect(route('settings', $user));
    }

    public function delete() {

        User::findOrFail(Auth::user()->id)->delete();

        return redirect(route('home'));
    }

    protected function validateForm(): array
    {
        return request()->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);
    }
}

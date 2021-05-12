<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function create() {
        return view('cards.create');
    }

    public function store() {


        $card = new Card($this->validateForm());

        $card->user_id = auth()->id();
        $card->title = EncryptionController::encrypt($card->title);
        $card->card_number = EncryptionController::encrypt($card->card_number);
        $card->expiration = EncryptionController::encrypt($card->expiration);
        $card->ccv = EncryptionController::encrypt($card->ccv);

        $card->save();

        return redirect(route('home'));

    }

    public function edit(Card $card) {

        $card->title = EncryptionController::decrypt($card->title);
        $card->card_number = EncryptionController::decrypt($card->card_number);
        $card->expiration = EncryptionController::decrypt($card->expiration);
        $card->ccv = EncryptionController::decrypt($card->ccv);

        return view('cards.edit', [
            'card' => $card
        ]);

    }

    public function update(Card $card) {

        if ($this->validateForm()) {

            request()->merge([
                'title' => EncryptionController::encrypt(request()->input('title')),
                'card_number' => EncryptionController::encrypt(request()->input('card_number')),
                'expiration' => EncryptionController::encrypt(request()->input('expiration')),
                'ccv' => EncryptionController::encrypt(request()->input('ccv'))

            ]);

            Card::where('id', $card->id)->update([
                'title' => request()->input('title'),
                'card_number' => request()->input('card_number'),
                'expiration' => request()->input('expiration'),
                'ccv' => request()->input('ccv')
            ]);

            return redirect(route('home'));
        }


    }

    public function delete($id) {

        $card = Card::findOrFail($id);

        $card->delete();

        return redirect(route('home'));

    }

    protected function validateForm(): array
    {

        return request()->validate([
            'title' => 'required',
            'card_number' =>'required',
            'expiration' => 'required',
            'ccv' => 'required'
        ]);
    }
}

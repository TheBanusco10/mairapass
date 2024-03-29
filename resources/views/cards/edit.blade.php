@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/validateCard.js')  }}"></script>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header">Editar tarjeta</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('updateCard', $card) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Título</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $card->title }}" required autocomplete="title">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card_number" class="col-md-4 col-form-label text-md-right">Número de tarjeta de crédito</label>

                                <div class="col-md-6">
                                    <input id="card_number" pattern="[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}" type="text" placeholder="1234 5678 9123 4567" class="form-control @error('card_number') is-invalid @enderror" name="card_number" value="{{ $card->card_number }}" autocomplete="card_number">

                                    @error('card_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <p id="cardType" class="col-md-2"></p>
                            </div>

                            <div class="form-group row">
                                <label for="expiration" class="col-md-4 col-form-label text-md-right">Caducidad</label>

                                <div class="col-md-6">
                                    <input id="expiration" type="text" placeholder="MM/YYYY" pattern="[0-9]{2}/[0-9]{4}" class="form-control @error('expiration') is-invalid @enderror" name="expiration" value="{{ $card->expiration }}" required autocomplete="expiration">

                                    @error('expiration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="ccv" class="col-md-4 col-form-label text-md-right">CCV</label>

                                <div class="col-md-6">
                                    <input id="ccv" type="password" placeholder="123 o 1234" pattern="[0-9]{3}|[0-9]{4}" class="form-control @error('ccv') is-invalid @enderror" name="ccv" value="{{ $card->ccv }}" required autocomplete="ccv">

                                    @error('ccv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success btn-block w-50">
                                        Editar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>


@endsection

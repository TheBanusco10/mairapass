@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/validateCard.js')  }}"></script>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Añadir tarjeta de crédito</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('createCard') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Título</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

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
                                    <input id="card_number" pattern="[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}" type="text" placeholder="1234 5678 9123 4567" class="form-control @error('card_number') is-invalid @enderror" name="card_number" value="{{ old('card_number') }}" autocomplete="card_number">

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
                                    <input id="expiration" type="text" placeholder="MM/YYYY" pattern="[0-9]{2}/[0-9]{4}" class="form-control @error('expiration') is-invalid @enderror" name="expiration" value="{{ old('expiration') }}" required autocomplete="expiration">

                                    @error('expiration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="ccv" class="col-md-4 col-form-label text-md-right">CCV</label>

                                <div class="input-group col-md-6">
                                    <input id="ccv" type="password" placeholder="123 o 1234" pattern="[0-9]{3}|[0-9]{4}" class="form-control @error('ccv') is-invalid @enderror" name="ccv" value="{{ old('ccv') }}" required autocomplete="ccv">
                                    <div class="input-group-append">
                                        <button title="Mostrar" type="button" class="btn btn-outline-primary showPassword">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </button>
                                    </div>

                                    @error('ccv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block w-50">
                                        Crear
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

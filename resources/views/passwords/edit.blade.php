@extends('layouts.app')

@section('scripts')

    <script src="{{ asset('js/generatePassword.js') }}"></script>

@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header">Editar contraseña</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('updatePassword', $password) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="web" class="col-md-4 col-form-label text-md-right">Web usada</label>

                                <div class="col-md-6">
                                    <input id="web" type="text" class="form-control @error('web') is-invalid @enderror" name="web" value="{{ $password->web }}" required autocomplete="web">

                                    @error('web')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url_web" class="col-md-4 col-form-label text-md-right">Enlace a la web</label>

                                <div class="col-md-6">
                                    <input id="url_web" type="text" placeholder="https://ejemplo.com" class="form-control @error('url_web') is-invalid @enderror" name="url_web" value="{{ $password->url_web }}" autocomplete="url_web">

                                    @error('url_web')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $password->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="password" class="col-md-4 text-md-right">Contraseña</label>
                                <div class="input-group col-md-6">
                                    <input id="password" type="password" value="{{ $password->password }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <div class="input-group-append">
                                        <button title="Generar contraseña" class="btn btn-outline-secondary" type="button" id="generatePassword">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                            </svg>
                                        </button>
                                        <button title="Mostrar" type="button" class="btn btn-outline-primary showPassword">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-4"></div>
                                <div class="col-md-8 d-flex">
                                    <div class="col-4">

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked id="mayusculas">
                                            <label class="form-check-label" for="mayusculas">
                                                Mayúsculas
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-4">

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked id="minusculas">
                                            <label class="form-check-label" for="minusculas">
                                                Minúsculas
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4"></div>
                                <div class="col-md-8 d-flex">
                                    <div class="col-4">

                                        <div class="form-check">
                                            <input class="form-check-input" checked type="checkbox" id="digitos">
                                            <label class="form-check-label" for="digitos">
                                                Dígitos
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-4">

                                        <div class="form-check">
                                            <input class="form-check-input" checked type="checkbox" id="simbolos">
                                            <label class="form-check-label" for="simbolos">
                                                Símbolos
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                @if (\Illuminate\Support\Facades\Auth::user()->isPro)
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 mt-2">
                                        <div class="progress" style="width: 73%">
                                            <div class="progress-bar" id="progresoPassword" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 mt-2">
                                        <p id="textoInformacionPassword"></p>
                                    </div>
                                @endif

                                <div class="col-md-4"></div>
                                <span class="mr-2">6</span>
                                <input id="inputRange" type="range" min="6" max="12" class="col-md-6 p-0">
                                <span class="ml-2">12</span>
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

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Añadir contraseña</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('create') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="web" class="col-md-4 col-form-label text-md-right">Web usada</label>

                                <div class="col-md-6">
                                    <input id="web" type="text" class="form-control @error('web') is-invalid @enderror" name="web" value="{{ old('web') }}" required autocomplete="web">

                                    @error('web')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                                    </div>
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

@extends('layouts.app')

@section('estilos')

    <link rel="stylesheet" href="./css/login.css">

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('2FA') }}</div>

                <div class="card-body">
                    <form method="POST" action="/two-factor-challenge">
                        @csrf

                        <div class="form-group row">
                            <label for="fa" class="col-md-4 col-form-label text-md-right">{{ __('Código') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" name="submit" class="btn btn-primary">
                                </input>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('two-factor.login') }}">
                        @csrf

                        
                        <label for="recovery_code" class="col-md-4 col-form-label text-md-right">{{ __('recovery_code') }}</label>
                        <div class="col-md-6">
                            <input id="recovery_code" type="text" class="form-control @error('code') is-invalid @enderror" name="recovery_code" autocomplete="current-code">
                            
                            @error('recovery_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm code') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

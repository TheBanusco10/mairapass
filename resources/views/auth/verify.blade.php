@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo electrónico para utilizar la aplicación') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un enlace de verificación ha sido enviado a su correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, verifique su cuenta.') }}
                    {{ __('Si no has recibido el enlace de verificación') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Haz click para recibir un nuevo enlace') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

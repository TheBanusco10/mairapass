@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Esta es tu configuración, {{ $usuario->name }}.</h1>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>

@endsection

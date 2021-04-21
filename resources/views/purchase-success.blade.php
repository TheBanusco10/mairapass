@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{asset('css/purchase-success.css')}}">
@endsection

@section('content')

    <div class="container" id="purchaseContainer">
        <div class="row h-100">
            <div class="col-6 text-center d-flex align-items-center flex-column justify-content-center">
                <h2>Compra realizada con éxito</h2>
                <p>Disfruta de tu cuenta PRO con todas las ventajas</p>
                <a href="{{route('home')}}" class="btn btn-success">Volver a mis contraseñas</a>
            </div>
            <div class="col-6 rightColumn"></div>
        </div>
    </div>


@endsection

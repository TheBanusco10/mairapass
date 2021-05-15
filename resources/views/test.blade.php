
@extends('layouts.app')

<?php

    session_start();

    $_SESSION['alerta'] = 'Alerta';

?>

@section('scripts')
    <script>
        $(function () {

            if ($('#alerta').css('display') != 'none') {
                setTimeout(() => {
                    $('#alerta').removeClass().addClass('quitarAlerta');
                }, 3000);
            }

        })

    </script>
@endsection

@section('content')

    @if (isset($_SESSION['alerta']))
    <div id="alerta" class="mostrarAlerta">
        <p id="mensajeAlerta"><?= $_SESSION['alerta'] ?></p>
    </div>
    @endif




@endsection

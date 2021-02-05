@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Esta es tu configuración, {{ $usuario->name }}.</h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Cambiar fondo</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="url">URL de la imagen</label>
                            <input type="text" id="urlImagen" class="form-control">
                            <button class="btn btn-primary mt-3" id="cambiarFondo">Nuevo fondo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

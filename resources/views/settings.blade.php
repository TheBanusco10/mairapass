@extends('layouts.app')

@section('scripts')

    <script src="{{ asset('js/settingsImageApi.js')  }}"></script>

@endsection

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/imageApi.css')  }}">
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
            </div>
            <div class="col-12 mt-5">
                <h1 class="text-center text-light">Esta es tu configuración, {{ $usuario->name }}.</h1>
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Cambiar fondo</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="url">URL de la imagen</label>
                            <input type="text" id="urlImagen" class="form-control">
                            <button class="btn btn-primary mt-3" id="cambiarFondo">Nuevo fondo</button>
                            <button class="btn btn-primary mt-3" id="reiniciarFondo">Reiniciar</button>
                        </div>
                        <form id="imagenesForm">

                            <h3>Busca tu imagen</h3>
                            <input placeholder="Flores, montañas, anime..." type="text" id="buscarImagen" class="form-control">
                            <div id="resultadosImagen">

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Tus datos</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form method="POST" action=" {{route('updateInformation', $usuario)}} ">
                                @csrf
                                @method('PUT')
                                <label for="url">Nombre</label>

                                <input type="text" name="name" id="name" value="{{$usuario->name}}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="url">Correo electrónico</label>

                                <input type="text" name="email" id="email" value={{$usuario->email}} class="form-control @error('email') is-invalid @enderror" required>
                                @error('web')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <button class="btn btn-primary mt-3">Actualizar información</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>


    </div>

@endsection


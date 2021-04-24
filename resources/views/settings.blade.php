@extends('layouts.app')

{{--@section('scripts')--}}
{{--    <script--}}
{{--        src="https://www.paypal.com/sdk/js?client-id=AVfdp_rx6nhe0KGuf5_AKs-qXGlKmZdyzxYeTILLkUOt35nVHG0YVeT7sgeO8po7BFULKUkXnVS6JMld"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.--}}
{{--    </script>--}}
{{--@endsection--}}

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Esta es tu configuración, {{ $usuario->name }}.</h1>
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

            @if (!$usuario->isPro)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Actualiza tu cuenta a PRO</h4>
                    </div>
                    <div class="card-body">
                        <form action="/purchase" method="GET">
                            @csrf
                            <h5>¿Quieres tener las ventajas de la cuenta PRO?</h5>
                            <p>Actualiza ahora tu cuenta para poder añadir contraseñas ilimitadas</p>
                            <button class="btn btn-success">Actualizar a PRO</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

        </div>


    </div>

@endsection


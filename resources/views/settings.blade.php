@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/settings.css')  }}">
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 mt-5 mb-5">
                <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
            </div>

{{--            Imagen de avatar                    --}}
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Cambiar avatar</h4>
                    </div>
                    <div class="card-body d-flex flex-wrap">
                        <div class="col-12 col-md-6">
                            <form method="POST" action=" {{route('updateAvatar', $usuario)}} ">
                                @csrf
                                @method('PUT')
                                    <label for="url">URL de la imagen</label>
                                    <input type="url" pattern="https://.*" id="urlImagenAvatar" name="avatar_image" class="form-control">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <button class="btn btn-primary mt-3" id="cambiarAvatar" name="change_avatar" type="input">Establecer</button>
                                        <button class="btn btn-outline-primary mt-3" id="reiniciarAvatar" name="reset_avatar" type="input">Reiniciar</button>
                                    </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 text-center mt-4 mt-md-0" id="imagenAvatarMuestra">
                            <img src="{{ $usuario->avatar_image ?? '/imgs/avatar.png' }}" class="userAvatar rounded-circle" alt="imagenAvatarMuestra">
                        </div>
                    </div>
                </div>
            </div>

{{--            Fondo de la aplicación              --}}
            <div class="col-12 col-sm-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Cambiar fondo</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="url">URL de la imagen</label>
                            <input type="text" id="urlImagen" class="form-control">
                            <div class="d-flex flex-wrap justify-content-between">
                                <button class="btn btn-primary mt-3" id="cambiarFondo">Nuevo fondo</button>
                                <button class="btn btn-outline-primary mt-3" id="reiniciarFondo">Reiniciar</button>
                            </div>
                        </div>
                        <form id="imagenesForm">

                            <h3>Busca tu imagen</h3>

                            <div class="input-group mb-3">
                                <input placeholder="Flores, montañas, anime..." type="text" id="buscarImagen" class="form-control">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </div>
                            <div id="resultadosImagen">

                            </div>
                        </form>
                    </div>
                </div>
            </div>

{{--            Datos personales                    --}}
            <div class="col-12 col-sm-6 mb-2">
                <div class="card h-100">
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

{{--            2FA                    --}}

            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h4>2FA</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            @if (auth()->user()->two_factor_secret)
                                <div class="fa_information">
                                    <div class="qr_code">
                                        {!! $request->user()->twoFactorQrCodeSvg() !!}
                                    </div>
                                    <div class="recovery_codes">
                                        <p class="mt-2 mt-sm-0 codes_header">Códigos de recuperación</p>
                                        @foreach ((array) $request->user()->recoveryCodes() as $recovery_code)
                                            <p class="codes">
                                                {{ $recovery_code }}    
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <p class="fa_text_information" style="font-size: 13px;">
                                    Para una mayor seguridad, por favor active la verificación en 2 pasos. Se generará un código QR que deberá escanear con una aplicación compatible con códigos OTP en su móvil: Authy, Google Authenticator... 
                                    Cuando inicie sesión en la aplicación, se le pedirá el código de 6 dígitos que le genere la aplicación. Para activar la verificación en 2 pasos deberá confirmar su contraseña antes y ya podrá activarlo con el botón de abajo. 
                                    Además, le indicaremos varios códigos de recuperación para que pueda iniciar sesión si no tiene acceso a su aplicación generadora de códigos.
                                    <br>
                                    ATENCIÓN: No utilice estos códigos de recuperación como contraseña para iniciar sesión habitualmente. Estos códigos son de UN SOLO USO, por lo que tenga mucho cuidado. Mantenga estos códigos bien guardados y no se los pase a nadie.
                                </p>
                            @endif
                        </div>
                        <div class="form-group text-right">
                            <form method="POST" action="/user/two-factor-authentication">
                                @csrf

                                @if (auth()->user()->two_factor_secret)
                                    @method('DELETE')
                                    <button class="btn btn-outline-primary mt-3" data-show_recovery_codes type="button">Mostrar códigos</button>
                                    <button class="btn btn-danger mt-3" type="submit">Desactivar 2FA</button>
                                @else
                                    <button class="btn btn-primary mt-3" type="submit">Activar 2FA</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

{{--            Eliminar cuenta                     --}}
            <div class="col-12 mb-2">
                <div class="card border-0">
                    <div class="card-header bg-danger text-light">
                        <h4>Eliminar cuenta</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('deleteUser') }} " method="POST">
                            @csrf
                            @method('DELETE')

                            <p>IMPORTANTE: Todos los datos de la cuenta se borrarán, esta acción no se puede deshacer.
                            Si quiere continuar, escriba en el campo de abajo <strong>"Eliminar cuenta"</strong> y haga click en el botón para eliminar la cuenta.</p>
                            <div class="input-group">
                                <input type="text" id="eliminarCuentaInput" class="form-control" placeholder="Eliminar cuenta">
                                <div class="input-group-append">
                                    <button title="Eliminar cuenta" class="btn btn-danger" type="submit" id="eliminarCuentaBoton">
                                        Eliminar cuenta
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


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6"> 
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white border-0 py-4 text-center">
                    <h4 class="fw-bold mb-0 text-primary">{{ __('Crear Cuenta') }}</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label small fw-bold">{{ __('Nombre') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Tu nombre completo">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="usuario@correo.com">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small fw-bold">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mínimo 8 caracteres">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label small fw-bold">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repite tu contraseña">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-bold shadow-sm mb-3">
                            {{ __('Registrarse') }}
                        </button>

                        <div class="text-center text-muted small my-3">
                            <hr> <span class="px-2 bg-white" style="position: relative; top: -25px;">O</span>
                        </div>

                        <a href="{{ url('/auth/google') }}" class="btn btn-outline-danger w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                            <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" width="20" alt="Google">
                            <span>{{ __('Registrarse con Google') }}</span>
                        </a>

                        <p class="text-center mt-4 small text-muted">
                            ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Inicia sesión</a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.login')

@section('content')

    <main class="form-signin">
        <form method="POST" action="{{ route('login') }}">
            @csrf
{{--            <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">--}}
            <h1 class="h3 mb-3 fw-normal">Bienvenid@</h1>

            <div class="form-floating">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="form-floating">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <label for="floatingPassword">Contraseña</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
        </form>
    </main>




@endsection

@extends('main')

@section('title', "Connexion")

@section('content')
    <div class="bg-light pt-5" style="height: calc(100dvh - 56px);">
        <div class="bg-white border rounded shadow-sm col-md-6 col-lg-4 col-xl-3 mx-auto p-3">
            <h3>Connexion</h3>
            <form action="" method="post">
                @csrf
                <x-text-field
                    type="email"
                    name="email"
                    id="emailField"
                    class="form-control"
                    label="Adresse e-mail"
                />
                <x-text-field
                    type="password"
                    name="password"
                    id="passwordField"
                    class="form-control"
                    label="Mot de passe"
                />
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-success w-100">Connexion</button>
                </div>
                <div class="form-group mb-3 text-center" style="font-size: 0.85em;">
                    <span><a href="#" class="text-decoration-none link-secondary">Mot de passe oublié ?</a></span>
                    <p>
                        Vous n'avez pas de compte ?
                        <a href="{{ route('user.register') }}" class="text-decoration-none">
                            Inscrivez-vous par ici
                        </a>.
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection

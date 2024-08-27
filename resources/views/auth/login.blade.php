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
                <div class="form-group">
                    <button type="submit" class="btn btn-success w-100">Connexion</button>
                </div>
            </form>
        </div>
    </div>
@endsection

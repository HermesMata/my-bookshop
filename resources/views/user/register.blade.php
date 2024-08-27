@extends('main')

@section('title', "Créer un compte")

@section('content')
    <div class="bg-light pt-5" style="height: calc(100dvh - 56px);">
        <div class="bg-white border rounded shadow-sm col-md-6 col-lg-4 col-xl-3 mx-auto p-3">
            <h3>Inscription</h3>
            <form action="{{ route('user.register') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="nameField" class="form-label">Nom</label>
                    <input type="text" name="name" id="nameField" class="form-control" placeholder="Votre nom">
                </div>
                <div class="form-group mb-3">
                    <label for="emailField" class="form-label">Adresse e-mail</label>
                    <input type="email" name="email" id="emailField" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="passwordField" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="passwordField" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success w-100">Créer mon compte</button>
                </div>
            </form>
        </div>
    </div>
@endsection

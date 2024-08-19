@extends('main')

@section('title', "Connexion")

@section('content')
    <div>
        <form action="" method="post">
            <h3>Connexion</h3>
            <div class="form-group mb-3">
                <label for="emailField" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" id="emailField" class="form-control">
            </div>
        </form>
    </div>
@endsection

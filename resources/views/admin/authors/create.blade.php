@extends('admin')

@section('title', "Ajouter un auteur")

@section('content')
    <div class="mb-3">
        <h1 class="fs-2">Ajouter u nouvel auteur</h1>
    </div>
    @include('admin.includes.edit-author-form')
@endsection

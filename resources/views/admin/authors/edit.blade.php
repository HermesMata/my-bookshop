@extends('admin')

@section('title', "Editer l'auteur : {$author->name}")

@section('content')
    <div class="mb-3">
        <h1 class="fs-2">Modifier l'auteur : {{ $author->name }}</h1>
    </div>
    @include('admin.includes.edit-author-form')
@endsection

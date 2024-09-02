@extends('admin')
@section('title', "Ajouter un nouveau livre à la bibliothèque")

@section('content')
    <section class="mb-3">
        <h1 class="fs-2">
            Modifier le livre :
            <span class="text-secondary">{{ $book->title }}</span>
        </h1>
    </section>
    <section>
        @include('admin.includes.edit-book-form')
    </section>

@endsection

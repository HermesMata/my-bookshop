@extends('admin')

@section('title', "Ajouter une nouvelle catégorie à la bibliothèque")

@section('content')
    <h3>Créer une nouvelle catégorie</h3>
    @include('admin.includes.edit-category-form')
@endsection

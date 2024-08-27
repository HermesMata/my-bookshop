@extends('admin')

@section('title', $category->name . "Éditer la catégorie")

@section('content')
    @include('admin.includes.edit-category-form')
@endsection

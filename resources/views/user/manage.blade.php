@extends('main')

@section('title', $user . " - Gérer mon compte")

@section('content')
    <div class="container">
        @dump($user)
    </div>
@endsection

@extends('main')

@section('title', "Bienvenue à Dream Bookshop")

@section('content')
    <section>
        <div class="container pt-3">
            <h1 class="text-center text-success">{{config("app.name")}}</h1>
            <p class="text-center text-secondary">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, temporibus adipisci maiores praesentium quidem, saepe voluptate provident deserunt suscipit aperiam corrupti unde placeat eos quos nostrum libero nam. Reiciendis, odit.
            </p>
        </div>
    </section>
@endsection

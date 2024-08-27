@extends('admin')

@section('title', 'Les catégories de livres dans la bibliothèque')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <h1>Catégories des livres</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
    </div>
    <div
        class="table-responsive"
    >
        @if (count($categories) > 0)
            <table
                class="table table-stripped table-hover"
            >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom de la catégorie</th>
                        <th scope="col text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = 1;
                    @endphp
                    @foreach ($categories as $category)
                        <tr class="">
                            <th scope="row">{{$index}}</td>
                            <td>R1C2</td>
                            <td>R1C3</td>
                        </tr>
                        @php
                            $index++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        @else
            <div
                class="alert alert-primary"
                role="alert"
            >
                <h4 class="alert-heading">Aucune catégorie pour le moment !</h4>
                <p>Les Catégories dusponibles dans la bibliothèque s'affichent sur cette page. Ainsi vous pouvez complètement les gérer dans cet espace.</p>
                <hr />
                <p class="mb-0">Vous pouvez toujours ajouter une catégorie à tout moment et y apporter des modifications quand vous le souhaiter.</p>
            </div>

        @endif
    </div>

@endsection

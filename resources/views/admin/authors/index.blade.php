@extends('admin')

@section('title', "Gestion des auteurs des livres")

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Auteurs des livres</h2>
        <a href="{{ route('admin.authors.create') }}" class="btn btn-primary">Ajouter un auteur</a>
    </div>
    <section>
        @if (count($authors) > 0)
            <div
            class="table-responsive"
            >
                <table
                    class="table table-striped"
                >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom de l'auteur</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                            <tr class="">
                                <td scope="row">{{ $author->id }}</td>
                                <td>{{ $author->name }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end align-items-center gap-2">
                                        <a href="{{ route('admin.authors.edit', $author) }}" class="btn btn-outline-secondary">
                                            Modifier
                                        </a>
                                        <form action="{{ route('admin.authors.destroy', $author)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $authors->links() }}
        @else
            <div
                class="alert alert-info"
                role="alert"
            >
                <strong>Aucun information disponible !</strong> Il n'y a pax encore d'auteur eenregistré sur le site.
            </div>

        @endif

    </section>
@endsection

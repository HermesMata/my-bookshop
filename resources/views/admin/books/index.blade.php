@extends('admin')

@section('title', "Gestion des livres de la bibliothèque")

@section('content')
    <section class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fs-2">Gestion des livres de la bibliothèque</h1>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Ajouter un livre</a>
    </section>
    <section>
        @if (count($books) > 0)
            <div
                class="table-responsive"
            >
                <table
                    class="table table-hover border"
                >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>{{-- TODO Remplacer l'ID par l'image de couverture du livre --}}
                            <th scope="col">Titre du livre</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr class="">
                                {{-- TODO Image de couverture du livre --}}
                                <td scope="row">
                                    <img
                                        src="{{ Storage::disk('public')->url($book->poster) }}"
                                        alt="Couverture du livre {{$book->title}}"
                                        width="65"
                                        style="aspect-ratio: 12/16;object-fit:cover;object-position:center;"
                                    />
                                </td>
                                {{-- Informations concernant le livre --}}
                                <td>
                                    <div class="fw-bold">{{ $book->title }}</div>
                                    <div>
                                        <span class="text-secondary">&xrArr; {{ $book->author->name }}</span> <div class="vr"></div>
                                        <span class="text-success">&boxbox; {{ $book->category->name }}</span>
                                    </div>
                                </td>
                                {{-- Actions --}}
                                <td>
                                    <div class="d-flex justify-content-end align-items-center gap-2 h-100">
                                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-outline-secondary">
                                            Modifier
                                        </a>
                                        <form action="{{ route('admin.books.destroy', $book) }}" method="post">
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

        @else
            <div
                class="alert alert-info"
                role="alert"
            >
                <strong>Aucun livre disponible !</strong> Il semble qu'il n'y a pas encore de livre dans la bibliothèque.
            </div>

        @endif
    </section>

@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Espace d'administration</title>
    @vite(['resources/js/app.js'])
    {{-- Bibliothèques tierces --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js" defer></script>

</head>
<body>
    {{-- La barre de navigation --}}
    @include('shared.navbar')


    {{-- Le contenu de la page --}}
    <main class="row">
        <div class="col-2 top-0 sticky">
            <nav class="p-2 shadow" style="height: calc(100dvh - 70px);">
                DB Admin
                <!-- Hover added -->
                <div class="list-group border-0">
                    <a
                        href="{{ route("admin.authors.index") }}"
                        @class([
                            'list-group-item list-group-item-action',
                            'active' => Route::is([
                                "admin.authors.index",
                                "admin.authors.view",
                                "admin.authors.create",
                                "admin.authors.edit",
                            ])
                            ])
                    >
                        Auteurs
                    </a>
                    <a
                        href="{{ route("admin.categories.index") }}"
                        @class([
                            'list-group-item list-group-item-action',
                            'active' => Route::is([
                                "admin.categories.index",
                                "admin.categories.view",
                                "admin.categories.create",
                                "admin.categories.edit",
                            ])])
                    >
                        Catégories
                    </a>
                    <a
                        href="{{ route("admin.books.index") }}"
                        @class([
                            'list-group-item list-group-item-action',
                            'active' => Route::is([
                                "admin.books.index",
                                "admin.books.create",
                                "admin.books.view",
                                "admin.books.edit",
                            ])])
                    >
                        Livres
                    </a>
                    <a href="#" class="list-group-item list-group-item-action disabled"
                        >Clients</a
                    >
                </div>
            </nav>

        </div>
        <div class="col-10 pt-3">
            <div class="container">
                {{-- Les messages de session --}}
                @if (session('success'))
                    <div class="my-3">
                        <div
                            class="alert alert-success alert-dismissible fade show"
                            role="alert"
                        >
                            {{ session('success') }}
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close"
                            ></button>
                        </div>
                    </div>

                @endif
                @yield('content')

            </div>
        </div>
    </main>


</body>
</html>

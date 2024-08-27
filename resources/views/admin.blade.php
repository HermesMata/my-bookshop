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
                        href="{{ route("admin.categories.index") }}"
                        @class(['list-group-item list-group-item-action', 'active' => Route::is("admin.categories.index")])
                    >
                        Catégories
                    </a>
                    <a href="#" class="list-group-item list-group-item-action"
                        >Livres</a
                    >
                    <a href="#" class="list-group-item list-group-item-action disabled"
                        >Clients</a
                    >
                </div>
            </nav>

        </div>
        <div class="col-10 pt-3">
            <div class="container">
                @yield('content')

            </div>
        </div>
    </main>


</body>
</html>

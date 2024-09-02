<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js'])
    {{-- Bibliothèques tierces --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js" defer></script>
</head>
<body>
    {{-- La barre de navigation --}}
    @include('shared.navbar')

    {{-- Les messages de session --}}
    @if (session('success'))
        <div class="container">
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
    {{-- Le contenu de la page --}}
    @yield('content')

</body>
</html>

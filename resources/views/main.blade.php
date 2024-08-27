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

    {{-- Le contenu de la page --}}
    @yield('content')

</body>
</html>

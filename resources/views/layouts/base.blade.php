<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ isset($title) ? $title : config('app.name') }}</title>
    <meta http-equiv="content-language" content="fr">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg" href="{{ asset('images/icon.svg') }}" />
    <meta name="description" content="{{ isset($description) ? Str::limit($description, 160, '') : "Trouvez votre futur bien immobilier, Vente et location d’appartements, villas, maisons, terrains et locaux commerciaux." }}">
    <meta name="keywords" content="{{ isset($tags) ? $tags : 'Vente et location, d’appartements, villas, maisons, terrains et locaux commerciaux.' }}">
    <meta itemprop="image" content="{{ isset($image) ? url(config('app.storage'), $image) : asset('images/intercocina-logo.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images\favicon.png') }}">
    <link rel="canonical" href="{{ request()->fullUrl() }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body>
    <x-header />
    <main>
        @yield('content')
    </main>
    <x-footer />
    <x-whatsapp-button />
    @livewireScripts
</body>

</html>

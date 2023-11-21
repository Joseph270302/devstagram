<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Devstagram - @yield('titulo')</title>
    @vite('resources/css/app.css')

</head>

<body>
    <nav>
        <a href="/">Principal</a>
        <a href="/nosotros">Nosotros</a>
        <a href="/tienda">Tienda</a>
        <a href="/contacto">Contacto</a>
    </nav>
    <h1> @yield('titulo')</h1>
    @yield('contenido')
</body>

</html>

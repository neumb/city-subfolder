<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? '' }}</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    </head>
    <body>
        <section class="container mt-5">
            <h1>{{ $title ?? '' }}</h1>
            <hr/>
            @yield('content')
        </section>
    </body>
</html>

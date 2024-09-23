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
        <div class="container">
            @include('nav')
            <h1 class="mt-2">{{ $title ?? '' }}</h1>
            <section class="py-4 border-top">
                @yield('content')
            </section>
        </div>
    </body>
</html>

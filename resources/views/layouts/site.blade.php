<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" >
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body { padding-bottom: 100px; }
        .level { display: flex; align-items: center; }
        .flex { flex: 1; }
    </style>
</head>
<body>
<div id="app">
    @include ('layouts.nav')
    @yield('content')
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

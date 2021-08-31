<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book a Book - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta name="description" content="Book a Book est un site réalisé dans la cadre scolaire de la Haute Ecole de la province de Liège pour le cours de Typographie de Mr Spirlet." >
</head>
<body>
    @yield('content')
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>

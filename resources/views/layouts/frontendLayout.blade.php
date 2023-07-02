<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="gGvxel-XKsdNkFgH6gijPGsFv5zuY9hu9gAPxRmjVaE" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    @spladeHead
    @if (Config::get('app.env') != 'local')
        @include('include.track')
    @endif
    @vite('resources/js/app.js')
</head>
<body>
    <div>
        @splade
    </div>
    @stack('scripts')
</body>
</html>

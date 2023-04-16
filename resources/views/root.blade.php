<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y9EBVC41W1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-Y9EBVC41W1');
        </script>
        <meta name="google-site-verification" content="gGvxel-XKsdNkFgH6gijPGsFv5zuY9hu9gAPxRmjVaE" />
        @spladeHead
        @vite('resources/js/app.js')
    </head>
    <body class="font-sans antialiased">
        @splade
    {{-- bottom navigation --}}
    @include('include.bottomNav')
    <script>
        function showRegPass()
            {
            var x = document.getElementById("password");
            var y = document.getElementById("password_confirmation");
            var check = document.getElementById("show-pass");
                if(check.checked == true)
                {
                x.type = "text";
                y.type = "text";
                }
                else
                {
                x.type = "password";
                y.type = "password";
                }
            }

            function showLoginPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
            }
        </script>
        @stack('scripts')
    </body>
</html>

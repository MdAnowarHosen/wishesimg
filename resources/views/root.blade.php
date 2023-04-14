<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="gGvxel-XKsdNkFgH6gijPGsFv5zuY9hu9gAPxRmjVaE" />
        @spladeHead
        @vite('resources/js/app.js')
    </head>
    <body class="font-sans antialiased">
        @splade

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

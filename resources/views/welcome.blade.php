<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-light text-dark">
        <div class="container">
            <!-- Seu conteúdo HTML existente aqui -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <header class="py-5 text-center">
                        <h1>Bem-vindo ao Laravel com Bootstrap!</h1>
                    </header>

                    <main>
                        <!-- Adicione aqui o conteúdo do seu projeto -->
                    </main>

                    <footer class="py-4 text-center">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Default Layout</title>
    <link rel="stylesheet" href="/styles/styles.css">
    @vite('resources/css/app.css')
</head>
<body>

    <div class="container">
        <header>
            <h1>Databank communicatie</h1>
            <nav class="main-nav">
                <a href="/">Home</a>
                <a href="{{route('posts.create')}}">Add new post</a>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="main-footer">
            <p>Made with Laravel!</p>
        </footer>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Photo</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- npm run dev ou npm run build  -->
</head>

<body>
    <div class="header">
        <!-- <img src="{{ Vite::asset('resources/images/testimage.jpg') }}"> || c'est pour vite.js-->
        <header><a href="/">Album Photo</a></header>
        <nav id="main-nav">
            <a href="/">Accueil</a>
            <a href="/albums">Albums</a>
            <a href="/photos">Photos</a>

            @auth
                <a href="/creerAlbum">Créer Album</a>
                <a href="/ajoutPhoto">Ajout Photo</a>
            @endauth

            @auth
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}">Connexion</a>
                <a href="{{ route('register') }}">Inscription</a>
            @endguest

            @auth
                <a href="/compte"><i class='bx bx-user'></i></a>
            @endauth
        </nav>
    </div>



    <main class="container">
        <div class="content">
            @yield("content")
        </div>
    </main>
</body>

</html>
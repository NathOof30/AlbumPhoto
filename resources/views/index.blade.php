@extends("template")

@section('content')
    <section class="hero" id="home-hero">
        <h1>Bienvenue sur Album Photo</h1>

        <p>Organisez et partagez vos photos par album. Simple, rapide et intuitif.</p>

        <div class="actions">
            <a class="btn" href="/albums">Voir les albums</a>
            <a class="btn" href="/photos">Voir toutes les photos</a>
        </div>

        @auth
            <div class="auth-info">
                <p>Connecté en tant que <span class="user-name">{{ auth()->user()->name }}</span>.</p>
                <div class="auth-buttons">
                    <a class="btn btn-primary" href="/creerAlbum">Créer un album</a>
                    <a class="btn btn-primary" href="/ajoutPhoto">Ajouter une photo</a>
                </div>
            </div>
        @else
            <div class="auth-info">
                <p>Pour ajouter des photos ou créer des albums, <a href="{{ route('register') }}">inscrivez-vous</a> ou <a
                        href="{{ route('login') }}">connectez-vous</a>.</p>
            </div>
        @endauth

        <hr class="hr-sep" />

        <section class="section-steps">
            <h2>Comment ça marche</h2>
            <ol>
                <li>Créez un album.</li>
                <li>Ajoutez une photo dans un album existant (upload local).</li>
                <li>Ajoutez ou choisissez un tag pour organiser vos images.</li>
            </ol>
        </section>
    </section>
@endsection
@extends("template")
@section('content')
    <div class="account-container">
        <h1 class="text-center">Mon Compte</h1>
        <p>Bienvenue, {{ $user->name }} ! Voici les informations de votre compte :</p>
        <ul>
            <li><strong>Nom d'utilisateur :</strong> {{ $user->name }}</li>
            <li><strong>Email :</strong> {{ $user->email }}</li>
            <li><strong>Date d'inscription :</strong> {{ $user->created_at->format('d/m/Y') }}</li>
        </ul>
        <h2>Mes Albums</h2>
        <ul class="albums-list">
            @foreach ($albums as $album)
                <li class="album-item">
                    <a href="/album/{{ $album->id }}">
                        <h3>{{ $album->titre }}</h3>
                        <div class="album-meta">
                            <span>Créé le : {{ $album->creation }}</span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        <h2>Mes Photos</h2>
        <div class="galery">
            @foreach ($photos as $photo)
                <div class="item">
                    <a href="/album/{{ $photo->album_id }}">
                        <img src="{{ $photo->url }}" alt="{{ $photo->titre }}">
                        <h3>{{ $photo->titre }}</h3>
                        <p>
                            Album : {{ $photo->album_id }} • 
                            Note moyenne : {{ number_format($photo->noteMoyenne(), 1) }}/5
                            ({{ $photo->notes->count() }} avis)
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
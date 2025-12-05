@extends('template')

@section('content')
    <h1 class="text-center">Liste des Albums</h1>
    <ul class="albums-list">
        @foreach ($lesAlbums as $album)
            <li class="album-item">
                <a href="/album/{{ $album->id }}">
                    <h3>{{ $album->titre }}</h3>
                    <div class="album-meta">
                        <span>Créé le : {{ $album->creation }}</span>
                        <span>•</span>
                        <span>Propriétaire : {{ $album->user->name ?? 'Inconnu' }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
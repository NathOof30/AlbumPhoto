@extends('template')

@section('content')
    <div class="album-header">
        <h1>{{ $album->titre }}</h1>
        <p class="album-meta">Créé le {{ $album->creation }} • Propriétaire : {{ $album->user->name ?? 'Inconnu' }}</p>
    </div>

    <div class="filtres">
        <form method="GET" action="/album/{{ $album->id }}">
            <input type="search" name="search" placeholder="Rechercher un titre..." value="{{ request('search') }}">

            <select name="tag_id" id="tags">
                <option value="">Sélectionnez un tag</option>
                @foreach ($tags as $t)
                    <option value="{{ $t->id }}" @selected(request('tag_id') == $t->id)>{{ $t->nom }}</option>
                @endforeach
            </select>

            <select name="note" id="notes">
                <option value="">Sélectionnez une note</option>
                @foreach ($notes as $n)
                    <option value="{{ $n }}" @selected((string) request('note') === (string) $n)>{{ $n }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="/album/{{ $album->id }}" class="btn">Réinitialiser</a>
        </form>
    </div>

    <div class="photo-grid">
        @foreach ($photos as $photo)
            <div class="photo-card">
                <img src="{{ $photo->url }}" alt="{{ $photo->titre }}">
                <div class="photo-info">
                    <p class="photo-title">{{ $photo->titre }}</p>
                    <span class="photo-note">Note : {{ $photo->note }}</span>
                    
                    @if(Auth::check() && $photo->user_id === Auth::id())
                        <div class="photo-actions">
                            <form method="POST" action="/deletePhoto/{{ $photo->id }}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    
    @if($photos->isEmpty())
        <div class="empty-state">
            <p>Aucune photo dans cet album.</p>
        </div>
    @endif
@endsection
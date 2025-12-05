@extends('template')

@section('content')
    <h1 class="text-center">Galerie de Photos</h1>

    <div class="filtres">
        <form method="GET" action="/photos">
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
                    <option value="{{ $n }}" @selected((string)request('note') === (string)$n)>{{ $n }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Filtrer</button>
            <a href="/photos" class="btn">Réinitialiser</a>
        </form>
    </div>

    <div class="galery">
        @foreach ($photos as $photo)
            <div class="item">
                <a href="/album/{{ $photo->album_id }}">
                    <img src="{{ $photo->url }}" alt="{{ $photo->titre }}">
                    <h3>{{ $photo->titre }}</h3>
                    <p>Album ID : {{ $photo->album_id }} • Note : {{ $photo->note }}</p>
                </a>
            </div>
        @endforeach
    </div>
    
    @if($photos->isEmpty())
        <div class="empty-state">
            <p>Aucune photo trouvée.</p>
        </div>
    @endif
@endsection
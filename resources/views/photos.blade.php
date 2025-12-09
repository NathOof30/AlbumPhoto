@extends('template')

@section('content')
    <h1 class="text-center">Galerie de Photos</h1>

    <div id="zoomOverlay" class="overlay">
        <span class="close-btn">X</span>
        <img id="overImage" src="" alt="Image en grand">
        <p id="overCaption"></p>
    </div>

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
                <h3>{{ $photo->titre}} </h3>
                <div class="info-photo">
                    <a href="album/{{ $photo->album_id }}"><p>Album : {{ $photo->album_id}} </p></a>
                    <p>{{ $photo->note }} <i class='bx bxs-star'></i></p>
                </div>
                <img 
                    src="{{ $photo->url }}" alt="{{ $photo->titre }}" 
                    class="preview"
                    data-full-src="{{ $photo->url }}"
                >
            </div>
        @endforeach
    </div>
    @if($photos->isEmpty())
        <div class="empty-state">
            <p>Aucune photo trouvée.</p>
        </div>
    @endif
    <script src="{{ asset('zoom-photo.js') }}" defer></script>
@endsection
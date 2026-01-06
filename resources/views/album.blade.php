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

    <div class="galery">
        @foreach ($photos as $photo)
            <div class="item">
                @if(Auth::check() && $photo->user_id === Auth::id())
                    <form method="POST" action="/deletePhoto/{{ $photo->id }}" style="background-color:transparent; position: absolute; top: 12px; right: 12px; margin: 0; z-index: 10; box-shadow : none;">
                        @csrf
                        <button type="submit" class="delete-btn" title="Supprimer cette photo">×</button>
                    </form>
                @endif

                <img 
                    src="{{ $photo->url }}" 
                    alt="{{ $photo->titre }}"
                    class="preview"
                    data-full-src="{{ $photo->url }}"
                >
                
                <h3>{{ $photo->titre }}</h3>
                
                <div class="info-photo">
                    <span>Album : {{ $album->titre }}</span>
                    <span>{{ number_format($photo->noteMoyenne(), 1) }}/5 <i class='bx bxs-star'></i></span>
                </div>

                <div class="photo-actions">
                    <span class="note-display">
                        Note moyenne : {{ number_format($photo->noteMoyenne(), 1) }}/5
                        ({{ $photo->notes->count() }} avis)
                    </span>
                    
                    @auth
                        <form method="POST" action="/noterPhoto/{{ $photo->id }}" class="note-form">
                            @csrf
                            <label for="note-{{ $photo->id }}">Votre note :</label>
                            <select name="note" id="note-{{ $photo->id }}" required>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <button type="submit" class="btn btn-primary">Noter</button>
                        </form>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>

    <div id="zoomOverlay" class="overlay">
        <span class="close-btn">×</span>
        <img id="overImage" src="" alt="Image en grand">
        <p id="overCaption"></p>
    </div>
    
    @if($photos->isEmpty())
        <div class="empty-state">
            <p>Aucune photo dans cet album.</p>
        </div>
    @endif
    
    <script src="{{ asset('zoom-photo.js') }}" defer></script>
@endsection
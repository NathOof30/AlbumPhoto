@extends("template")
@section('content')
    <div class="account-container">
        <h1 class="text-center">Mon Compte</h1>
        <p style="text-align: center; font-size: 1.1rem; margin-bottom: 2rem;">
            Bienvenue, <strong>{{ $user->name }}</strong> ! Voici les informations de votre compte :
        </p>
        
        <div style="max-width: 600px; margin: 0 auto 3rem; background: var(--color-bg-alt); padding: var(--spacing-lg); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);">
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: var(--spacing-md);"><strong>Nom d'utilisateur :</strong> {{ $user->name }}</li>
                <li style="margin-bottom: var(--spacing-md);"><strong>Email :</strong> {{ $user->email }}</li>
                <li><strong>Date d'inscription :</strong> {{ $user->created_at->format('d/m/Y') }}</li>
            </ul>
        </div>

        <h2 style="text-align: center; margin-bottom: var(--spacing-lg); color: var(--color-primary);">Mes Albums</h2>
        @if($albums->isEmpty())
            <div class="empty-state">
                <p>Vous n'avez pas encore créé d'album.</p>
            </div>
        @else
            <div class="photo-album-grid" style="margin-bottom: 3rem;">
                @foreach ($albums as $album)
                    <a href="/album/{{ $album->id }}" class="full-link">
                        <div class="photo-slot">
                            @php
                                $firstPhoto = $album->photos->first();
                            @endphp
                            
                            <div class="album-cover">
                                @if($firstPhoto && $firstPhoto->url)
                                    <img src="{{ $firstPhoto->url }}" alt="Couverture de l'album {{ $album->titre }}" class="album-img" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="image-placeholder" style="display:none;">
                                        <i class='bx bx-image-alt'></i>
                                        <span>Album vide</span>
                                    </div>
                                @else
                                    <div class="image-placeholder">
                                        <i class='bx bx-image-alt'></i>
                                        <span>Album vide</span>
                                    </div>
                                @endif
                            </div>
                            
                            <h3>{{ $album->titre }}</h3>
                            <div class="album-meta">
                                <span>{{ $album->creation }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        <h2 style="text-align: center; margin-bottom: var(--spacing-lg); color: var(--color-primary);">Mes Photos</h2>
        @if($photos->isEmpty())
            <div class="empty-state">
                <p>Vous n'avez pas encore ajouté de photo.</p>
            </div>
        @else
            <div class="galery">
                @foreach ($photos as $photo)
                    <div class="item">
                        <a href="/album/{{ $photo->album_id }}">
                            <div class="image-container">
                                @if($photo->url)
                                    <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" class="preview" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <div class="image-placeholder" style="display:none;">
                                        <i class='bx bx-image-alt'></i>
                                        <span>Image indisponible</span>
                                    </div>
                                @else
                                    <div class="image-placeholder">
                                        <i class='bx bx-image-alt'></i>
                                        <span>Image indisponible</span>
                                    </div>
                                @endif
                            </div>
                        </a>
                        <h3>{{ $photo->titre }}</h3>
                        <div class="info-photo">
                            <a href="/album/{{ $photo->album_id }}">
                                <p>Album : {{ $photo->album_id }}</p>
                            </a>
                            <p>{{ number_format($photo->noteMoyenne(), 1) }}/5 <i class='bx bxs-star'></i></p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
@extends('template')

@section('content')
    <div class="tag-header">
        <h2>Photos liées au tag : <span style="color: var(--color-primary);">{{ $tag->nom }}</span></h2>
    </div>

    @if ($tag && $tag->photos->count() > 0)
        <ul class="tag-photos">
            @foreach ($tag->photos as $photo)
                <li>
                    <img src="{{ $photo->url }}" alt="{{ $photo->titre }}">
                    <p>{{ $photo->titre }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <div class="empty-state">
            <p>Aucune photo liée à ce tag.</p>
        </div>
    @endif
@endsection
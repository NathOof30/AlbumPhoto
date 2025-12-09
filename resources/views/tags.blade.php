@extends('template')

@section('content')
    <h1 class="text-center">Liste des Tags</h1>
    <ul class="tags-list">
        @foreach($tags as $tag)
            <li>
                <a href="{{ url('/tag/' . $tag->id) }}" class="tag-item">{{ $tag->nom }}</a>
            </li>
        @endforeach
    </ul>
    
    @if($tags->isEmpty())
        <div class="empty-state">
            <p>Aucun tag disponible.</p>
        </div>
    @endif
@endsection
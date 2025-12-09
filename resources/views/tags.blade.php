@extends('template')

@section('content')
<ul class="tag-list">
@foreach($tags as $tag)
    <li>
        <a href="{{ url('/tag/' . $tag->id)}}">{{$tag -> nom}}</a>
    </li>
    @endforeach
</ul>
@endsection
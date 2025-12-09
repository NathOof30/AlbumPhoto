@extends('layouts.app')
@section('content')
    <div class="error-page">
        <h1>500</h1>
        <p>Oups… Le serveur a rencontré un problème inattendu.</p>
        <div class="text-center">
            <a href="/albums" class="btn btn-primary">Retour à la liste des albums</a>
        </div>
    </div>
@endsection
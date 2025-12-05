@extends("template")
@section('content')
    <h1>Créer un nouvel album</h1>
    <form action="/storeAlbum" method="POST">
        @csrf
        <label for="titre">Titre de l'album :</label><br>
        <input type="text" id="titre" name="titre" required><br><br>

        <input type="submit" value="Créer l'album">
    </form>
@endsection
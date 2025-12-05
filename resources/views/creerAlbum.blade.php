@extends("template")
@section('content')
    <div class="form-container">
        <h1 class="text-center">Créer un nouvel album</h1>
        
        <form action="/storeAlbum" method="POST" id="create-album-form">
            @csrf
            
            <div class="form-group">
                <label for="titre">Titre de l'album :</label>
                <input type="text" id="titre" name="titre" required placeholder="Ex: Mes vacances 2024">
            </div>

            <div class="form-actions">
                <input type="submit" value="Créer l'album" class="btn btn-primary">
                <a href="/albums" class="btn">Annuler</a>
            </div>
        </form>
    </div>
@endsection
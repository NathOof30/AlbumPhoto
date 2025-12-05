@extends("template")
@section('content')
    <div class="form-container">
        <h1 class="text-center">Inscription</h1>
        
        <form action="{{route("register")}}" method="post" id="register-form">
            @csrf
            
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required placeholder="Votre nom">
            </div>
            
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required placeholder="votre@email.com">
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirmez votre mot de passe">
            </div>

            <div class="form-actions">
                <input type="submit" value="S'inscrire" class="btn btn-primary">
            </div>
            
            <p class="text-center text-muted">
                Déjà un compte ? <a href="{{route("login")}}">Connectez-vous</a>
            </p>
        </form>
    </div>
@endsection
@extends("template")
@section('content')
    <div class="form-container">
        <h1 class="text-center">Connexion</h1>
        <div class="users-form">
            <form action="{{route("login")}}" method="post" id="login-form">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required placeholder="votre@email.com">
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
                </div>
                
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="remember">
                        Se souvenir de moi
                    </label>
                </div>

                <div class="form-actions">
                    <input type="submit" value="Se connecter" class="btn btn-primary">
                </div>
                
                <p class="text-center text-muted">
                    Pas encore de compte ? <a href="{{route("register")}}">Inscrivez-vous</a>
                </p>
            </form>
        </div>
    </div>
@endsection
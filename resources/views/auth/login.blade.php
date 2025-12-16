@extends("template")
@section('content')
    <div class="form-container">
        <h1 class="text-center">Connexion</h1>
        
        <form action="{{route("login")}}" method="post" id="login-form">
            @csrf
            
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="votre@email.com">
                @error('email') <span style="color:red; font-size:0.9rem;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
                @error('password') <span style="color:red; font-size:0.9rem;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label class="remember">
                    Se souvenir de moi
                    <input type="checkbox" name="remember">
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
@endsection
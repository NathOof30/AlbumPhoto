@extends("template")
@section('content')
    <div class="form-container">
        <h1 class="text-center">Inscription</h1>
        
        <form action="{{route("register")}}" method="post" id="register-form">
            @csrf
            
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Votre nom">
                @error('name') <span style="color:red; font-size:0.9rem;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="votre@email.com">
                @error('email') <span style="color:red; font-size:0.9rem;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe (min 8 caractères) :</label>
                <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
                @error('password') <span style="color:red; font-size:0.9rem;">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirmez votre mot de passe">
                @error('password_confirmation') <span style="color:red; font-size:0.9rem;">{{ $message }}</span> @enderror
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
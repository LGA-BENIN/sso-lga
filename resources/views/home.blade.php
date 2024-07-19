<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>
    <h1>Vous êtes connecté</h1>
    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <!-- Formulaire de déconnexion -->
    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
</body>
</html>

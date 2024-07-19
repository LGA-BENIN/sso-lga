<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion - lesgrandesaffaires.com</title>
    <!-- Inclure ici les liens vers les feuilles de style CSS -->
</head>
<body>
    <div class="container">
        <h1>Déconnexion</h1>
        <p>Êtes-vous sûr de vouloir vous déconnecter ?</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Déconnexion</button>
        </form>
    </div>
    <!-- Inclure ici les scripts JavaScript -->
</body>
</html>

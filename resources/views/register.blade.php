<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 12px;
        }
        .link {
            text-align: center;
            margin-top: 20px;
        }
        .link a {
            color: #007bff;
            text-decoration: none;
        }
        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <label for="firstname">Prénom :</label>
            <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required>

            <label for="lastname">Nom :</label>
            <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="phone_number">Numéro de téléphone :</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirmez le mot de passe :</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <label for="id_gender">Genre :</label>
            <input type="number" id="id_gender" name="id_gender" value="{{ old('id_gender') }}">

            <label for="birthday">Date de naissance :</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}">

            <label for="newsletter">Abonné à la newsletter :</label>
            <input type="checkbox" id="newsletter" name="newsletter" {{ old('newsletter') ? 'checked' : '' }}>

            <label for="optin">Opt-in :</label>
            <input type="checkbox" id="optin" name="optin" {{ old('optin') ? 'checked' : '' }}>

            <button type="submit">S'inscrire</button>
        </form>

        <div class="link">
            Déjà inscrit ? <a href="{{ url('/login') }}">Connectez-vous ici</a>
        </div>
    </div>
</body>
</html>

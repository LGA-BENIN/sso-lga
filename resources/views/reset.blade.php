<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
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
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
        <h1>Reset Password</h1>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reset.password') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}">
            <span class="invalid-feedback">
                {{ $errors->first('email') }}
            </span>

            <label for="password">Mot de passe </label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" value="{{ old('password') }}">
            <span class="invalid-feedback">
                {{ $errors->first('password') }} 
            </span>

            <label for="password">Confirmez votre mot de passe </label>
            <input type="password" id="password" name="password_confirmation" placeholder="Confirmez votre mot de passe" value="{{ old('password_confirmation') }}">
            <span class="invalid-feedback">
                {{ $errors->first('password_confirmation') }}
            </span>

            <button type="submit">Reset password</button>
        </form>


        <div class="link">
            Déjà inscrit ? <a href="{{ url('/login') }}">Se cvonnecter</a>
        </div>
    </div>
</body>
</html>

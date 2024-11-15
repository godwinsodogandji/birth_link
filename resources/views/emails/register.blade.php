<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            color: #2d3748;
            margin-bottom: 10px;
        }
        p {
            color: #4a5568;
            margin: 10px 0;
        }
        .password {
            background-color: #edf2f7;
            padding: 10px;
            border-radius: 4px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            color: #2d3748;
        }
        .login-button {
            background-color: #3182ce;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
        .login-button:hover {
            background-color: #2b6cb0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Bienvenue, {{ $user->username }}!</h1>
        <p>Vous avez été enregistré avec succès. Voici votre mot de passe :</p>
        <p class="password"><strong>{{ $password }}</strong></p>
        <p>Vous pouvez maintenant vous connecter à votre compte.</p>
        <a href="{{ route('login') }}" class="login-button">Se connecter</a>
    </div>
</body>

</html>

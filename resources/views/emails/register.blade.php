<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue, {{ $user->username }}!</h1>
    <p>Vous avez été enregistré avec succès. Voici votre mot de passe :</p>
    <p><strong>{{ $password }}</strong></p>
    <p>Vous pouvez maintenant vous connecter à votre compte.</p>
</body>
</html>

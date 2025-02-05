<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="/register">
        <div>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">S'inscrire</button>
    </form>
    
    <p>Déjà un compte ? <a href="/login">Se connecter</a></p>
</body>
</html>


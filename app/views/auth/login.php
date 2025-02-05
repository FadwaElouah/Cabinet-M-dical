<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="/login">
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="user_type">Type d'utilisateur :</label>
            <select id="user_type" name="user_type" required>
                <option value="patient">Patient</option>
                <option value="doctor">Médecin</option>
                <option value="admin">Administrateur</option>
            </select>
        </div>

        <button type="submit">Se connecter</button>
    </form>
    
    <p>Pas encore de compte ? <a href="/register">S'inscrire</a></p>
</body>
</html>


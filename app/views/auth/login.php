<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 2rem;
        }

        .error {
            background-color: #fff5f5;
            color: #c53030;
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        form div {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            color: #4a5568;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        input, select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: white;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background-color: #4299e1;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #3182ce;
        }

        .register-link {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.875rem;
            color: #4a5568;
        }

        .register-link a {
            color: #4299e1;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .user-type-icon {
            opacity: 0.7;
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <label for="user_type">Type d'utilisateur</label>
                <select id="user_type" name="user_type" required>
                    <option value="patient">👤 Patient</option>
                    <option value="doctor">👨‍⚕️ Médecin</option>
                    <option value="admin">🔧 Administrateur</option>
                </select>
            </div>

            <button type="submit">Se connecter</button>
        </form>
        
        <p class="register-link">Pas encore de compte ? <a href="/register">S'inscrire</a></p>
    </div>
</body>
</html>
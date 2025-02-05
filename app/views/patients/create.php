<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un patient</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Ajouter un patient</h1>
    <?php if (isset($data['error'])): ?>
        <p class="error"><?= htmlspecialchars($data['error']) ?></p>
    <?php endif; ?>
    <form id="patientForm" action="/patients/create" method="post">
        <input type="hidden" name="csrf_token" value="<?= $data['csrf_token'] ?>">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required minlength="2" maxlength="100" pattern="[A-Za-z\s]+" title="Le nom doit contenir uniquement des lettres et des espaces">
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required minlength="2" maxlength="100" pattern="[A-Za-z\s]+" title="Le prénom doit contenir uniquement des lettres et des espaces">
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" required pattern="[0-9]{10}" title="Le numéro de téléphone doit contenir 10 chiffres">
        </div>
        <button type="submit">Ajouter</button>
    </form>

    <script src="/js/patientValidation.js"></script>
</body>
</html>


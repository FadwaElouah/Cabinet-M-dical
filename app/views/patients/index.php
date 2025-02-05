<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des patients</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Liste des patients</h1>
    <a href="/patients/create">Ajouter un patient</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['patients'] as $patient): ?>
            <tr>
                <td><?= htmlspecialchars($patient['nom']) ?></td>
                <td><?= htmlspecialchars($patient['prenom']) ?></td>
                <td><?= htmlspecialchars($patient['email']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un rendez-vous</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Créer un rendez-vous</h1>
    <form action="/rendez-vous/create" method="post">
        <div>
            <label for="patient_id">Patient :</label>
            <select name="patient_id" id="patient_id" required>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?= $patient->getId() ?>"><?= htmlspecialchars($patient->getNom() . ' ' . $patient->getPrenom()) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="medecin_id">Médecin :</label>
            <select name="medecin_id" id="medecin_id" required>
                <?php foreach ($medecins as $medecin): ?>
                    <option value="<?= $medecin->getId() ?>"><?= htmlspecialchars($medecin->getNom() . ' ' . $medecin->getPrenom()) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="date_heure">Date et heure :</label>
            <input type="datetime-local" name="date_heure" id="date_heure" required>
        </div> 
        <div>
            <label for="motif">Motif :</label>
            <textarea name="motif" id="motif" required></textarea>
        </div>
        <button type="submit">Créer le rendez-vous</button>
    </form>
</body>
</html>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Tableau de bord</h1>
    <div class="dashboard-stats">
        <div class="stat-box">
            <h3>Total des patients</h3>
            <p><?= $totalPatients ?></p>
        </div>
        <div class="stat-box">
            <h3>Total des médecins</h3>
            <p><?= $totalMedecins ?></p>
        </div>
        <div class="stat-box">
            <h3>Total des rendez-vous</h3>
            <p><?= $totalRendezVous ?></p>
        </div>
    </div>
    <h2>Rendez-vous d'aujourd'hui</h2>
    <table>
        <thead>
            <tr>
                <th>Patient</th>
                <th>Médecin</th>
                <th>Heure</th>
                <th>Motif</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rendezVousAujourdhui as $rdv): ?>
                <tr>
                    <td><?= htmlspecialchars($rdv->getPatient()->getNom() . ' ' . $rdv->getPatient()->getPrenom()) ?></td>
                    <td><?= htmlspecialchars($rdv->getMedecin()->getNom() . ' ' . $rdv->getMedecin()->getPrenom()) ?></td>
                    <td><?= htmlspecialchars($rdv->getDateHeure()->format('H:i')) ?></td>
                    <td><?= htmlspecialchars($rdv->getMotif()) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>


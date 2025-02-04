<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Animaux à Vendre</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/a_vendre.css">
</head>
<body>
    <h1>Liste des animaux à acheter</h1>

    <div class="animal-container">
        <?php foreach ($animaux as $anim) { ?>
            <div class="animal-card">
                <img src="<?= BASE_URL ?>public/assets/images/1.jpg" alt="Animal">
                <h2><?= htmlspecialchars($anim['nom_animal']); ?></h2>
                <p>Poids actuel: <strong><?= htmlspecialchars($anim['poids_initial']); ?> kg</strong></p>
                <button class="buy-button">🛒 Acheter</button>
            </div>
        <?php } ?>
    </div>
</body>
</html>

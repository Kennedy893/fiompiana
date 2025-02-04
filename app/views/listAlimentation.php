<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Alimentations</title>
    <link rel="stylesheet" href="public/assets/css/styles.css">
</head>
<body>
    <h2>Liste des Alimentations</h2>

    <div class="container">
        <?php foreach ($alimentations as $aliment) : ?>
            <div class="card">
                <img src="/public/assets/img/<?= htmlspecialchars($aliment['image_alimentation']) ?>" alt="<?= htmlspecialchars($aliment['nom_alimentation']) ?>">
                <p><strong><?= htmlspecialchars($aliment['nom_alimentation']) ?></strong></p>
                <p>Prix : <?= htmlspecialchars($aliment['prix_kg']) ?> MGA</p>
                <p>Gain : <?= htmlspecialchars($aliment['gain']) ?>%</p>
                <form action="/achatAlimentationFormulaire" method="get">
                    <input type="hidden" name="idAlimentation" value="<?= htmlspecialchars($aliment['id_alimentation']) ?>">
                    <button type="submit">Acheter</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="/alimentationAcheter">Mes aliments</a>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation d'Achat</title>
    <link rel="stylesheet" href="/public/assets/css/aliment.css">
</head>
<body>

    <div class="container">
        <h2>Confirmer l'Achat</h2>

        <p>
            <img src="/public/assets/img/<?= htmlspecialchars($aliment['image_alimentation']) ?>" 
                 alt="<?= htmlspecialchars($aliment['nom_alimentation']) ?>" 
                 width="100">
        </p>
        <p><strong>Aliment :</strong> <?= htmlspecialchars($aliment['nom_alimentation']) ?></p>
        <p><strong>Prix :</strong> <?= htmlspecialchars($aliment['prix_kg']) ?> MGA</p>
        <p><strong>Pourcentage de Gain :</strong> <?= htmlspecialchars($aliment['gain']) ?>%</p>
        
       

        <form action="/alimentationAcheter" method="post">
            <input type="hidden" name="idAlimentation" value="<?= htmlspecialchars($aliment['id_alimentation']) ?>">

            <label for="quantite">Quantité :</label>
            <input type="number" id="quantite" name="quantite" value="1" min="1" required>

            <button type="submit">Valider l'achat</button>
        </form> 

        <a href="/listAlimentation">Annuler</a>
    </div>

</body>
</html>

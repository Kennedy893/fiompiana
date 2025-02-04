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
            <form action="<?= BASE_URL ?>accueil/acheter/<?= $anim['id_animal'] ?>/<?= $anim['id_eleveur'] ?>" method="get">
                <img src="<?= BASE_URL ?>public/assets/images/1.jpg" alt="Animal">
                <h2><?= htmlspecialchars($anim['nom_animal']); ?></h2>
                <p>Poids actuel: <strong><?= htmlspecialchars($anim['poids_initial']); ?> kg</strong></p>

                <!-- Option pour activer/désactiver l'autovente -->
                <p><label>
                    <input type="checkbox" name="autovente" id="autovente_<?= $anim['id_animal'] ?>" onchange="toggleDateInput(<?= $anim['id_animal'] ?>)"> Activer l'autovente
                </label></p>

                <!-- Champ de date de vente (désactivé par défaut) -->
                <p><label for="date_vente_<?= $anim['id_animal'] ?>">Date de vente :</label>
                <input type="date" name="date_vente" id="date_vente_<?= $anim['id_animal'] ?>" disabled></p>

                <button class="buy-button" type="submit">🛒 Acheter</button>
            </form>
        </div>
        <?php } ?>
    </div>

<!-- Script pour activer/désactiver la date de vente -->
<script>
    function toggleDateInput(id) 
    {
        let checkbox = document.getElementById("autovente_" + id);
        let dateInput = document.getElementById("date_vente_" + id);
        dateInput.disabled = checkbox.checked; // Désactiver le champ date si autovente est activée
    }
</script>

</body>
</html>

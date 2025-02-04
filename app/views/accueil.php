<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevage</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/form_styles.css">
</head>
<body>
    <div class="search">
        <form action="" method="get">
            <input type="text" class="searchTerm" placeholder="recherche">
            <input type="submit" value="Rechercher">
        </form>
    </div>
    <div class="sidebar">
        <a href="<?= BASE_URL ?>accueil/achat-animaux">Achat animaux</a>
        <a href="<?= BASE_URL ?>accueil/vente-animaux">Vente animaux</a>
        <a href="<?= BASE_URL ?>accueil/achat-alimentation">Achat alimentation</a>
        <a href="<?= BASE_URL ?>accueil/prevision">Prevision</a>
        <a href="<?= BASE_URL ?>type_animal">Parametrage</a>
    </div>
    <?php
        if(isset($data['result']))
        {
    ?>
    <table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom Animal</th>
        <th>Type</th>
        <th>Éleveur</th>
        <th>Poids Initial (kg)</th>
        <th>Poids Actuel (kg)</th>
        <th>Statut Vivant</th>
        <th>Statut Vente</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($data['result']['animaux'] as $donnee) {
    ?>
        <tr>
            <td><?php echo $donnee['id_animal']; ?></td>
            <td><?php echo $donnee['nom_animal']; ?></td>
            <td><?php echo $donnee['id_type']; ?></td>
            <td><?php echo $donnee['id_eleveur']; ?></td>
            <td><?php echo $donnee['poids_initial']; ?></td>
            <td><?php echo $donnee['poids_actuel']; ?></td>
            <td><?php echo $donnee['status_vivant'] ? 'Oui' : 'Non'; ?></td>
            <td><?php echo $donnee['status_vente'] ? 'Oui' : 'Non'; ?></td>
        </tr>
    <?php
    }
    ?>
</tbody>
</table>
<table>
<thead>
    <tr>
        <th>ID Stockage</th>
        <th>Éleveur</th>
        <th>Alimentation</th>
        <th>Quantité (kg)</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($data['result']['stock'] as $donnee) {
    ?>
        <tr>
            <td><?php echo $donnee['id_stockage']; ?></td>
            <td><?php echo $donnee['id_eleveur']; ?></td>
            <td><?php echo $donnee['id_alimentation']; ?></td>
            <td><?php echo $donnee['quantite']; ?></td>
        </tr>
    <?php
    }
    ?>
</tbody>

</table>

    <?php
        }
        else
        {
    ?>
            <div class="form-container">
        <h1>Estimation</h1>
    
            <form action="<?=BASE_URL ?>dashboard" method="post" class="form">
                <div class="form-group">
                    <label>Date </label>
                    <input type="date" name="date" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="button">Valider</button>
                </div>
            </form>
        </div>
    <?php
        }

    ?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevage</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/Haccueil.css">
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
</body>
</html>
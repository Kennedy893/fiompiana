<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="form-styles.css">
</head>
<body>
    <div class="search">
        <form action="" method="get">
            <input type="text" class="searchTerm" placeholder="recherche">
            <input type="submit" value="Rechercher">
        </form>
    </div>
    <div class="sidebar">
        <a href="liste_crud.html">Produits</a>
        <a href="liste_crud_table.html">Categories</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div> 
    <div class="form-container">
        <h1>Formulaire d'inscription</h1>
        <form action="" method="post" class="form">
            <div class="form-group">
                <label for="first-name">Prénom</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>
            <div class="form-group">
                <label for="last-name">Nom</label>
                <input type="text" id="last-name" name="last-name" required>
            </div>
            <div class="form-group">
                <label for="country">Pays</label>
                <select id="country" name="country" required>
                    <option value="madagascar">Madagascar</option>
                    <option value="other">Autre</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Envoyer</button>
            </div>
        </form>
    </div>
</body>
</html>

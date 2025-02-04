
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/admin_crud-table.css">
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
        <a class="active" href="liste_crud_table.html">Categories</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div> 
    <div class="products-container">
        <h1>Liste des Produits</h1>
        <table class="products-table">
            <thead>
                <?php
                if(isset($data['elevage_type_animal']))
                {
                ?>

                <?php
                }
                if(isset($data['elevage_alimentation']))
                {
                ?>
                
                <?php
                }
                ?>
                <tr>
                    <th>Nom du produit</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Produit 1</td>
                    <td>Description rapide de ce produit avec ses caractéristiques principales.</td>
                    <td class="card-buttons">
                        <button class="button edit-button">Modifier</button>
                        <button class="button delete-button">Supprimer</button>
                        <button class="button add-button">Ajouter</button>
                    </td>
                </tr>
                
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="page-link">&laquo;</a>
            <a href="#" class="page-link active">1</a>
            <a href="#" class="page-link">2</a>
            <a href="#" class="page-link">3</a>
            <a href="#" class="page-link">&raquo;</a>
        </div>
        <div class="add-product">
            <a href="formulaire.html"><button class="button add-product-button">+</button></a>
        </div>
    </div>
</body>
</html>

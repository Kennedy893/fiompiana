
<?php
    $titre;
    $link;
    if(isset($data['elevage_type_animal']))
    {
        $titre="Liste des animaux";
        $link="<a class='active' href='".BASE_URL."type_animal'>Animaux</a>
        <a href='".BASE_URL."type_alimentation'>Alimentation</a>";
    }
    if(isset($data['elevage_alimentation']))
    {
        $titre="Liste des alimentations";
        $link="<a href='".BASE_URL."type_animal'>Animaux</a>
        <a class='active' href='".BASE_URL."type_alimentation'>Alimentation</a>";
    }
?>
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
        <?=$link ?>
    </div> 
    <div class="products-container">
        <h1><?=$titre ?></h1>
        <table class="products-table">
                <?php
                if(isset($data['elevage_type_animal']))
                {
                    
                ?>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>alimentation</th>
                        <th>nom</th>
                        <th>poids min (kg)</th>
                        <th>poids max (kg)</th>
                        <th>prix par kg</th>
                        <th>resistance (jrs)</th>
                        <th>perte de poids</th>
                        <th>consommation quotidienne</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($data['elevage_type_animal'] as $donnee)
                    {
                ?>
                    <tr>
                        <td><?php echo $donnee->getIdType(); ?></td>
                        <td><?php echo $donnee->getAlimentation()->getNom(); ?></td>
                        <td><?php echo $donnee->getNomType(); ?></td>
                        <td><?php echo $donnee->getPoidsMin(); ?></td>
                        <td><?php echo $donnee->getPoidsMax(); ?></td>
                        <td><?php echo $donnee->getPrixkg(); ?></td>
                        <td><?php echo $donnee->getNbrJrsDead(); ?></td>
                        <td><?php echo $donnee->getPerteSansManger(); ?></td>
                        <td><?php echo $donnee->getConsoJrs(); ?></td>
                        <td class="card-buttons">
                            <a href="<?=BASE_URL ?>type_animal/modif?id=<?=$donnee->getIdType(); ?>"><button class="button edit-button">Modifier</button></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                
                </tbody>    
                <?php
                }
                if(isset($data['elevage_alimentation']))
                {
                ?>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>prix/kg</th>
                        <th>gain (%)</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($data['elevage_alimentation'] as $donnee)
                    {
                ?>
                    <tr>
                        <td><?php echo $donnee->getIdAlimentation(); ?></td>
                        <td><?php echo $donnee->getNom(); ?></td>
                        <td><?php echo $donnee->getPrix_kg(); ?></td>
                        <td><?php echo $donnee->getGain(); ?></td>
                        <td class="card-buttons">
                            <a href="<?=BASE_URL ?>type_alimentation/modif?id=<?=$donnee->getIdAlimentation(); ?>"><button class="button edit-button">Modifier</button></a>
                            
                            <!--<button class="button add-button">Ajouter</button>-->
                        </td>
                    </tr>
                <?php
                    }
                }
                ?>
                
        </table>

        <!-- Pagination -->
        <!--
        <div class="pagination">
            <a href="#" class="page-link">&laquo;</a>
            <a href="#" class="page-link active">1</a>
            <a href="#" class="page-link">2</a>
            <a href="#" class="page-link">3</a>
            <a href="#" class="page-link">&raquo;</a>
        </div>
        -->
        <!--<div class="add-product">
            <a href="formulaire.html"><button class="button add-product-button">+</button></a>
        </div>-->
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="<?=BASE_URL ?>public/assets/css/form_styles.css">
</head>
<body>
    <div class="search">
        <form action="" method="get">
            <input type="text" class="searchTerm" placeholder="recherche">
            <input type="submit" value="Rechercher">
        </form>
    </div>
    <div class="sidebar">
        <a href='<?=BASE_URL ?>type_animal'>Animaux</a>
        <a href='<?=BASE_URL ?>type_alimentation'>Alimentation</a>
    </div> 
    <div class="form-container">
<?php
    if($data['action']=="elevage_type_animal")
    {
?>
    <h1>Formulaire de modification animal</h1>
        <form action="<?=BASE_URL ?>type_animal/modif/confirm?id=<?=$data['valeur']->getIdType() ?>" method="post" class="form">
            <div class="form-group">
                <label>Alimentation</label>
                <select name="alimentation" required>
                    <?php
                        foreach($data['need'] as $donnee)
                        {
                    ?>
                    <option value="<?=$donnee->getIdAlimentation() ?>"><?=$donnee->getNom() ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>nom de type</label>
                <input type="text" name="nom" value="<?=$data['valeur']->getNomType() ?>" required>
            </div>
            <div class="form-group">
                <label>Poids minimal</label>
                <input type="number" name="min" value="<?=$data['valeur']->getPoidsMin() ?>" required>
            </div>
            <div class="form-group">
                <label>Poids maximal</label>
                <input type="number" name="max" value="<?=$data['valeur']->getPoidsMax() ?>" required>
            </div>
            <div class="form-group">
                <label>Prix/kg</label>
                <input type="number" name="prix_kg" value="<?=$data['valeur']->getPrixkg() ?>" required>
            </div>
            <div class="form-group">
                <label>Resistance</label>
                <input type="number" name="resist" value="<?=$data['valeur']->getNbrJrsDead() ?>" required>
            </div>
            <div class="form-group">
                <label>Perte de poids</label>
                <input type="number" name="perte" value="<?=$data['valeur']->getPerteSansManger() ?>" required>
            </div>
            <div class="form-group">
                <label>Conso par jours</label>
                <input type="number" name="conso" value="<?=$data['valeur']->getConsoJrs() ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Modifier</button>
            </div>
        </form>
<?php
    }
    if($data['action']=="elevage_alimentation")
    {
?>
<h1>Formulaire de modification alimentations</h1>

        <form action="<?=BASE_URL ?>type_alimentation/modif/confirm?id=<?=$data['valeur']->getIdAlimentation() ?>" method="post" class="form">
            <div class="form-group">
                <label>nom </label>
                <input type="text" name="nom" value="<?=$data['valeur']->getNom() ?>" required>
            </div>
            <div class="form-group">
                <label>Prix par kilo</label>
                <input type="number" name="prix_kg" value="<?=$data['valeur']->getPrix_kg() ?>" required>
            </div>
            <div class="form-group">
                <label>Gain de poids</label>
                <input type="number" name="gain" value="<?=$data['valeur']->getGain() ?>" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="button">Modifier</button>
            </div>
        </form>
<?php
    }

?>
    </div>
</body>
</html>

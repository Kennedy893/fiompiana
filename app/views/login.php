<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/login_style_h.css">
</head>
<body>
    
    <div class="login-container">
        <form action="<?=BASE_URL ?>verify_login" method="post" class="login-form">
            <h2>Gestion d'Elevage</h2>
            <p>
                <label for="nom">Nom d'utilisateur</label>
                <input type="text" name="nom" placeholder="Entrez votre nom" value="Jean Dupont" required >
            </p>
            <p>
                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" placeholder="Entrez votre mot de passe" value="mdp1" required >
            </p>
            <p>
                <input type="submit" value="Se connecter" class="submit-button">
            </p>
            <?php
                if(isset($data['error']))
                {
            ?>
                <p class="error-message">
                Nom d'utilisateur ou mot de passe incorrect.
                </p>
            <?php
                }
            ?>
            
        </form>
    </div>
</body>
</html>

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
        <form action="liste_crud.html" method="post" class="login-form">
            <h2>Gestion d'Elevage</h2>
            <p>
                <label for="nom">Nom d'utilisateur</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" required >
            </p>
            <p>
                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" id="pass" placeholder="Entrez votre mot de passe" required >
            </p>
            <p>
                <input type="submit" value="Se connecter" class="submit-button">
            </p>
            <p class="error-message">
                Nom d'utilisateur ou mot de passe incorrect.
            </p>
        </form>
    </div>
</body>
</html>

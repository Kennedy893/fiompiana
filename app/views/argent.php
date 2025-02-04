<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Montant du Capital</title>
    <link rel="stylesheet" href="/public/assets/css/capital.css">
</head>
<body>
    <h1>Montant du Capital</h1>
    <?php if ($montant !== null): ?>
        <p>Le montant du capital est : <?php echo htmlspecialchars($montant); ?> €</p>
    <?php else: ?>
        <p>Aucun montant trouve.</p>
    <?php endif; ?>
    <a href="/depotArgent">Depot Argent</a>
</body>
</html>
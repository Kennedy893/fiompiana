<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📊 Situation de l'Élevage</title>
</head>
<body>

<h1>📊 Situation de l'Élevage</h1>

    <label for="date-situation">Sélectionner une date :</label>
    <input type="date" id="date-situation">
    <button onclick="loadSituation()">Afficher la situation</button>

    <div id="page_prevision"></div>

    <script>
    function loadSituation() {
        let date = document.getElementById("date-situation").value;

        if (!date) {
            alert("Veuillez sélectionner une date.");
            return;
        }

        fetch(`<?= BASE_URL ?>accueil/situationElevage?date=${date}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erreur de récupération des données.");
                }
                return response.json();
            })
            .then(data => {
                generateAnimalHTML(data);
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert("Une erreur est survenue lors du chargement des données.");
            });
    }

    function generateAnimalHTML(animals) {
        let htmlContent = "";

        animals.forEach(animal => {
            htmlContent += `
                <div class="col mt-5">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden mt-5">
                        <img class="card-img-top img-fluid" src="<?= BASE_URL ?>public/assets/images/${animal.image || 'default.jpg'}" 
                            alt="Image de ${animal.nom_animal}" style="height: 200px; object-fit: cover;">

                        <div class="card-body text-center p-3">
                            <h5 class="card-title text-dark fw-bold">${animal.nom_animal}</h5>
                            <p class="card-text text-muted">
                                <strong>Type :</strong> ${animal.nom_type}<br>
                                <strong>Poids Actuel :</strong> ${animal.poids_actuel} kg<br>
                                <strong>Poids Max :</strong> ${animal.poids_max} kg<br>
                                <strong>Dernier repas :</strong> ${animal.dernier_repas || 'N/A'}<br>
                                <strong>Nb jours sans manger :</strong> ${animal.nombre_sans_manger}<br>
                                <strong> Quota :</strong> ${animal.quota.toFixed(2)} kg/jour<br>
                                <strong>Statut :</strong> <span>${animal.statut}</span>
                            </p>
                        </div>
                    </div>
                </div>
            `;
        });

        document.getElementById('page_prevision').innerHTML = htmlContent;
    }
</script>

</body>
</html>

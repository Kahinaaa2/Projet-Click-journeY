<?php
// Initialisation des variables
$ville = isset($_GET['ville']) ? htmlspecialchars($_GET['ville']) : 'PARIS';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données
    $nombreAdultes = (int)$_POST['adults'];
    $nombreEnfants = (int)$_POST['enfants'];
    $depart = $_POST['depart'];
    $retour = $_POST['return'];
    
    // Récupération des options pour chaque personne
    $optionsPersonnes = $_POST['personnes'] ?? [];
    
    // Traitement des données...
    // Vous pouvez ici traiter chaque personne individuellement avec ses options
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation pour <?= $ville ?></title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0e0047;
            color: #333;
        }
        h1 {
            text-align: center;
            margin: 20px;
            font-size: 2rem;
            color: #FEFAE0;
        }
        .formulaire {
            background-color: white;
            padding: 20px;
            margin: 0 auto;
            width: 80%;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .formulaire label {
            font-size: 1rem;
            margin-bottom: 8px;
            display: block;
        }
        .formulaire input, .formulaire select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        .option {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }
        .option div {
            display: flex;
            align-items: center;
            gap: 5px;
            background-color: #f5c518;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .personne {
            background-color: #f8f9fa;
            padding: 15px;
            margin: 15px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .personne h3 {
            margin-top: 0;
            color: #0e0047;
        }
        button {
            padding: 12px 20px;
            background-color: #f39c12;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1rem;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>Réservation <?= strtoupper($ville) ?></h1>

<div class="formulaire">
    <form method="POST">
        <label for="depart">Date de départ :</label>
        <input type="date" id="depart" name="depart" min="<?= date('Y-m-d') ?>" required>
        
        <label for="return">Date de fin :</label>
        <input type="date" id="return" name="return" min="<?= date('Y-m-d') ?>" required>
        
        <label for="adults">Nombre d'adultes :</label>
        <input type="number" id="adults" name="adults" min="1" value="1" required 
               onchange="genererChampsPersonnes()">
        
        <label for="enfants">Nombre d'enfants :</label>
        <input type="number" id="enfants" name="enfants" min="0" value="0" required
               onchange="genererChampsPersonnes()">
        
        <div id="personnes-container">
            <!-- Les champs pour chaque personne seront générés ici -->
        </div>
        
        <input type="hidden" name="ville" value="<?= $ville ?>">
        
        <a href="paiement.html" class="button">
            <button type="button">Confirmer la réservation</button>
        </a>
    </form>
</div>

<script>
function genererChampsPersonnes() {
    const container = document.getElementById('personnes-container');
    const nbAdultes = parseInt(document.getElementById('adults').value) || 0;
    const nbEnfants = parseInt(document.getElementById('enfants').value) || 0;
    
    container.innerHTML = '';
    
    // Génération des champs pour les adultes
    for (let i = 1; i <= nbAdultes; i++) {
        container.innerHTML += `
            <div class="personne">
                <h3>Adulte ${i}</h3>
                <label for="adulte_${i}_nom">Nom complet :</label>
                <input type="text" id="adulte_${i}_nom" name="personnes[adulte_${i}][nom]" required>
                
                <label>Options :</label>
                <div class="option">
                    <div>
                        <input type="checkbox" id="adulte_${i}_hebergement" 
                               name="personnes[adulte_${i}][options][hebergement]" value="1">
                        <label for="adulte_${i}_hebergement">Hébergement</label>
                    </div>
                    <div>
                        <input type="checkbox" id="adulte_${i}_restauration" 
                               name="personnes[adulte_${i}][options][restauration]" value="1">
                        <label for="adulte_${i}_restauration">Restauration</label>
                    </div>
                    <div>
                        <input type="checkbox" id="adulte_${i}_extra" 
                               name="personnes[adulte_${i}][options][extra]" value="1">
                        <label for="adulte_${i}_extra">Extra</label>
                    </div>
                </div>
            </div>`;
    }
    
    // Génération des champs pour les enfants
    for (let i = 1; i <= nbEnfants; i++) {
        container.innerHTML += `
            <div class="personne">
                <h3>Enfant ${i}</h3>
                <label for="enfant_${i}_nom">Nom complet :</label>
                <input type="text" id="enfant_${i}_nom" name="personnes[enfant_${i}][nom]" required>
                
                <label for="enfant_${i}_age">Âge :</label>
                <input type="number" id="enfant_${i}_age" name="personnes[enfant_${i}][age]" min="0" max="17" required>
                
                <label>Options :</label>
                <div class="option">
                    <div>
                        <input type="checkbox" id="enfant_${i}_hebergement" 
                               name="personnes[enfant_${i}][options][hebergement]" value="1">
                        <label for="enfant_${i}_hebergement">Hébergement</label>
                    </div>
                    <div>
                        <input type="checkbox" id="enfant_${i}_restauration" 
                               name="personnes[enfant_${i}][options][restauration]" value="1">
                        <label for="enfant_${i}_restauration">Restauration</label>
                    </div>
                    <div>
                        <input type="checkbox" id="enfant_${i}_extra" 
                               name="personnes[enfant_${i}][options][extra]" value="1">
                        <label for="enfant_${i}_extra">Extra</label>
                    </div>
                </div>
            </div>`;
    }
}

// Générer les champs au chargement si des valeurs existent
document.addEventListener('DOMContentLoaded', function() {
    const nbAdultes = parseInt(document.getElementById('adults').value) || 0;
    const nbEnfants = parseInt(document.getElementById('enfants').value) || 0;
    
    if (nbAdultes > 0 || nbEnfants > 0) {
        genererChampsPersonnes();
    }
});
</script>

</body>
</html>
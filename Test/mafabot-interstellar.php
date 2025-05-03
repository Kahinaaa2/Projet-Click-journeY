<?php
// Charger le fichier JSON
$data = json_decode(file_get_contents("destinations.json"), true);

// Récupérer la destination demandée dans l'URL (ex: destination.php?pays=Islande)
$paysDemande = $_GET['pays'] ?? null;
$destination = null;

// Trouver la destination correspondante
foreach ($data as $d) {
    if (strtolower($d['pays']) === strtolower($paysDemande)) {
        $destination = $d;
        break;
    }
}

// Si la destination n'est pas trouvée, rediriger vers une page d'erreur
if (!$destination) {
    die("Destination non trouvée !");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($destination['ville']); ?> (<?php echo htmlspecialchars($destination['pays']); ?>) : <?php echo htmlspecialchars($destination['film']); ?></title>
    <link rel="stylesheet" type="text/css" href="destination-generique.css"> 
    <link rel="stylesheet" type="text/css" href="cssgeneral.css">
</head>
<body style="background: #FEFAE0">

    <div class="fond-entete">
        <div class="titre">
            <a href="Page-accueil.html">
                <img src="image/logo.jpg" alt="logo">
            </a>
            <a href="connexion.html" class="espace-client">
                <img src="image/connexion.jpg" alt="espace client">
                <span>Espace Client</span>
            </a>
        </div>
    </div>

    <div class="image">    
        <img src="image/<?php echo htmlspecialchars($destination['bandeau']); ?>" class="fixe" alt="Bandeau">
    </div> 

    <div class="fond"> 
        <h1><?php echo htmlspecialchars($destination['pays']); ?> (<?php echo htmlspecialchars($destination['ville']); ?>) - <?php echo htmlspecialchars($destination['film']); ?></h1>

        <a href="<?php echo htmlspecialchars($destination['lien']); ?>" target="_blank">
            <img src="image/localisation.png" width="70"> Voir sur Google Maps
        </a>

        <div class="bloc-film">
            <div class="bloc-film-affiche">
                <img src="image/<?php echo htmlspecialchars($destination['affiche']); ?>" alt="Affiche du film">
            </div>
            <div class="bloc-film-resume">
                <h3><?php echo htmlspecialchars($destination['film']); ?></h3>
                <p><?php echo htmlspecialchars($destination['resume']); ?></p>
            </div>
        </div>

        <div class="bloc-activite">
            <div class="bloc-activite-detail">
                <div class="bloc-activite-affiche">
                    <img src="image/<?php echo htmlspecialchars($destination['option1']); ?>" alt="option1">
                </div>
                <div class="bloc-activite-description">
                    <h3>Hébergement</h3>
                    <p><?php echo htmlspecialchars($destination['hebergement']); ?></p> 
                </div>
            </div>

            <div class="bloc-activite-detail">
                <div class="bloc-activite-description">
                    <h3>Restaurants</h3>
                    <p><?php echo htmlspecialchars($destination['restaurant']); ?></p>
                </div>
                <div class="bloc-activite-affiche">
                    <img src="image/<?php echo htmlspecialchars($destination['option2']); ?>" alt="option2">
                </div>
            </div>

            <div class="bloc-activite-detail">
                <div class="bloc-activite-affiche">
                    <img src="image/<?php echo htmlspecialchars($destination['option3']); ?>" alt="option3">
                </div>
                <div class="bloc-activite-description">
                    <h3>Sortie EXTRA</h3>
                    <p><?php echo htmlspecialchars($destination['extra']); ?></p>
                </div>
            </div>
        </div>

        <div class="prix-texte">
            <p>Découvrez nos <b>offres exclusives</b> :</p>
            <p><b><?php echo htmlspecialchars($destination['prix1']); ?></b> : Sans Option (Avion)*</p>
            <p>+ <b><?php echo htmlspecialchars($destination['prix2']); ?></b> : Avec Hébergement*</p>
            <p>+ <b><?php echo htmlspecialchars($destination['prix3']); ?></b> : Avec Restaurants*</p>
            <p>+ <b><?php echo htmlspecialchars($destination['prix4']); ?></b> : Avec Sortie Extra*</p>
            <p>*Par personne</p>
        </div>

        <div class="reservation">
    <h3>Réservation</h3>
    <form action="formulaire.php" method="POST">
        <label for="adults">Nombre d'adultes :</label>
        <input type="number" id="adults" name="adults" min="1" required>

        <label for="enfant">Nombre d'enfants :</label>
        <input type="number" id="enfant" name="enfant" min="0">

        <label for="depart">Date de départ :</label>
        <input type="date" id="depart" name="depart" min="2025-01-01" required>

        <label for="return">Date de fin :</label>
        <input type="date" id="return" name="return" max="2027-12-31" required>

        <label for="option">Choisissez vos options :</label>
        <div class="option">
            <input type="checkbox" name="options[]" value="hebergement"> Hébergement
            <input type="checkbox" name="options[]" value="restaurant"> Restaurants
            <input type="checkbox" name="options[]" value="extra"> Extra
        </div>

        <!-- Le bouton de soumission -->
        <button type="submit" class="button">Réserver</button>
    </form>
</div>

    <div class="fin">
        <h3>Contact</h3>
        <p>Adresse : <a href="https://www.google.com/maps/search/?api=1&query=1+Avenue+du+Parc,+95000+Cergy" target="_blank">1 Avenue du Parc, 95000, Cergy</a></p>
        <p>Téléphone : 00 00 00 00 00</p>
        <p>Email : <a href="mailto:movie.explorator@exemple.com">movie.explorator@exemple.com</a></p>
        <p><a href="https://www.instagram.com/nom_du_compte/" target="_blank">Suivez-nous sur Instagram</a></p>
        <p>&copy; 2025 Movie Explorer. Tous droits réservés.</p>
    </div>  
    
</body>
</html>


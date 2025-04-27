<?php
// Charger les destinations depuis le JSON
$destinations = json_decode(file_get_contents('destinations.json'), true);

// Vérifier si une ville est spécifiée dans l'URL
if (!isset($_GET['ville'])) {
    die("Aucune destination spécifiée.");
}

$villeDemandee = $_GET['ville'];
$destination = null;

// Rechercher la destination dans le JSON
foreach ($destinations as $d) {
    if (strtolower($d['ville']) === strtolower($villeDemandee)) {
        $destination = $d;
        break;
    }
}

// Si aucune destination trouvée, afficher une erreur
if (!$destination) {
    die("Destination non trouvée.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $destination['ville'] ?> - <?= $destination['film'] ?></title>
    <link rel="stylesheet" type="text/css" href="destination-generique.css">
</head>
<body>

    <h1><?= strtoupper($destination['ville']) ?> - <?= strtoupper($destination['film']) ?></h1>

    <p><a href="<?= $destination['lien'] ?>" target="_blank">Voir sur Google Maps</a></p>

    <img src="image/<?= $destination['bandeau'] ?>" alt="Bandeau">

    <h3>Résumé du film : <?= $destination['film'] ?></h3>
    <p><?= $destination['resume'] ?></p>

    <h3>Hébergement</h3>
    <p><?= $destination['hebergement'] ?></p>

    <h3>Restaurants</h3>
    <p><?= $destination['restaurant'] ?></p>

    <h3>Sortie EXTRA</h3>
    <p><?= $destination['extra'] ?></p>

    <h3>Prix</h3>
    <p><b><?= $destination['prix1'] ?></b> : Sans Option (Avion)*</p>
    <p>+ <b><?= $destination['prix2'] ?></b> : Avec Hébergement*</p>
    <p>+ <b><?= $destination['prix3'] ?></b> : Avec Restaurants*</p>
    <p>+ <b><?= $destination['prix4'] ?></b> : Avec Sortie Extra*</p>

</body>
</html>


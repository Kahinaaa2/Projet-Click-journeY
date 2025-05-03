<?php
// Récupérer les données de la réservation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ville = $_POST['ville'];
    $prixTotal = $_POST['prix_total'];
} else {
    // Si la méthode n'est pas POST, on arrête ici
    die("Aucune donnée de réservation reçue.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation pour <?= htmlspecialchars($ville) ?></title>
    <link rel="stylesheet" type="text/css" href="destination-generique.css">
</head>
<body>

    <h1>Réservation pour <?= strtoupper($ville) ?></h1>

    <div class="formulaire">
        <!-- Formulaire de réservation -->
        <form action="paiement.php" method="POST">
            <label for="adultes">Nombre d'adultes :</label>
            <input type="number" id="adults" name="adults" min="1" required>

            <label for="enfant">Nombre d'enfants :</label>
            <input type="number" id="enfant" name="enfant" min="0">

            <label for="depart">Date de départ :</label>
            <input type="date" id="depart" name="depart" min="2025-01-01" required>

            <label for="date">Date de fin :</label>
            <input type="date" id="return" name="return" max="2027-12-31" required>

            <label for="option">Choisissez vos options :</label>
            <div class="option">
                <input type="checkbox" name="options[]" value="hebergement"> <p>Hébergement</p>
                <input type="checkbox" name="options[]" value="restaurant"> <p>Restaurants</p>
                <input type="checkbox" name="options[]" value="extra"> <p>Extra</p>
            </div>

            <input type="hidden" name="prix_total" value="<?= $prixTotal ?>">

            <button type="submit">Confirmer la réservation</button>
        </form>
    </div>

</body>
</html>

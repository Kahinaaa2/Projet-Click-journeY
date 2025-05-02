<?php
// Récupérer les données de la réservation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ville = $_POST['ville'];
    $prixTotal = $_POST['prix_total'];
} else {
    // Si la méthode n'est pas POST, on arrête ici
    die("Aucune donnée de réservation reçue.");
}

// Tu peux aussi ici vérifier que ces informations existent dans ton fichier JSON si nécessaire.
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

    <h3>Montant total à payer : <?= number_format($prixTotal, 2, ',', ' ') ?> €</h3>

    <!-- Formulaire de paiement -->
    <h3>Paiement</h3>
    <form action="paiement.php" method="POST">
        <label for="nom">Nom sur la carte :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="numero">Numéro de carte :</label>
        <input type="text" id="numero" name="numero" pattern="\d{16}" required>

        <label for="expiration">Date d’expiration :</label>
        <input type="text" id="expiration" name="expiration" placeholder="MM/AA" required>

        <label for="cvv">Code de sécurité (CVV) :</label>
        <input type="text" id="cvv" name="cvv" pattern="\d{3}" required>

        <label for="montant">Montant :</label>
        <input type="number" id="montant" name="montant" value="<?= $prixTotal ?>" readonly>

        <button type="submit">Payer</button>
    </form>

</body>
</html>

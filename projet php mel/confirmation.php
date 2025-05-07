<?php
session_start();
$res = $_SESSION['reservation_data'] ?? [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
</head>
<body>
    <h2>Merci pour votre réservation</h2>
    <p>Votre paiement de <?= $_SESSION['total'] ?? 0 ?> € a été accepté.</p>
    <p><strong>Destination :</strong> <?= htmlspecialchars($res['destination'] ?? '') ?></p>
    <p><strong>Dates :</strong> <?= htmlspecialchars($res['depart'] ?? '') ?> - <?= htmlspecialchars($res['return'] ?? '') ?></p>
    <a href="Page-accueil.php">Retour à l'accueil</a>
</body>
</html>

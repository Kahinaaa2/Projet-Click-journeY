<?php
session_start();
// Vérifier si une réservation a bien été effectuée
if (!isset($_SESSION['total']) || !isset($_SESSION['destination']) || !isset($_SESSION['depart']) || !isset($_SESSION['return'])) {
    // Si aucune réservation n'est en cours, rediriger vers l'accueil ou afficher un message d'erreur
    header('Location: Page-accueil.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0e0047; /* Violet foncé */
            color: #fff;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 50px;
            font-size: 2rem;
            color: #FEFAE0; /* Jaune clair */
        }

        .confirmation-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #f9f9f9; /* Fond clair */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .confirmation-container p {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .confirmation-container .details {
            background-color: #f5c518; /* Jaune */
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .confirmation-container a {
            display: inline-block;
            background-color: #f39c12; /* Orange */
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-size: 1.1rem;
        }

        .confirmation-container a:hover {
            background-color: #e67e22; /* Hover orange plus foncé */
        }
    </style>
</head>
<body>

<h2>Merci pour votre réservation !</h2>

<div class="confirmation-container">
    <p>Votre paiement de <strong><?= $_SESSION['total'] ?> €</strong> a été accepté.</p>

    <div class="details">
        <p><strong>Destination :</strong> <?= htmlspecialchars($_SESSION['destination']) ?></p>
        <p><strong>Dates :</strong> <?= htmlspecialchars($_SESSION['depart']) ?> - <?= htmlspecialchars($_SESSION['return']) ?></p>
    </div>

    <a href="Page-accueil.php">Retour à l'accueil</a>
</div>

</body>
</html>

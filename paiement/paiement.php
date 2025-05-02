<?php 
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['connect'] !== true) {
    header('Location: connexion.php');
    exit();
}

$reservation_data = $_SESSION['reservation_data'] ?? [];

$destination = htmlspecialchars($reservation_data['destination'] ?? 'Destination inconnue');
$depart = htmlspecialchars($reservation_data['depart'] ?? '---');
$retour = htmlspecialchars($reservation_data['return'] ?? '---');
$total = $_SESSION['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 { text-align: center; color: #333; }
        .resume { margin-bottom: 20px; }
        label { display: block; margin-top: 10px; }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #0044cc;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover { background: #003399; }
    </style>
</head>
<body>

<div class="box">
    <h2>Paiement du voyage</h2>

    <div class="resume">
        <p><strong>Destination :</strong> <?= $destination ?></p>
        <p><strong>Départ :</strong> <?= $depart ?></p>
        <p><strong>Retour :</strong> <?= $retour ?></p>
        <p><strong>Total à payer :</strong> <?= $total ?> €</p>
    </div>

    <form action="verif_bancaire.php" method="post">
        <label>Nom complet sur la carte
            <input type="text" name="cardholder" required>
        </label>

        <label>Numéro de carte (16 chiffres)
            <input type="text" name="cardnumber" pattern="\d{16}" placeholder="1234567812345678" required>
        </label>

        <label>Date d'expiration (MM/AA)
            <input type="text" name="expiry" pattern="\d{2}/\d{2}" placeholder="MM/AA" required>
        </label>

        <label>Code de sécurité (CVV)
            <input type="text" name="cvv" pattern="\d{3}" placeholder="123" required>
        </label>

        <button type="submit">Procéder au paiement</button>
    </form>
</div>

</body>
</html>

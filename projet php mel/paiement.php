<?php
require('requires/getapikey.php');
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['role'] != 'client') {
    header('Location: connexion.php');
    exit();
}

if (!isset($_POST['paiement'])) {
    header('Location: Page-accueil.php');
    exit();
}

    $paiement = trim($_POST['paiement']);
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $destination = trim($_POST['destination']);
    $prixtot = trim($_POST['prix_total']);
}


// Récupération des informations depuis le formulaire
$ville = isset($_GET['ville']) ? htmlspecialchars($_GET['ville']) : 'erreur';
$transaction = uniqid(); // Identifiant unique pour la transaction
$montant = 18000.99; // Montant de la transaction (exemple)
$vendeur = 'MI-2_B'; // Code vendeur
$retour = 'http://localhost/retour_paiement.php?session=s'; // URL de retour après paiement

// Obtenir la clé API pour générer la valeur de contrôle
$api_key = getAPIKey($vendeur);
$control = md5($api_key . "#" . $transaction . "#" . $prixtot . "#" . $vendeur . "#" . $retour . "#");

$_SESSION['paiement'] = [
    'montant' => $montant,
    'transaction' => $transaction,
    'vendeur' => $vendeur,
    'retour' => $retour,
    'control' => $control
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement pour <?= strtoupper($destination) ?></title>
    <style>
        body { font-family: sans-serif; background-color: #0e0047; color: #333; }
        h1 { text-align: center; color: #FEFAE0; }
        button { background-color: #f39c12; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Paiement pour <?= strtoupper($ville) ?></h1>
    <div style="text-align:center; margin-top: 20px;">
        <form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
            <input type="hidden" name="transaction" value="<?= $_SESSION['paiement']['transaction'] ?>">
            <input type="hidden" name="montant" value="<?= $_SESSION['paiement']['montant'] ?>">
            <input type="hidden" name="vendeur" value="<?= $_SESSION['paiement']['vendeur'] ?>">
            <input type="hidden" name="retour" value="<?= $_SESSION['paiement']['retour'] ?>">
            <input type="hidden" name="control" value="<?= $_SESSION['paiement']['control'] ?>">
            <input type="text" name="carte" placeholder="1234 5678 9012 3456">

            <button type="submit">Valider et payer</button>
        </form>
    </div>
</body>
</html>

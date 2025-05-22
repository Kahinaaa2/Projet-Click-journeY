<?php
require('requires/getapikey.php');
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['role'] != 'client') {
    header('Location: connexion.php');
    exit();
}

#Fonction qui demande a l'utilisateur de saisir le code sans espace
function afficherMessageFormatCarte() {
    echo "Veuillez saisir votre numéro de carte au format : 1234 5678 9012 3456";
}

    if ($_SERVER["REQUEST_METHOD"] === "GET") {

      $prixtot = trim($_GET['prix_total']);
      $transaction = uniqid(); // Identifiant unique pour la transaction
      $vendeur = 'MI-2_B'; // Code vendeur
      $retour = 'http://localhost:1234/retour_paiement.php'; 
      $api_key = getAPIKey($vendeur);
      $control = md5($api_key . "#" . $transaction . "#" . $prixtot . "#" . $vendeur . "#" .$retour . "#");

$_SESSION['paiement'] = [
    'montant' => $prixtot,
    'transaction' => $transaction,
    'vendeur' => $vendeur,
    'retour' => $retour,
    'control' => $control
];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement Movie Explorer</title>
    <style>
        body{
          --couleurblocpaiement: #fefbec;
          --couleurtextepaiement: #0e0047;
          --couleur-bouton-souris: #f39c12;
        }
        
        body.sombre{
          --couleurblocpaiement: #423a65;
          --couleurtextepaiement: #fefbec;
          --couleur-bouton-souris: #2c206b;
        }
        
        body { 
          background-color: #0e0047;
          margin: 0 auto; 
          max-height: 100vh;
        }
        
        .bloc{
          background-color: var(--couleurblocpaiement);
          margin: 0 auto;
          width: 40vw;
          height: 25vw;
          border-radius: 2vw;
          margin-top: 10vw;
        }
        
        .bloc h1 { 
          padding-top: 4vw;
          margin-bottom: 3vw;
          text-align: center; 
          color: var(--couleurtextepaiement);
        }
        
        .bloc p{
          text-align: center; 
          color: var(--couleurtextepaiement);
          font-size: 1.2vw;
        }
        
        .bloc button,.bloc a { 
          background-color: #0e0047;
          text-decoration: none; 
          width: 15vw;
          height: 3vw;
          color: #fefbec; 
          border: none; 
          margin:0 auto;
          margin-top: 3vw;
          border-radius: 0.8vw; 
          cursor: pointer; 
          font-size: 1.2vw;
        }
        .bloc a {
          padding: 0.8vw;
          padding-left: 2vw;
          padding-right:2vw;
          margin-left: 2vw;
        }
        
        .bloc button:hover, a:hover{
          background-color: var(--couleur-bouton-souris);
          transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="bloc">

<h1>Paiement : Movie Exploreur</h1>
<p>Bienvenue dans la phase de paiement !</p><p>Votre panier est au prix de : <b><?= $prixtot ?>€</b></p>
    <div style="text-align:center; margin-top: 20px;">
        <form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
            <input type="hidden" name="transaction" value="<?= $_SESSION['paiement']['transaction'] ?>">
            <input type="hidden" name="montant" value="<?= $_SESSION['paiement']['montant'] ?>">
            <input type="hidden" name="vendeur" value="<?= $_SESSION['paiement']['vendeur'] ?>">
            <input type="hidden" name="retour" value="<?= $_SESSION['paiement']['retour'] ?>">
            <input type="hidden" name="control" value="<?= $_SESSION['paiement']['control'] ?>">
            <input type="hidden" name="carte" value="5555 1234 5678 9000">

             <p style="color:#0e0047; font-size: 1vw;">
                 <?php afficherMessageFormatCarte(); ?>
             </p>

            <button type="submit">Valider et payer</button>
            <a href="panier.php">Retour au panier</a>
        </form>
    </div>
</div> 
<script src="theme.js"></script>   
</html>

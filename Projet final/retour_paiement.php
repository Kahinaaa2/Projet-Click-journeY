<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retour Paiement</title>
    <style>
      body{
          --couleurblocretourpaiement: #fefbec;
          --couleurtexteretourpaiement: #0e0047;
          --couleur-bouton-souris: #f39c12;
      }
        
      body.sombre{
          --couleurblocretourpaiement: #423a65;
          --couleurtexteretourpaiement: #fefbec;
          --couleur-bouton-souris: #2c206b;
      }
        
      body { 
          background-color: #0e0047;
          max-height: 100vh;
      }
      
      .bloc{
          width: 40vw;
          height: 20vw;
          background-color: var(--couleurblocretourpaiement);
          text-align: center;
          margin: 0 auto;
          margin-top: 15vw;
          border-radius: 2vw;
      }
      
      p{
          color: var(--couleurtexteretourpaiement);
          font-size: 1.2vw;
      }
      
      .texte1{
          color: var(--couleurtexteretourpaiement);
          font-size: 1.2vw;
          padding-top: 4vw;
      }
      
      .boutons{
          width: 38vw;
          margin: 0 auto;
          height: 4vw;
          display: flex;
          justify-content: space-between;
      }
      
      .boutons a{
          text-decoration: none;
          width: 18vw;
          height: 4vw;
          background-color: #0e0047;
          border-radius: 1vw;
          text-align: center;
      }
      
      .boutons a:hover{
          background-color: var(--couleur-bouton-souris);
      }
      
      .boutons p{
          color: #fefbec;
      }
      
    </style> 
</head>
<body>
<?php
require('requires/getapikey.php');
session_start();

$transaction = isset($_GET['transaction']) ? $_GET['transaction'] : '';
$montant = isset($_GET['montant']) ? $_GET['montant'] : '';
$vendeur = isset($_GET['vendeur']) ? $_GET['vendeur'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$control = isset($_GET['control']) ? $_GET['control'] : '';
$carte = isset($_GET['carte']) ? $_GET['carte'] : '';
$email = $_SESSION['email'];



$api_key = getAPIKey($vendeur);

$control_verify = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $status . "#");
?><div class="bloc"><?php
if ($control === $control_verify) {
    if ($status === 'accepted') {
    
        
        
         echo "<p class='texte1'><b>Merci pour votre achat !</b></p><p> Transaction ID: $transaction</p><p> Montant: $montant €</p>";
        if (!$email) {
          http_response_code(400);
          echo 'Email manquant.';
          exit;
        }

          $fichier = 'voyages.txt';

        if (!file_exists($fichier)) {
          http_response_code(500);
          echo 'Fichier non trouvé.';
          exit;
        }  

        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $changement = false;

    foreach ($lignes as $i => $ligne) {
        $partie = explode(';', $ligne);

        if (count($partie) > 17 && $partie[0] === $email && trim($partie[17]) === 'Panier') {
            $partie[17] = 'Payé';
            $lignes[$i] = implode(';', $partie);
            $changement = true;
        }
    }

    if ($changement) {
        file_put_contents($fichier, implode(PHP_EOL, $lignes) . PHP_EOL);
    } else {
        header('location : Page-accueil.php');
    }
    
    } else {
        echo "<p style='padding-top:8.5vw;'>Paiement refusé !</p>";
    }
    ?><div class="boutons">
    <a href="voyages.php"><p>Consulter mes voyages</p></a>
    <a href="Page-accueil.php"><p>Retour à la page d'accueil</p></a>
    </div>
    </div>
   
    
    
    <?php
} 

else {
    echo "Erreur de validation de la transaction.";
}


?>

<script src="theme.js"></script>

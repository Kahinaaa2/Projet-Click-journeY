<?php
require('requires/getapikey.php');
session_start();

// Récupérer les paramètres passés dans l'URL
$transaction = isset($_GET['transaction']) ? $_GET['transaction'] : '';
$montant = isset($_GET['montant']) ? $_GET['montant'] : '';
$vendeur = isset($_GET['vendeur']) ? $_GET['vendeur'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$control = isset($_GET['control']) ? $_GET['control'] : '';
$carte = isset($_GET['carte']) ? $_GET['carte'] : '';

function afficherMessageErreurFormatCarte() {
    function afficherMessageErreurFormatCarte() {
    echo '<p style="color:#f39c12; text-align:center;">Paiement refusé : il est probable que ce soit dû au format du numéro de carte (ex: 1234 5678 9012 3456).</p>';
    }

}

// Vérification de la clé API pour vérifier l'intégrité des données
$api_key = getAPIKey($vendeur);

// Générer la valeur de contrôle attendue
$control_verify = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $status . "#");

// Vérifier si la valeur de contrôle correspond
if ($control === $control_verify) {
    // Si la valeur de contrôle est valide, afficher le résultat du paiement
    if ($status === 'accepted') {
        echo "Paiement accepté ! Transaction ID: $transaction, Montant: $montant €";
    } else {
        echo "Paiement refusé !";
        afficherMessageErreurFormatCarte();
    }
} else {
    // Si la valeur de contrôle est incorrecte, afficher une erreur
    echo "Erreur de validation de la transaction.";
}
?>

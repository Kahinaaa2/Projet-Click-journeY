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

// Vérification du format de la carte (doit contenir au moins 3 espaces)
if (substr_count($carte, ' ') < 3) {
    echo "Erreur : veuillez saisir le numéro de carte bancaire dans un format correct avec des espaces (ex : 1234 5678 9012 3456).";
    exit;
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
    }
} else {
    // Si la valeur de contrôle est incorrecte, afficher une erreur
    echo "Erreur de validation de la transaction.";
}
?>

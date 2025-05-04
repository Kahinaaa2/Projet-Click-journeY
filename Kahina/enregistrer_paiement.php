<?php
// enregistrer_paiement.php

// Vérifier que le formulaire a bien été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données
    $ville = $_POST['ville'] ?? 'Inconnue';
    $depart = $_POST['depart'] ?? '';
    $retour = $_POST['return'] ?? '';
    $nombreAdultes = (int)($_POST['adults'] ?? 0);
    $nombreEnfants = (int)($_POST['enfants'] ?? 0);
    $personnes = $_POST['personnes'] ?? [];

    // Ici, vous pouvez traiter les données et simuler un "paiement"
    $paiementOK = true; // Changez cette valeur selon votre logique

    if ($paiementOK) {
        // Redirige vers la page de succès
        header('Location: paiement_reussi.php');
        exit();
    } else {
        // Redirige vers la page d’échec
        header('Location: paiement_echoue.php');
        exit();
    }
} else {
    // Accès interdit si ce n’est pas un POST
    http_response_code(403);
    echo "Accès interdit.";
}

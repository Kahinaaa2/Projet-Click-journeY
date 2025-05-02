<?php
session_start();

if (!isset($_SESSION['connect']) || !isset($_SESSION['reservation_data'])) {
    header('Location: connexion.php');
    exit();
}

// Simule l’enregistrement
$donnees = [
    'utilisateur' => $_SESSION['email'] ?? 'non identifié',
    'date' => date('Y-m-d H:i:s'),
    'reservation' => $_SESSION['reservation_data'],
    'montant' => $_SESSION['total'] ?? 0,
    'statut' => 'payé'
];

file_put_contents('paiements.txt', json_encode($donnees) . "\n", FILE_APPEND);

header('Location: confirmation.php');
exit();

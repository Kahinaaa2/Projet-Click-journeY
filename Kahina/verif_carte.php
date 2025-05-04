<?php
session_start();

// Simulation simple : carte valide si le numéro commence par 4
$cardnumber = $_POST['cardnumber'] ?? '';
$is_valid = preg_match('/^4\d{15}$/', $cardnumber);

if ($is_valid) {
    header('Location: enregistrer_paiement.php');
    exit();
} else {
    header('Location: paiement_echoue.php');
    exit();
}

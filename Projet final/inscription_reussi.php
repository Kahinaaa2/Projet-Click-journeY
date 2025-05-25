<?php
session_start();

if(!isset($_SESSION['role'])){
    header('Location: connexion.php');
    exit();
}

if ($_SESSION['role'] == 'client'){
    header('Location: Page-accueil.php');
    exit();
}

if ($_SESSION['role'] == 'admin'){
    header('Location: admin.php');
    exit();
}

$_SESSION['role'] = 'client'
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="pages.css">
</head>
<body>
    <div class="bloc">
<h3> Votre compte a été crée avec succès ! </h3>

<a href="Page-accueil.php"><button>Voyagez Maintenant</button></a>

    </div>
</body>
</html>

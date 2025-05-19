<?php 
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['connect'] != true) {
    header('Location: connexion.php');
    exit();
}

session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <link rel="stylesheet" type="text/css" href="pages.css">
    <style>
    </style>
</head>
<body>

    <div class="bloc">
<h3> Vous avez été déconnecté avec succès ! </h3>

<a href="Page-accueil.php"><button>Retournez à la page d'accueil</button></a>

    </div>

</body>
</html>

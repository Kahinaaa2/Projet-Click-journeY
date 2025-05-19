<?php
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['role'] != 'client') {
    header('Location: connexion.php');
    exit();
}

if (!isset($_GET['destination'])) {
    header('Location: Page-accueil.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Enregistrement du voyage</title>
    <link rel="stylesheet" type="text/css" href="enregistrement.css"> 
</head>
<body>

    <div class="bloc">
<h3>Les informations du voyage ont bien été enregistrées ! Vous pouvez le consulter dès maintenant sur votre profil !</h3>

<a href="Page-accueil.php"><button>Retournez à la page d'accueil</button></a>

    </div>

</body>
<script src="theme.js"></script>
</html>

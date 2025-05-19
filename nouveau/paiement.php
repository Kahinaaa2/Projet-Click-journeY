<?php
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['role'] != 'client') {
    header('Location: connexion.php');
    exit();
}

if (!isset($_POST['paiement'])) {
    header('Location: Page-accueil.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $destination = trim($_POST['destination']);
    $prixtot = trim($_POST['prix_total']);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement</title>
    <link rel="stylesheet" type="text/css" href="recap.css"> 
</head>

<body style="background: #f7f2d3">

<div class="container">

<h1> Réservation pour <?php echo $destination ?></h1>

    <div class="carree">
        
<form action="paiement.php" method="post">
<h2>Total : <span><?php echo $prixtot ?> €</span> </h2>
<button type="submit">Passer au paiement</button>
</form>

</div>

</body>
</html>


<?php
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['role'] != 'client') {
    header('Location: connexion.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif</title>
    <link rel="stylesheet" type="text/css" href="recherche.css"> 
    <link rel="stylesheet" type="text/css" href="cssgeneral.css">
</head>

<body style="background: #FEFAE0">

<?php include 'header.php'; ?>

<div class="container">

<div class="carree">


<div class="formulaire">



</div>
</div>
</div>


<?php include 'footer.php'; ?>

      
</body>
</html>

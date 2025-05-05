<?php
session_start();

if (!isset($_SESSION['connect']))  {
    header('Location: connexion.php');
    exit();
}

if($_SESSION['role'] == 'admin'){
   header('Location: admin.php');
   exit();
}

$destination = $_POST['destination'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif</title>
    <link rel="stylesheet" type="text/css" href="reservation.css"> 
    <link rel="stylesheet" type="text/css" href="cssgeneral.css">
</head>

<body style="background: #FEFAE0">

<?php include 'header.php'; ?>

<div class="container">

<div class="carree">


<div class="formulaire">

<?php

$fic = "destinations/" . $destination . ".csv";
if($fic){
$lignes = file($fic); 

$titre = $lignes[0];
$prix1 = $lignes[8];
$prix2 = $lignes[9];
$prix3 = $lignes[10];
$prix4 = $lignes[11];
}

$_SESSION['email'] = $email;
$_SESSION['prenom'] = $prenom;


?>



<p> Réservation pour <?php echo $titre ?> </p>

<form action="recap.php" method="POST" class="formulaire">
    <label for="adultes">Nombre d'adultes :</label>
    <input type="number" id="adults" name="adults" min="1" required>

    <label for="enfant">Nombre d'enfants :</label>
    <input type="number" id="enfant" name="enfant" min="0">

    <label for="depart">Date de départ :</label>
    <input type="date" id="depart" name="depart" min="2025-01-01">

    <label for="date">Date de fin :</label>
    <input type="date" id="return" name="return" max="2027-12-31">
    
    
    
    <label for="option">Choississez vos options</label>
    <div class="option">
    <input type="checkbox" name="options" value="hebergement" > <p>Hébergement</p>
    <input type="checkbox" name="options" value="restaurant" > <p>Restaurants</p>
    <input type="checkbox" name="options" value="extra" > <p>Extra</p>
    </div>
    
    <button type="submit">Réserver</button>
</form>
</div>


</div>
</div>
</div>


<?php include 'footer.php'; ?>

      
</body>
</html>

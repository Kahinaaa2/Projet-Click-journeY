<!DOCTYPE html>

<?php

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["recherche"])) {
    $_SESSION['destination'] = $_GET["choix_destination_film"];
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["choix_destination_film"])) {
        $_SESSION['destination'] = $_GET["choix_destination_film"];
        $nom = "destinations/" . $_GET["choix_destination_film"] . ".csv";

        if (file_exists($nom)) {
          $lignes = file($nom);
          if(!$lignes){
            header("Location: accueil.php");
            exit();
          }
        } 
        else {
          echo "Le fichier n'existe pas.";
        }
}
else{
  header("Location: presentation.php");
}
?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo '<title>' . $lignes[0] . '</title>';
    ?>
    <link rel="stylesheet" type="text/css" href="destination-generique.css"> 
    <link rel="stylesheet" type="text/css" href="cssgeneral.css">
</head>
<body>

    <div class="fond-entete">
    <?php include 'header.php';?>
    </div>
    
    
<div class="image">    
<?php echo '<img src="image/' . $lignes[2] . '_1.1.jpg" class="fixe" alt="Image fixe">';
?>
</div> 

<div class="fond">
  <h1><?php echo trim($lignes[0]); ?></h1>
  <a href="<?php echo trim($lignes[1]); ?>" target="_blank" class="lien-bloc">
    <?php echo trim($lignes[2]); ?>
    <div class="image-bloc2">
      <img class="imgclaire" src="image/localisation.png">
      <img class="imgsombre" src="image/localisation2.png">
    </div>
  </a>

<div class="arriere-bloc1"><div class="bloc-bleu1"></div> 
<div class="bloc1">
  <div class="sous-bloc1">
    <div class="sous-sous-bloc1">
    <?php echo'<img src="image/' . $lignes[2] . '_2.1.1.jpg" alt="ville1">';?>
    </div>
    <div class="sous-sous-bloc1">
    <?php echo'<img src="image/' . $lignes[2] . '_2.1.2.jpg" alt="film1">';?>
    </div>
  </div>
  <div class="sous-bloc1">
    <div class="sous-sous-bloc1">
    <?php echo'<img src="image/' . $lignes[2] . '_2.2.1.jpg" alt="film2">';?>
    </div>
    <div class="sous-sous-bloc1">
    <?php echo '<img src="image/' . $lignes[2] . '_2.2.2.jpg" alt="ville2">';?>
    </div>
  </div>
</div> 
<div class="bloc-bleu1"></div> 
</div>    

<div class="bloc-film">
 <div class="bloc-film-affiche">
 <?php echo'<img src="image/affiche' . $lignes[2] . '.jpg" alt="affichefilm">';?>
 </div>
 <div class="bloc-film-resume">
 
 <?php echo '<h3>' . $lignes[3] . '</h3>
 <p>' . $lignes[4] . '</p>';?>

 
</div>
</div>

<div class="activite">

<div class="activite-bandeau"></div>

<p>Activités</p>

<div class="activite-bandeau"></div>

</div>

<div class="bloc-activite">
 <div class="bloc-activite-detail">
  <div class="bloc-activite-affiche">
  <?php echo'<img src="image/option1' . $lignes[2] . '.jpg" alt="option1">';?>
  </div>
  <div class="bloc-activite-description">
  
  <h3>Hébergement</h3>
  <?php echo $lignes[5];?>
  
  </div>
 </div>
 <div class="bloc-activite-detail">
  <div class="bloc-activite-description">
  
  <h3>Restaurants</h3>
  <?php echo $lignes[6];?>
  
  
  </div>
  <div class="bloc-activite-affiche">
  <?php echo '<img src="image/option2' . $lignes[2] . '.jpg" alt="option2">';?>
  </div>
 </div>
 <div class="bloc-activite-detail">
  <div class="bloc-activite-affiche">
  <?php echo '<img src="image/option3' . $lignes[2] . '.jpg" alt="option3">';?>
  </div>
  <div class="bloc-activite-description">
  
  <h3>Sortie EXTRA</h3>
  <?php echo $lignes[7];?>
 
  </div>
 </div>

</div>

<div class="prix">

<div class="prix-bandeau"></div>

<p>Prix</p>

<div class="prix-bandeau"></div>

</div>

<div class="prix-texte">

<?php echo '<p>Découvrez nos <b>offres exclusives</b> pour votre séjour à <b>' . $lignes[2] . '</b> :</p>';?>

<?php echo '<dd><p><b>' . $lignes[8] . '</p></dd>
<p>+ <b>' . $lignes[9] . '</p>
<p>+ <b>' . $lignes[10] . '</p>
<p>+ <b>' . $lignes[11] . '</p>'
. $lignes[12];?>

</div>

<div class="reservation">

<div class="reservation-bandeau">
</div>

<p>Réservation</p>

<div class="reservation-bandeau"></div>

</div>


<div class="reservation-bloc">
<div class="reservation-bloc-image">
<?php echo '<img src="image/' . $lignes[2] . '_3.1.jpg" alt="pays1">';?>
</div>

<div class="formulaire">

<form action="reservation.php" method="GET" class="formulaire" target="_blank">    
    <?php echo '<button name="destination" value=' . $lignes[13
    ] . ' type="submit">Réservez dès maintenant !</button>';?>
</form>
</div>

<div class="reservation-bloc-image">
<?php echo '<img src="image/' . $lignes[2] . '_3.2.jpg" alt="pays2">';?>
</div>
</div>
</div>

<?php include 'footer.php';?>  
<?php $_GET = [];?>    
</body>
</html>    

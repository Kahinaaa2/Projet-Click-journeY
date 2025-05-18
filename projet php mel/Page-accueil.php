<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Explorer : Voyagez vers vos films préférés !</title>
    <link rel="stylesheet" type="text/css" href="Page-accueil.css"> 
    <link rel="stylesheet" type="text/css" href="cssgeneral.css"> 
</head>
<body>

<?php include 'header.php'; ?>
    
<div class="carree"></div>

<div class="texte">
<div class="texte2">

<h2> Voyagez vers vos films préférés ! </h2>


<p> Avez-vous déjà rêvé de marcher dans les pas de vos héros de cinéma ? Avec <b>Movie Explorer</b>, c'est possible !</p>
<p>Choisissez votre <b>lieu de tournage</b> ou votre <b>film</b> préféré et découvrez les <b>destinations</b> et <b>activités</b> associées !</p>
<p> Que vous soyez cinéphile, voyageur passionné ou simple curieux, <b>Movie Explorer</b> est fait pour vous !</p>

</div>


<div class="carree2">

<h2>Découvrez les meilleurs destinations !</h2>


<div class="carree21">

<div class="carree211">

<form method="GET" action="destination-film.php">

<div class="image-container">
<button type="submit" name="choix_destination_film" value="Mafabot-Interstellar">
<img src="image/islande-accueil.jpg" alt="Image 1" class="image image1">
<img src="image/interstellar.jpg" alt="Image 2" class="image image2">
</button>

</div>

<div class="image-container">
<button type="submit" name="choix_destination_film" value="Sydney-Nemo">
<img src="image/australie-accueil.jpg" width="100%" height="auto" alt="Image 1" class="image image1">
<img src="image/nemo.jpg" alt="Image 2" class="image image2">
</button>
</div>

</div>

<div class="carree212">

<div class="image-container">
<button type="submit" name="choix_destination_film" value="Zhangjiajie-Avatar">
<img src="image/chine-accueil.jpg" alt="Image 1" class="image image1">
<img src="https://offactandfantasy.wordpress.com/wp-content/uploads/2020/07/avatar-banner.jpg?w=900" alt="Image 2" class="image image2">
</button>
</div>


<div class="image-container">
<button type="submit" name="choix_destination_film" value="Serengeti-Leroilion">
<img src="image/tanzanie-accueil.jpg" alt="Image 1" class="image image1">
<img src="image/roilion.jpeg" alt="Image 2" class="image image2">
</button>
</div>

</form>

</div>


</div>


</div>





</div>



    
<div class="slogan">    
<h2> Prêt à vivre votre film en vrai ? Explorez nos destinations dès maintenant ! </h2>
</div>
 
<div class="voyage"> 
<a href="presentation.php"><button>Voyagez Maintenant</button></a>
</div>
    
<div class="carte"><div class="carte-bloc">    
<img class="carteclaire" src="image/carte.png" alt="carte">
<img class="cartesombre" src="image/carte2.png" alt="carte2">    
</div></div>   
    
<?php include 'footer.php'; ?>
     
      
</body>
</html>

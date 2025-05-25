<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toutes les Destinations</title>
    <link rel="stylesheet" type="text/css" href="presentation.css"> 
    <link rel="stylesheet" type="text/css" href="cssgeneral.css"> 
</head>
<body>
    
    <?php include 'header.php'; ?>
    
    <?php 
      if($_GET["choix"] == "destinations"){
       $clique1 = "1";
       $clique2 = "2" ;
      }
      else if($_GET["choix"] == "films"){
       $clique1 = "2";
       $clique2 = "1" ;
      }
      else{
       $clique1 = "1";
       $clique2 = "2" ;
      }
    ?>  
    

<form method="GET" action="destination-film.php">

<div class="carree">

<div class="sous-carree">

<button type="submit" name="choix_destination_film" value="Mafabot-Interstellar">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/mafabot_interstellar_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/mafabot_interstellar_' . $clique2 . '.jpg" alt="Image 2" class="image image2">';
?>
</div>
<div class="texte">
<p>Islande (Mafabot) - Interstellar</p>
<p class="droite">À partir de <b>599€</b></p>
</div>
</div>
</button>

<button type="submit" name="choix_destination_film" value="LA-FastAndFurious">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/la_fastandfurious_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/la_fastandfurious_' . $clique2 . '.jpg" alt="Image 2" class="image image2">';
?>
</div>
<div class="texte">
<p>États-Unis (Los Angeles) - Fast and Furious</p>
<p class="droite">À partir de <b>999€</b></p>
</div>
</div>
</button>

<button type="submit" name="choix_destination_film" value="Hobbiton-Hobbit">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/hobbiton_hobbit_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/hobbiton_hobbit_' . $clique2 . '.jpg" alt="Image 2" class="image image2">';
?>
</div>
<div class="texte">
<p>Nouvelle-Zélande (Hobbiton) - Le Hobbit</p>
<p class="droite">À partir de <b>899€</b></p>
</div>
</div>
</button>

<button type="submit" name="choix_destination_film" value="Kualoa-Jurassicpark">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/kualoa_jurassicpark_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/kualoa_jurassicpark_' . $clique2 . '.jpg" alt="Image 2" class="image image2">';
?>
</div>
<div class="texte">
<p>Hawaï (Kualoa Ranch) - Jurassic Park</p>
<p class="droite">À partir de <b>1049€</b></p>
</div>
</div>
</button>

</div>

<div class="sous-carree">



<button type="submit" name="choix_destination_film" value="Wadirum-Dune">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/wadirum_dune_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/wadirum_dune_' . $clique2 . '.jpg" alt="Image 2" class="image image2">';
?>
</div>
<div class="texte">
<p>Jordanie (Wadi Rum) - Dune</p>
<p class="droite">À partir de <b>849€</b></p>
</div>
</div>
</button>

<button type="submit" name="choix_destination_film" value="Zhangjiajie-Avatar">
<div class="image-container">
<div class="image-container2">
<?php echo'<img src="image/zhangjiajie_avatar_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/zhangjiajie_avatar_' . $clique2 . '.jpg" alt="Image 2" class="image image2">';
?>
</div>
<div class="texte">
<p>Chine (Zhangjiajie) - Avatar</p>
<p class="droite">À partir de <b>799€</b></p>
</div>
</div>
</button>

<button type="submit" name="choix_destination_film" value="Machupicchu-Indianajones">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/machupicchu_indianajones_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/machupicchu_indianajones_' . $clique2 . '.jpg" alt="Image 2" class="image image2">';
?>
</div>
<div class="texte">
<p>Pérou (Machu Picchu) - Indiana Jones</p>
<p class="droite">À partir de <b>849€</b></p>
</div>
</div>
</button>



<button type="submit" name="choix_destination_film" value="Southampton-Titanic">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/southampton_titanic_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/southampton_titanic_' . $clique2 . '.jpg" alt="Image 2" class="image image2">'
?>
</div>
<div class="texte">
<p>Angleterre (Southampton) - Titanic</p>
<p class="droite">À partir de <b>399€</b></p>
</div>
</div>
</button>

</div>

<div class="sous-carree">

<button type="submit" name="choix_destination_film" value="Nyc-Prada">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/nyc_prada_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/nyc_prada_' . $clique2 . '.jpg" alt="Image 2" class="image image2">'
?>
</div>
<div class="texte">
<p>États-Unis (New York) - Le Diable s'habille en Prada</p>
<p class="droite">À partir de <b>899€</b></p>
</div>
</div>
</button>

<button type="submit" name="choix_destination_film" value="Chambord-Labelleetlabete">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/chambord_labelleetlabete_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/chambord_labelleetlabete_' . $clique2 . '.jpg" alt="Image 2" class="image image2">'
?>
</div>
<div class="texte">
<p>France (Chambord) - La Belle et la Bête</p>
<p class="droite">À partir de <b>249€</b></p>
</div>
</div>
</button>

<button type="submit" name="choix_destination_film" value="Sydney-Nemo">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/sydney_nemo_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/sydney_nemo_' . $clique2 . '.jpg" alt="Image 2" class="image image2">'
?>
</div>
<div class="texte">
<p>Australie (Sydney) - Le monde de Némo</p>
<p class="droite">À partir de <b>1189€</b></p>
</div>
</div>
</button>

<button type="submit" name="choix_destination_film" value="Serengeti-Leroilion">
<div class="image-container">
<div class="image-container2">
<?php echo '<img src="image/serengeti_leroilion_' . $clique1 . '.jpg" alt="Image 1" class="image image1">
<img src="image/serengeti_leroilion_' . $clique2 . '.jpg" alt="Image 2" class="image image2">'
?>
</div>
<div class="texte">
<p>Tanzanie (Serengeti) - Le Roi Lion</p>
<p class="droite">À partir de <b>849€</b></p>
</div>
</div>
</button>
</form>


</div>

<div class="bouton">
<a href="recherche.php">Recherche</a>
</div>

</div>



<?php include 'footer.php';?>    
      
</body>
</html>















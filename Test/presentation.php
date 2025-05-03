
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toutes les Destinations</title>
    <link rel="stylesheet" type="text/css" href="presentation.css"> 
    <link rel="stylesheet" type="text/css" href="cssgeneral.css"> 
</head>
<body style="background: #FEFAE0">
    <div class="titre">
        <a href="Page-accueil.html">
            <img src="image/logo.jpg" alt="logo">
        </a>
        <a href="connexion.html" class="espace-client">
            <img src="image/connexion.jpg" alt="espace client">
            <span>Espace Client</span>
        </a>
    </div>
      <div class="sous-titre">
       <div class="accueil">
         <a href="Page-accueil.html"><button>Accueil</button></a>
         <div class="sous-accueil">
           <a href="recherche.html">Recherche</a>
           <a href="connexion.html">Connexion</a>
           <a href="inscription.html">Inscription</a>
           <a href="Tableau_bord.html">Connexion Administration</a>
         </div>  
       </div>
       <div class="destination">
         <form method="POST" action="presentation.php">
         <button type="submit" name="choix" value="destinations">Destinations</button>
         </form>
         <div class="sous-destination">
           <form method="POST" action="destination-film.php">
           <button type="submit" name="choix_destination_film" value="Mafabot-Interstellar">Mafabot (Islande)</button>
           <button type="submit" name="choix_destination_film" value="LA-FastAndFurious">Los Angeles (États-Unis)</button>
           <button type="submit" name="choix_destination_film" value="Hobbiton-Hobbit">Hobbiton (Nouvelle-Zélande)</button>           
           <button type="submit" name="choix_destination_film" value="Kualoa-Jurassicpark">Kualoa Ranch (Hawaï)</button>
           <button type="submit" name="choix_destination_film" value="Wadirum-Dune">Wadi Rum (Jordanie)</button>
           <button type="submit" name="choix_destination_film" value="Zhangjiajie-Avatar">Zhangjiajie (Chine)</button>
           <button type="submit" name="choix_destination_film" value="Machupicchu-Indianajones">Machu Picchu (Pérou)</button>
           <button type="submit" name="choix_destination_film" value="Southampton-Titanic">Southampton (Angleterre)</button>
           <button type="submit" name="choix_destination_film" value="Nyc-Prada">New York (États-Unis)</button>
           <button type="submit" name="choix_destination_film" value="Chambord-Labelleetlabete">Chambord (France)</button>
           <button type="submit" name="choix_destination_film" value="Sydney-Nemo">Sydney (Australie)</button>
           <button type="submit" name="choix_destination_film" value="Serengeti-Leroilion">Serengeti (Tanzanie)</button>
           </form>
           <form method="POST" action="presentation.php">
	   <i><button type="submit" name="choix" value="destinations">Voir toutes les destinations</button></i>
	   </form>
         </div>   
       </div>
       
       <div class="film">
         <form method="POST" action="presentation.php">
         <button type="submit" name="choix" value="films">Films</button>
         </form>
         <div class="sous-film">
           <form method="POST" action="destination-film.php">
           <button type="submit" name="choix_destination_film" value="Mafabot-Interstellar">Interstellar</button>
           <button type="submit" name="choix_destination_film" value="LA-FastAndFurious">Fast And Furious</button>
           <button type="submit" name="choix_destination_film" value="Hobbiton-Hobbit">Hobbit</button>           
           <button type="submit" name="choix_destination_film" value="Kualoa-Jurassicpark">Jurassic Park</button>
           <button type="submit" name="choix_destination_film" value="Wadirum-Dune">Dune</button>
           <button type="submit" name="choix_destination_film" value="Zhangjiajie-Avatar">Avatar</button>
           <button type="submit" name="choix_destination_film" value="Machupicchu-Indianajones">Indiana Jones</button>
           <button type="submit" name="choix_destination_film" value="Southampton-Titanic">Titanic</button>
           <button type="submit" name="choix_destination_film" value="Nyc-Prada">Le Diable S'Habille En Prada</button>
           <button type="submit" name="choix_destination_film" value="Chambord-Labelleetlabete">La Belle Et La Bête</button>
           <button type="submit" name="choix_destination_film" value="Sydney-Nemo">Némo</button>
           <button type="submit" name="choix_destination_film" value="Serengeti-Leroilion">Le Roi Lion</button>
           </form>
           <form method="POST" action="presentation.php">
	   <i><button type="submit" name="choix" value="films">Voir tous les films</button></i>
	   </form>
         </div>   
       </div>
     </div>  
    
    <?php 
      if($_POST["choix"] == "destinations"){
       $clique1 = "1";
       $clique2 = "2" ;
      }
      else if($_POST["choix"] == "films"){
       $clique1 = "2";
       $clique2 = "1" ;
      }
      else{
        echo "erreur";
      }  
    ?>  
    

<form method="POST" action="destination-film.php">

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

<button type="submit" name="choix_destination_film" value="Bhambord-Labelleetlabete">
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
<a href="recherche.html">Recherche Rapide</a>
</div>

</div>



<div class="fin">
       <h3>Contact</h3>
   
        <div class="info-contact">
            <a href="https://www.google.com/maps/search/?api=1&query=1+Avenue+du+Parc,+95000+Cergy" target="_blank">1 Avenue du Parc, 95000, Cergy</a><img src="image/localisation-contact.jpg" alt="adresse">
        </div>
        <div class="info-contact">
            <a>00 00 00 00 00</a><img src="image/telephone.jpg" alt="téléphone">
        </div>

    <!-- Colonne 2 : Email et Instagram -->
        <div class="info-contact">
            
            <a href="mailto:movie.explorator@exemple.com">movie.explorator@exemple.com</a><img src="image/mail.jpg" alt="email">
        </div>
        <div class="info-contact">
            
            <a href="https://www.instagram.com/nom_du_compte/" target="_blank">Suivez-nous sur Instagram</a><img src="image/instagram.jpg" alt="Instagram">
        </div>

<p>&copy; 2025 Movie Explorer. Tous droits réservés.</p>
       
   </div>  
     
      
</body>
</html>

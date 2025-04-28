<!DOCTYPE html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["choix_destination_film"])) {
    
        $nom = "destinations/" . $_POST["choix_destination_film"] . ".csv";

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
    } else {
        echo "Aucune destination de film sélectionnée.";
    }
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
<body style="background: #FEFAE0">

    <div class="fond-entete">
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
         <a href="presentation.html"><button>Destinations</button></a>
         <div class="sous-destination">
           <a href="mafabot-interstellar.html">Mafabot (Islande)</a>
           <a href="LA-FastAndFurious.html">Los Angeles (États-Unis)</a>
           <a href="hobbiton-hobbit.html">Hobbiton (Nouvelle-Zélande)</a>
           <a href="kualoa-jurassicpark.html">Kualoa Ranch (Hawaï)</a>
           <a href="wadirum-dune.html">Wadi Rum (Jordanie)</a>
           <a href="zhangjiajie-avatar.html">Zhangjiajie (Chine)</a>
           <a href="machupicchu-indianajones.html">Machu Picchu (Pérou)</a>
           <a href="southampton-titanic.html">Southampton (Angleterre)</a>
           <a href="nyc-prada.html">New York (États-Unis)</a>
           <a href="chambord-la_belle_et_la_bete.html">Chambord (France)</a>
           <a href="sydney-nemo.html">Sydney (Australie)</a>
           <a href="serengeti-le_roi_lion.html">Serengeti (Tanzanie)</a>
	   <i><a href="presentation.html">Voir toutes les destinations</a></i>
         </div>   
       </div>
       
       <div class="film">
        <a href="presentation2.html"><button>Films</button></a>
         <div class="sous-film">
           <a href="mafabot-interstellar.html">Interstellar</a>
           <a href="LA-FastAndFurious.html">Fast And Furious</a>
           <a href="hobbiton-hobbit.html">Hobbit</a>
           <a href="kualoa-jurassicpark.html">Jurassic Park</a>
           <a href="wadirum-dune.html">Dune</a>
           <a href="zhangjiajie-avatar.html">Avatar</a>
           <a href="machupicchu-indianajones.html">Indiana Jones</a>
           <a href="southampton-titanic.html">Titanic</a>
           <a href="nyc-prada.html">Le Diable s'habille en Prada</a>
           <a href="chambord-la_belle_et_la_bete.html">La Belle et La Bête</a>
           <a href="sydney-nemo.html">Le Monde De Némo</a>
           <a href="serengeti-le_roi_lion.html">Le Roi Lion</a> 
           <i><a href="presentation2.html">Voir tous les films</a></i>
         </div> 
       </div>
    </div>
    </div>
    
    
<div class="image">    
<?php echo '<img src="image/' . $lignes[2] . '_1.1.jpg" class="fixe" alt="Image fixe">';
?>
</div> 

<div class="fond"> 

<?php echo '<h1>' . trim($lignes[0]) . '</h1>

<a href="' . trim($lignes[1]) . '" target="_blank">
<img src="image/localisation.png" width="70">' . trim($lignes[2]) . '</a>';
?>

<div class="arriere-bloc1"><div class="bloc-bleu1"></div> 
<div class="bloc1">
  <div class="sous-bloc1">
    <div class="sous-sous-bloc1">
    <?php echo'<img src="image/' . $lignes[2] . '_2.1.1.jpg" alt="mafabot1">';?>
    </div>
    <div class="sous-sous-bloc1">
    <?php echo'<img src="image/' . $lignes[2] . '_2.1.2.jpg" alt="interstellar1">';?>
    </div>
  </div>
  <div class="sous-bloc1">
    <div class="sous-sous-bloc1">
    <?php echo'<img src="image/' . $lignes[2] . '_2.2.1.jpg" alt="interstellar2">';?>
    </div>
    <div class="sous-sous-bloc1">
    <?php echo '<img src="image/' . $lignes[2] . '_2.2.2.jpg" alt="mafabot2">';?>
    </div>
  </div>
</div> 
<div class="bloc-bleu1"></div> 
</div>    

<div class="bloc-film">
 <div class="bloc-film-affiche">
 <?php echo'<img src="image/affiche' . $lignes[2] . '.jpg" alt="afficheinterstellar">';?>
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
<?php echo '<img src="image/' . $lignes[2] . '_3.1.jpg" alt="islande1">';?>
</div>

<div class="formulaire">

<form action="#" method="POST" class="formulaire">
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

<div class="reservation-bloc-image">
<?php echo '<img src="image/' . $lignes[2] . '_3.2.jpg" alt="islande2">';?>
</div>
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

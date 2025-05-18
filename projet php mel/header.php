<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['role']) && $_SESSION['role'] != client) {
    header('Location: admin.php');
    exit();
}

$pageAccueil = (isset($_SESSION['connect']) && $_SESSION['connect'] === true)
?>

<div class="entete">
<div class="titre">
    <a href="Page-accueil.php">
        <img src="image/logo.jpg" alt="logo">
    </a>

     <a class="droite1" href="recherche.php">
        <p>🔍</p>
    </a>
    <button class="droite2" onclick="toggleTheme()"></button>

    <?php if ($pageAccueil): ?>
        <a href="profil.php" class="espace-client">
            <img src="image/connexion.jpg" alt="Mon compte">
            <span>Mon Compte</span>
        </a>
    <?php else: ?>
        <a href="connexion.php" class="espace-client">
            <img src="image/connexion.jpg" alt="Espace client">
            <span>Espace Client</span>
        </a>
    <?php endif; ?>
</div>

<div class="sous-titre">
   <div class="accueil">
     <a href="Page-accueil.php"><button>Accueil</button></a>
     <div id="sous_accueil" class="sous-accueil">
       <a href="recherche.php">Recherche</a>
       <?php if ($pageAccueil): ?>
           <a href="profil.php">Mon Compte</a>
	   <a href="deconnexion.php">Déconnexion</a>
       <?php else: ?>
           <a href="connexion.php">Connexion</a>
           <a href="inscription.php">Inscription</a>
       <?php endif; ?>
     </div>  
   </div>

       <div class="destination">
         <form method="GET" action="presentation.php">
         <button type="submit" name="choix" value="destinations">Destinations</button>
         </form>
         <div id="sous_destination" class="sous-destination">
           <form method="GET" action="destination-film.php">
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
           <form method="GET" action="presentation.php">
	   <i><button type="submit" name="choix" value="destinations">Voir toutes les destinations</button></i>
	   </form>
         </div>   
       </div>
       
       <div class="film">
         <form method="GET" action="presentation.php">
         <button type="submit" name="choix" value="films">Films</button>
         </form>
         <div id="sous_film" class="sous-film">
           <form method="GET" action="destination-film.php">
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
           <form method="GET" action="presentation.php">
	   <i><button type="submit" name="choix" value="films">Voir tous les films</button></i>
	   </form>
         </div> 
       </div>
    </div>
    </div>
</div>

<script src="theme.js"></script>

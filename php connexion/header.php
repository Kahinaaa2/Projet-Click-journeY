<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageAccueil = (isset($_SESSION['connect']) && $_SESSION['connect'] === true)
?>

<div class="entete">
<div class="titre">
    <a href="Page-accueil.php">
        <img src="image/logo.jpg" alt="logo">
    </a>

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
     <div class="sous-accueil">
       <a href="recherche.html">Recherche</a>
       <?php if ($pageAccueil): ?>
           <a href="profil.php">Mon Compte</a>
	   <a href="deconnexion.php">Déconnexion</a>
       <?php else: ?>
           <a href="connexion.php">Connexion</a>
           <a href="inscription.html">Inscription</a>
       <?php endif; ?>
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
</div>

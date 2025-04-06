<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" type="text/css" href="profil.css">
</head>

<body>
    <div class="conteneur-profil">
        <div class="carte-profil">
            <h2 class="titre-profil">Profil Utilisateur</h2>
            <div class="infos-profil">
<?php

if (isset($_SESSION['connect']) && $_SESSION['connect'] === true) {
    $email = $_SESSION['email']; 

    $lignes = file("clients.txt"); 

    if ($lignes) {
        
        foreach ($lignes as $ligne) {
            $mot = explode(';', trim($ligne)); 
            if ($mot[0] === $email) { 
               $prenom = $mot[2];
               $nom = $mot[3];
               $date = $mot[5];

                $prenom = strtolower($prenom);
                $prenom[0] = strtoupper($prenom[0]);

                $nom = strtolower($nom);
                $nom[0] = strtoupper($nom[0]);

                
                echo "<div class='element-info'><span>Nom :</span> <strong>$nom</strong></div>";
                echo "<div class='element-info'><span>Prénom :</span> <strong>$prenom</strong></div>";
                echo "<div class='element-info'><span>Email :</span> <strong>$email</strong></div>";
                echo "<div class='element-info'><span>Date d'inscription :</span> <strong>$date</strong></div>";

                break; 
            }
        }

        echo "<p>Utilisateur non trouvé.</p>";

    } else {
        echo "<p>Impossible d'ouvrir le fichier des utilisateurs.</p>";
    }

} else {
    echo "<p>Vous devez être connecté pour voir votre profil.</p>";
}
?>
            </div>

            <a href="#">
                <button class="bouton-modifier">Modifier le profil</button>
            </a>
            <a href="#">
                <button class="bouton-mdp">Modifier le mot de passe</button>
            </a>
            <a href="deconnexion.php">
                <button class="bouton-deconnexion">Se déconnecter</button>
            </a>
        </div>
    </div>
</body>
</html>

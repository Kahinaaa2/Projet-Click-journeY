<?php
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['role'] != 'client') {
    header('Location: connexion.php');
    exit();
}

if (!isset($_GET['supp'])) {
    header('Location: Page-accueil.php');
    exit();
}

$id = trim($_GET['id']);
$supp = isset($_GET['supp']);
if ($supp) {
    $fichier = 'voyages.txt';
    
    if (file_exists($fichier)) {
        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $nouvellesLignes = [];

        foreach ($lignes as $ligne) {
            $infos = explode(";", $ligne);
            $idLigne = trim(end($infos)); 

            if ($idLigne !== $id) {
                $nouvellesLignes[] = $ligne; 
            }
        }

        file_put_contents($fichier, implode(PHP_EOL, $nouvellesLignes) . PHP_EOL);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Enregistrement du voyage</title>
    <link rel="stylesheet" type="text/css" href="enregistrement.css"> 
</head>
<body>

    <div class="bloc">
<h3>Le voyage a bien été supprimé de votre profil. Découvrez, dès maintenant, d'autres voyages sur notre page d'accueil !</h3>

<a href="Page-accueil.php"><button>Retournez à la page d'accueil</button></a>

    </div>

</body>
</html>

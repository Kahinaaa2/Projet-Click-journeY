<?php
session_start();

if (!isset($_SESSION['connect'])) {
    header("Location: connexion.php");
    exit();
}

if($_SESSION['role'] !== 'admin') {
   header("Location: Page-accueil.php");
    exit(); 
}

if (isset($_GET['email'])) {
    $emailASupprimer = $_GET['email'];

    $fichier = "clients.txt";
    $nouvellesLignes = [];

    if (file_exists($fichier)) {
        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        
       foreach ($lignes as $ligne) {
            $infos = explode(";", $ligne);
            if ($infos[0] === $emailASupprimer) {
                $prenom = ucfirst(strtolower($infos[2] ?? ''));
                $nom = ucfirst(strtolower($infos[3] ?? ''));
                continue;
            }
            $nouvellesLignes[] = $ligne;
        }

        file_put_contents($fichier, implode("\n", $nouvellesLignes));
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
    <link rel="stylesheet" type="text/css" href="pages.css">
</head>
<body>

    <div class="bloc">
<h3>Le compte du client : <?php echo $prenom . ' ' . $nom; ?>, a bien été supprimé. </h3> 

<a href="gestion_utilisateurs.php"><button>Retournez à la liste d'utilisateurs</button></a>

    </div>

</body>
</html>


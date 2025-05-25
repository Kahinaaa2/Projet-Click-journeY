<?php
session_start();

if (!isset($_SESSION['connect'])) {
    header("Location: connexion.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: Page-accueil.php");
    exit();
}

if (!isset($_GET['email'])) {
    header("Location: admin.php");
    exit();
}

$emailModifie = "";

if (isset($_GET['email'])) {
    $emailAdmin = $_GET['email'];

    $fichier = "clients.txt";
    $nouvellesLignes = [];

    if (file_exists($fichier)) {
        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lignes as $ligne) {
            $infos = explode(";", $ligne);

            if ($infos[0] === $emailAdmin) {
                $infos[4] = "admin"; 
                $emailModifie = $infos[0]; 
            }

            $nouvellesLignes[] = implode(";", $infos);
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
    <title>Nouveau Administateur !</title>
    <link rel="stylesheet" type="text/css" href="pages.css">
    
</head>
<body>

<?php
$email = '';

if ($_SESSION['role'] == 'admin' && isset($_GET['email'])) {
    $email = urldecode($_GET['email']);
}

if (!empty($email)) {
    $lignes = file("clients.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $utilisateur = false;

    foreach ($lignes as $i) {
        $mot = explode(';', trim($i));
        if ($mot[0] === $email) {
            $prenom = ucfirst(strtolower($mot[2] ?? ''));
            $nom = ucfirst(strtolower($mot[3] ?? ''));
            
            $utilisateur = true;
            break;
        }
    }

?>

    <div class="bloc">
<h3> <?php echo $prenom . ' ' . $nom; ?> est devenu administrateur ! </h3>

<a href="voir_admin.php"><button>Voir la liste des administrateurs</button></a>

<?php } ?>

    </div>

</body>
<script src="theme.js"></script>
</html>

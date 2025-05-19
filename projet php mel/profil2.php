<?php
session_start();

if (!isset($_SESSION['connect'])){ 
    header('Location: connexion.php');
    exit();
}

if ($_SESSION['role'] != 'admin') {
    header('Location: Page-accueil.php');
    exit();
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Administrateur</title>
    <link rel="stylesheet" type="text/css" href="profil2.css">
</head>

<body>

 <a href="admin.php"><p>🚪</p></a>

    <div class="conteneur-profil">
        <div class="carte-profil">
            <h2 class="titre-profil">Profil Administrateur</h2>
            <div class="infos-profil">

<?php
$email = '';

if ($_SESSION['role'] == 'admin' && !isset($_GET['email'])) {
    $email = $_SESSION['email'];
}

elseif ($_SESSION['role'] == 'admin' && isset($_GET['email'])) {
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
            $date = $mot[5] ?? '';
            $dob = $mot[6] ?? '';
            $adresse = $mot[7] ?? '';

            echo "<div class='element-info'><span>Nom :</span> <strong>$nom</strong></div>";
            echo "<div class='element-info'><span>Prénom :</span> <strong>$prenom</strong></div>";
            echo "<div class='element-info'><span>Date de naissance :</span> <strong>$dob</strong></div>";
            echo "<div class='element-info'><span>Adresse :</span> <strong>$adresse</strong></div>";
            echo "<div class='element-info'><span>Email :</span> <strong>$email</strong></div>";
            echo "<div class='element-info'><span>Date d'inscription :</span> <strong>$date</strong></div>";

            $utilisateur = true;
            break;
        }
    }

    if (!$utilisateur) {
        echo "<p>Utilisateur non trouvé.</p>";
    }
} else {
    echo "<p>Vous devez être connecté pour voir ce profil.</p>";
}
?>
            </div>
     <?php if ($_SESSION['role'] == 'admin' && !isset($_GET['email'])): ?>
            <a href="#">
                <button class="bouton-modifier">Modifier le profil</button>
            </a>
            <a href="deconnexion.php">
                <button class="bouton-deconnexion">Se déconnecter</button>
            </a>
    <?php endif; ?>
        </div>
    </div>
</body>
<script src="theme.js"></script>
</html>

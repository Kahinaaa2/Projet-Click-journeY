<?php 
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['connect'] != true) {
    header('Location: connexion.php');
    exit();

}

if ($_SESSION['role'] == 'client') {
    header('Location: Page-accueil.php');
    exit();

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admistrateur</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>

    <div class="bloc">

<?php
if (isset($_SESSION['connect']) && $_SESSION['connect'] == true) {
    $prenom = $_SESSION['prenom']; 
    $prenom = strtolower($prenom);
    $prenom[0] = strtoupper($prenom[0]);
?>


<h3> Bienvenue dans la partie administrateur <?php echo $prenom; ?> ! Que souhaitez-vous faire ? </h3>

<a href="gestion_utilisateurs.php"><button>Gérer les clients</button></a>
<a href="ajout_admin.php"><button>Ajouter un administrateur</button></a>
<a href="voir_admin.php"><button>Voir les administrateurs</button></a>
<a href="profil2.php"><button>Voir mon profil</button></a>
<a href="deconnexion.php"><button>Déconnexion</button></a>

<?php } ?>

    </div>

</body>
<script src="theme.js"></script>
</html>

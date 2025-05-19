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

$clients = [];
$clientsFiltres = [];
$parPage = 12;

// Lecture depuis clients.txt
if (file_exists("clients.txt")) {
    $lignes = file("clients.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lignes as $ligne) {
        $infos = explode(";", $ligne);
        if (isset($infos[4]) && trim($infos[4]) === "admin") {
            $clientsFiltres[] = $infos;
        }
    }
}

$totalClients = count($clientsFiltres);
$pagesTotales = ceil($totalClients / $parPage);
$pageActuelle = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$debut = ($pageActuelle - 1) * $parPage;
$clientsAffiches = array_slice($clientsFiltres, $debut, $parPage);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="gestion.css">
</head>
<body>

 <a href="admin.php"><p>🚪</p></a>


<h1>Liste des utilisateurs</h1>

<div class="conteneur-blocs">
<?php foreach ($clientsAffiches as $mot): 
    $email = $mot[0] ?? '';
    $prenom = ucfirst(strtolower($mot[2] ?? ''));
    $nom = ucfirst(strtolower($mot[3] ?? ''));
    $date = $mot[5] ?? '';
    $dob = $mot[6] ?? '';
    $adresse = $mot[7] ?? '';
?>
    <div class="element-info">
        <p><strong>Nom :</strong> <?= $nom ?></p>
        <p><strong>Prénom :</strong> <?= $prenom ?></p><br>
        <p><strong>Email :</strong> <?= $email ?></p><br>
        <div class ="boutons">
        <div class = "c">
      <a href="profil2.php?email=<?= urlencode($email) ?>"><button>Voir le profil</button></a>
  </div>
</div>
</div>
<?php endforeach; ?>
</div>

<div class="pagination">
    <?php for ($i = 1; $i <= $pagesTotales; $i++): ?>
        <a class="<?= ($i == $pageActuelle) ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>

</body>
</html>

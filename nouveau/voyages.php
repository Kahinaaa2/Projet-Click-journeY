<?php
session_start();

if (!isset($_SESSION['connect'])) {
    header('Location: connexion.php');
    exit();
}

if ($_SESSION['role'] == 'admin' && !isset($_GET['email'])) {
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyages</title>
    <link rel="stylesheet" type="text/css" href="compte.css">
    <link rel="stylesheet" type="text/css" href="voyages.css">
</head>
<body>

<div class="navigation-profil">

    <div class="profil">
        <?php if ($_SESSION['role'] == 'admin' && isset($_GET['email'])): ?>
        <a href="profil.php?email=<?= urlencode($_GET['email']) ?>">Informations du client</a>
    </div>
    <div class="voyage">
        <a href="voyages.php">Voyages du client</a>
        <?php else: ?>
               <a href="profil.php">Mes informations</a>
    </div>
    <div class="voyage">
        <a href="voyages.php">Mes voyages</a>
        <?php endif; ?>
    </div>
</div>

<?php
$email = '';

if (isset($_SESSION['connect']) && $_SESSION['connect'] === true && $_SESSION['role'] == 'client') {
    $email = $_SESSION['email'];
}

elseif ($_SESSION['role'] == 'admin' && isset($_GET['email'])) {
    $email = urldecode($_GET['email']);
}

$voyage = [];


if (!empty($email) && file_exists("voyages.txt")) {
  $lignes = file("voyages.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  $lignes = array_reverse($lignes);
    foreach ($lignes as $ligne) {
        $infos = explode(";", trim($ligne));
        if ($infos[0] === $email) {
                $voyage[] = $infos;
            }
        }
    }
?>

<?php if (!empty($voyage)): ?>

<div class="conteneur-blocs">
    <?php foreach ($voyage as $v): 
	$titre = $v[1];
        $ville = $v[2];
        $pays = trim($v[3]);
        $film = $v[4];
        $depart = $v[5];
        $retour = $v[6];
        $statut = $v[17];
        $prixtot = $v[16];
	$destination = $v[15];

	$nbAdultes = $v[7];
	$nbEnfants = $v[8];

	$option1adulte = $v[9];
 	$option2adulte = $v[10];
	$option3adulte = $v[11];

	$option1enfant = $v[12];
	$option2enfant = $v[13];
	$option3enfant = $v[14];
    ?>
    
<form action="recap.php" method="POST" class="voyage-int" target="_blank">

<?php if ($statut == "Consulté"): ?>
        <input type="hidden" name="consulte" value="1">
<?php elseif ($statut == "Payé"): ?>
        <input type="hidden" name="paye" value="1">
<?php endif; ?>


    <input type="hidden" name="titre" value="<?= htmlspecialchars($titre) ?>">
    <input type="hidden" name="ville" value="<?= htmlspecialchars($ville) ?>">
    <input type="hidden" name="pays" value="<?= htmlspecialchars($pays) ?>">
    <input type="hidden" name="film" value="<?= htmlspecialchars($film) ?>">
    <input type="hidden" name="depart" value="<?= htmlspecialchars($depart) ?>">
    <input type="hidden" name="return" value="<?= htmlspecialchars($retour) ?>">
    <input type="hidden" name="statut" value="<?= htmlspecialchars($statut) ?>">
    <input type="hidden" name="prix_total" value="<?= htmlspecialchars($prixtot) ?>">
    <input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">

<input type="hidden" name="adults" value="<?= htmlspecialchars($nbAdultes) ?>">
<input type="hidden" name="enfant" value="<?= htmlspecialchars($nbEnfants) ?>">

<input type="hidden" name="adulte_count1" value="<?= htmlspecialchars($option1adulte) ?>">
<input type="hidden" name="adulte_count2" value="<?= htmlspecialchars($option2adulte) ?>">
<input type="hidden" name="adulte_count3" value="<?= htmlspecialchars($option3adulte) ?>">

<input type="hidden" name="enfant_count1" value="<?= htmlspecialchars($option1enfant) ?>">
<input type="hidden" name="enfant_count2" value="<?= htmlspecialchars($option2enfant) ?>">
<input type="hidden" name="enfant_count3" value="<?= htmlspecialchars($option3enfant) ?>">


    <button type="submit" class="voyage-bouton">
	<div class = "image">	
	<p>hey</p>
	</div>
	<div class = "infos">
	<p class = "titre"> Voyage pour <b><?= $titre ?></b></p>
	<div class ="left">
        <p><b>Destination :</b> <?= $ville ?> (<?= $pays ?>) </p>
        <p><b>Film :</b> <?= $film ?></p>
        <p><b>Date de départ :</b> <?= $depart ?></p>
        <p><b>Date de retour :</b> <?= $retour ?></p>
	</div>
	<div class ="right">
        <p><b>Statut :</b> <?= $statut?></p>
        <p><b>Prix :</b> <?= $prixtot?> €</p>
	</div>
	</div>
    </button>
 </form>
    <?php endforeach; ?>
</div>

<?php endif; ?>


</body>
</html>



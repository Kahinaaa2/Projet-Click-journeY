<?php
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['role'] != 'client') {
    header('Location: connexion.php');
    exit();
}

if (!isset($_GET['destination'])) {
    header('Location: Page-accueil.php');
    exit();
}

$consulte = isset($_GET['consulte']);
$paye = isset($_GET['paye']);
$panier = isset($_GET['panier']);

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $depart = trim($_GET['depart']);
    $retour = trim($_GET['return']);
    $nbAdultes = trim($_GET['adults']);
    $nbEnfants = trim($_GET['enfant']);
    $email = $_SESSION['email'];
    $prenom = $_SESSION['prenom'];
    $prenom = ucfirst(strtolower($prenom));
    $destination = trim($_GET['destination']);
    $id = trim($_GET['id']);

    $prixtot = trim($_GET['prix_total']);

    $option1adulte = trim($_GET['adulte_count1']);
    $option2adulte = trim($_GET['adulte_count2']);
    $option3adulte = trim($_GET['adulte_count3']);

    $option1enfant = trim($_GET['enfant_count1']);
    $option2enfant = trim($_GET['enfant_count2']);
    $option3enfant = trim($_GET['enfant_count3']);

    $nuits = trim($_GET['nuits']);
 
$fic = "destinations/" . $destination . ".csv";
if (file_exists($fic)) {
    $lignes = file($fic); 
} else {
    die("Le fichier de destination est introuvable.");
}

$titre = trim($lignes[0]);

$ville = trim($lignes[2]);
$pays = trim($lignes[22]);
$film = trim($lignes[3]);
$film = ucfirst(strtolower($film));

$prix = $lignes[14];
$prix2 = $lignes[21];

$prix1_1 = $lignes[15];
$prix1_2 = $lignes[16];
$prix1_3 = $lignes[17];

$prix2_1 = $lignes[18];
$prix2_2 = $lignes[19];
$prix2_3 = $lignes[20];

}

if (file_exists("clients.txt")) {
    $lines = file("clients.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $mots = explode(';', trim($line));
        if ($mots[0] === $email) {
            $nom = $mots[3]; 
	    $nom = ucfirst(strtolower($nom));
            break; 
        }
    }
} else {
    echo "Le fichier clients.txt n'existe pas.";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Récapitulatif</title>
    <link rel="stylesheet" type="text/css" href="recap.css"> 
</head>

<body>

<div class="container">

<h1> Réservation pour <?php echo $titre ?> </h1>

    <div class="carree">
        

<?php
if ((!$paye && !$consulte) && (!$panier) ){
    $fic = fopen("voyages.txt", "a");
    if ($fic) {
	$id = uniqid();
        fwrite($fic, "$email;$titre;$ville;$pays;$film;$depart;$retour;$nbAdultes;$nbEnfants;$option1adulte;$option2adulte;$option3adulte;$option1enfant;$option2enfant;$option3enfant;$destination;$prixtot;Consulté;$id\n");
        fclose($fic);
    } else {
        echo "<p>Erreur lors de l'enregistrement du voyage.</p>";
    }
}
?>

<p> Vous avez effectué une réservation pour <b><?= $ville ?> (<?=$pays?>)</b> sur le thème du film <b><?= $film ?> !</b></p> 
<p> Voici un <b>récapitulatif</b> de votre réservation.</p>
<br>
<u><p>Nom du voyageur :</u> <i><?= $prenom .' '. $nom ?></i></p>
<u><p>E-mail :</u> <i><?= $email ?></i></p>
<br>
<u><p>Destination :</u> <i><?= $pays ?> (<?=$ville?>)</i></p>
<u><p>Film :</u> <i><?= $film ?></i></p>
<br>
<u><p>Date de départ :</u> <i><?= $depart ?></i></p>
<u><p>Date de retour :</u> <i><?= $retour ?></i></p>
<br>
<u><p>Nombre de voyageurs :</u></p>
<ul><p>Adultes : <i><?= $nbAdultes ?></i></p></ul>
<ul><p>Enfants : <i><?= $nbEnfants ?></i></p></ul>
<br>
<u><p>Options :</u></p>
<ul><p>Hébergement : <i><?= $option1adulte ?></i> Adultes et <i><?= $option1enfant ?></i> Enfants </p></ul>
<ul><p>Restaurants : <i><?= $option2adulte ?></i> Adultes et <i><?= $option2enfant ?></i> Enfants </p></ul>
<ul><p>Sortie Extra : <i><?= $option3adulte ?></i> Adultes et <i><?= $option3enfant ?></i> Enfants </p></ul>

<?php if (($consulte)||($paye)||($panier)): ?>
<h2>Total : <span><?php echo $prixtot ?> €</span> </h2>
<?php else: ?>
<h2>Total : <span id="total">0 €</span> </h2>
<?php endif; ?>

<script>

var adultes = <?= intval($nbAdultes) ?>;
var enfants = <?= intval($nbEnfants) ?>;

var adulte1 = <?= intval($option1adulte) ?>;
var adulte2 = <?= intval($option2adulte) ?>;
var adulte3 = <?= intval($option3adulte) ?>;

var enfant1 = <?= intval($option1enfant) ?>;
var enfant2 = <?= intval($option2enfant) ?>;
var enfant3 = <?= intval($option3enfant) ?>;

var prixadulte = <?= floatval($prix) ?>;
var prixenfant = <?= floatval($prix2) ?>;

var prix1 = <?= floatval($prix1_1) ?>;
var prix2 = <?= floatval($prix1_2) ?>;
var prix3 = <?= floatval($prix1_3) ?>;

var prix4 = <?= floatval($prix2_1) ?>;
var prix5 = <?= floatval($prix2_2) ?>;
var prix6 = <?= floatval($prix2_3) ?>;

var nuits = <?= $nuits ?>;

function calcul_prix(){

let total = (adultes*prixadulte) + (enfants*prixenfant) + (adulte1*prix1)*nuits + (adulte2*prix2)*(nuits+1) + (adulte3*prix3) + (enfant1*prix4)*nuits + (enfant2*prix5)*(nuits+1) + (enfant3*prix6);
document.getElementById('total').innerText = total + ' €';

}

calcul_prix();

</script>

<?php if ($consulte): ?>

<div class="boutons">
<form action="reservation.php" method="GET">
<input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
<input type="hidden" name="supp">
<input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
<button type="submit" id="modif">Modifier</button>
</form>

<form action="changer_statut.php" method="POST">
<input type="hidden" name="statut" value="Panier">
<input type="hidden" name="pageavant" value="recap">
<input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
<input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
<button type="submit" id="payer">Ajouter au panier</button>
</form>

<form action="supprimer_voyage.php" method="GET">
<input type="hidden" name="supp">
<input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
<button type="submit" id="supp">Supprimer le voyage</button>
</form>

<form action="voyages.php" method="GET">
<button type="submit" id="enregistrer">Mes voyages</button>
</form>

<form action="panier.php" method="GET">
<button type="submit" id="enregistrer">Mon panier</button>
</form>

</div>

 <?php elseif ($paye): ?>

<div class="boutons">

<form action="voyages.php" method="GET">
<button type="submit" id="enregistrer">Retour</button>
</form>

</div>

<?php elseif ($panier): ?>

<div class="boutons">
<form action="reservation.php" method="GET">
<input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
<input type="hidden" name="supp">
<input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
<button type="submit" id="modif">Modifier</button>
</form>

<form action="panier.php" method="GET">
<button type="submit" id="payer">Allez au panier</button>
</form>

<form action="supprimer_voyage.php" method="GET">
<input type="hidden" name="supp">
<input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
<button type="submit" id="supp">Supprimer le voyage</button>
</form>

<form action="voyages.php" method="GET">
<button type="submit" id="supp">Mes voyages</button>
</form>

<?php else: ?>

<div class="boutons">
<form action="reservation.php" method="GET">
<input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
<input type="hidden" name="modifier">
<button type="submit" id="modif">Modifier</button>
</form>
<form action="enregistrement.php" method="GET">
<input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
<button type="submit" id="enregistrer">Enregistrer le voyage</button>
</form>
<form action="changer_statut.php" method="POST">
<input type="hidden" name="statut" value="Panier">
<input type="hidden" name="pageavant" value="recap">
<input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
<input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
<button type="submit" id="payer">Ajouter au panier</button>
</form>
</form>
</div>

<?php endif; ?>

</div>
<script src="theme.js"></script>
</body>
</html>

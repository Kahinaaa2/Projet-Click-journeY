<?php
session_start();

if (!isset($_SESSION['connect'])) {
    header('Location: connexion.php');
    exit();
}

if ($_SESSION['role'] == 'admin') {
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <link rel="stylesheet" type="text/css" href="panier.css">
</head>
<body>

<?php
$globalprix = 0;
$email = '';

if (isset($_SESSION['connect']) && $_SESSION['connect'] === true && $_SESSION['role'] == 'client') {
    $email = $_SESSION['email'];
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
        unset($infos);
    }
?>
<div class="retour">
  <a href="Page-accueil.php">Retour</a>
</div>
<?php 
if (empty($voyage)){
  echo "<p class='vide'>Vous n'avez aucun voyage consulté ou dans le panier</p>";
}
if (!empty($voyage)): ?>
<div class="bloc1">
<div class="bloc2-groupe">
<div class="bloc2-entete"><p>Mes Voyages</p></div>
<div class="bloc2">
<div id="source" class="conteneur-blocs">
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
        $id = $v[18];
        
	$nbAdultes = $v[7];
	$nbEnfants = $v[8];

	$option1adulte = $v[9];
 	$option2adulte = $v[10];
	$option3adulte = $v[11];

	$option1enfant = $v[12];
	$option2enfant = $v[13];
	$option3enfant = $v[14];
    ?>
    
    
    
<form action="recap.php" method="GET" class="voyage-int" >

<?php if ($statut == "Consulté"): ?>
        <input type="hidden" name="consulte" value="1">
<?php elseif ($statut == "Payé"): ?>
        <input type="hidden" name="paye" value="1">
<?php elseif ($statut == "Panier"): ?>
        <input type="hidden" name="panier" value="1">
<?php endif; ?>

<?php if($statut == "Consulté"){?>


    <input type="hidden" name="titre" value="<?= htmlspecialchars($titre) ?>">
    <input type="hidden" name="ville" value="<?= htmlspecialchars($ville) ?>">
    <input type="hidden" name="pays" value="<?= htmlspecialchars($pays) ?>">
    <input type="hidden" name="film" value="<?= htmlspecialchars($film) ?>">
    <input type="hidden" name="depart" value="<?= htmlspecialchars($depart) ?>">
    <input type="hidden" name="return" value="<?= htmlspecialchars($retour) ?>">
    <input type="hidden" name="statut" value="<?= htmlspecialchars($statut) ?>">
    <input type="hidden" name="prix_total" value="<?= htmlspecialchars($prixtot) ?>">
    <input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

<input type="hidden" name="adults" value="<?= htmlspecialchars($nbAdultes) ?>">
<input type="hidden" name="enfant" value="<?= htmlspecialchars($nbEnfants) ?>">

<input type="hidden" name="adulte_count1" value="<?= htmlspecialchars($option1adulte) ?>">
<input type="hidden" name="adulte_count2" value="<?= htmlspecialchars($option2adulte) ?>">
<input type="hidden" name="adulte_count3" value="<?= htmlspecialchars($option3adulte) ?>">

<input type="hidden" name="enfant_count1" value="<?= htmlspecialchars($option1enfant) ?>">
<input type="hidden" name="enfant_count2" value="<?= htmlspecialchars($option2enfant) ?>">
<input type="hidden" name="enfant_count3" value="<?= htmlspecialchars($option3enfant) ?>">

   <div class="bloc-panier">
    <button type="submit" class="voyage-bouton">
	<div class = "image">	
	<?php echo'<img src="image/' . $ville . '_3.2.jpg" alt="ville">';?>
	</div>
	<div class = "infos">
	<p class = "titre"> Voyage pour <b><?= $titre ?></b></p>
	<div class ="centre">
        <p><b>Date de départ :</b> <?= $depart ?></p>
        <p><b>Date de retour :</b> <?= $retour ?></p>
	</div>
	<div class ="centre">
        <p><b>Adultes :</b> <?= $nbAdultes?> <b>Enfants:</b> <?= $nbEnfants?> <b>Prix :</b> <?= $prixtot?> €</p>
	</div>
    </button>
    <div class="stockage" data-title="<?= $id ?>" data-price="<?= htmlspecialchars($prixtot) ?>">
    <img src="image/panier.png">
    </div>
   </div>
 </form>
    <?php }endforeach; ?>
</div>
</div>
</div>


<div class="bloc2-groupe">
<div class="bloc2-entete"><p>Mon Panier</p></div>
<div class="bloc2">
<div id="destination2" class="conteneur-blocs">
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
        $id = $v[18];
        
	$nbAdultes = $v[7];
	$nbEnfants = $v[8];

	$option1adulte = $v[9];
 	$option2adulte = $v[10];
	$option3adulte = $v[11];

	$option1enfant = $v[12];
	$option2enfant = $v[13];
	$option3enfant = $v[14];
    ?>
    
<form action="recap.php" method="GET" class="voyage-int" >

<?php if ($statut == "Consulté"): ?>
        <input type="hidden" name="consulte" value="1">
<?php elseif ($statut == "Payé"): ?>
        <input type="hidden" name="paye" value="1">
<?php elseif ($statut == "Panier"): ?>
        <input type="hidden" name="panier" value="1">
<?php endif; ?>

<?php if($statut == "Panier"){?>

<?php $globalprix += $prixtot;?>

    <input type="hidden" name="titre" value="<?= htmlspecialchars($titre) ?>">
    <input type="hidden" name="ville" value="<?= htmlspecialchars($ville) ?>">
    <input type="hidden" name="pays" value="<?= htmlspecialchars($pays) ?>">
    <input type="hidden" name="film" value="<?= htmlspecialchars($film) ?>">
    <input type="hidden" name="depart" value="<?= htmlspecialchars($depart) ?>">
    <input type="hidden" name="return" value="<?= htmlspecialchars($retour) ?>">
    <input type="hidden" name="statut" value="<?= htmlspecialchars($statut) ?>">
    <input type="hidden" name="prix_total" value="<?= htmlspecialchars($prixtot) ?>">
    <input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

<input type="hidden" name="adults" value="<?= htmlspecialchars($nbAdultes) ?>">
<input type="hidden" name="enfant" value="<?= htmlspecialchars($nbEnfants) ?>">

<input type="hidden" name="adulte_count1" value="<?= htmlspecialchars($option1adulte) ?>">
<input type="hidden" name="adulte_count2" value="<?= htmlspecialchars($option2adulte) ?>">
<input type="hidden" name="adulte_count3" value="<?= htmlspecialchars($option3adulte) ?>">

<input type="hidden" name="enfant_count1" value="<?= htmlspecialchars($option1enfant) ?>">
<input type="hidden" name="enfant_count2" value="<?= htmlspecialchars($option2enfant) ?>">
<input type="hidden" name="enfant_count3" value="<?= htmlspecialchars($option3enfant) ?>">

   <div class="bloc-panier">
    <button type="submit" class="voyage-bouton">
	<div class = "image">	
	<?php echo'<img src="image/' . $ville . '_3.2.jpg" alt="ville">';?>
	</div>
	<div class = "infos">
	<p class = "titre"> Voyage pour <b><?= $titre ?></b></p>
	<div class ="centre">
        <p><b>Date de départ :</b> <?= $depart ?></p>
        <p><b>Date de retour :</b> <?= $retour ?></p>
	</div>
	<div class ="centre">
        <p><b>Adultes :</b> <?= $nbAdultes?> <b>Enfants:</b> <?= $nbEnfants?> <b>Prix :</b> <?= $prixtot?> €</p>
	</div>
    </button>
    <div class="stockage" data-title="<?= $id ?>" data-price="<?= htmlspecialchars($prixtot) ?>">
    <img src="image/retour.png">
    </div>
   </div>
 </form>
 
    <?php }endforeach; ?>
</div>
  
</div>
</div>
<?php endif; ?>

<script>
const source = document.getElementById('source');
const destination2 = document.getElementById('destination2');
let total = <?= $globalprix ?>;

// Création du formulaire de paiement
const formPaiement = document.createElement('form');
formPaiement.method = 'GET';
formPaiement.action = 'paiement.php';

// Champ caché pour le prix total
const inputTotal = document.createElement('input');
inputTotal.type = 'hidden';
inputTotal.name = 'prix_total';
inputTotal.id = 'prix_total_input';
inputTotal.value = total.toFixed(2);
formPaiement.appendChild(inputTotal);

// Bouton de paiement
const boutonPaiement = document.createElement('button');
boutonPaiement.type = 'submit';
boutonPaiement.id = 'paiement';
boutonPaiement.innerText = 'Passez au paiement';
boutonPaiement.className = 'paiementcss';
formPaiement.appendChild(boutonPaiement);
destination2.appendChild(formPaiement);

updateTotal();

// Met à jour le total affiché dans le panier
function updateTotal() {
  let totalPanier = document.getElementById('total');
  if (!totalPanier) {
    totalPanier = document.createElement('div');
    totalPanier.id = 'total';
    totalPanier.style.width = '20vw';
    totalPanier.style.backgroundColor = '#0e0047';
    totalPanier.style.fontSize = '1.5vw';
    totalPanier.style.margin = '0 auto 2vw auto';
    totalPanier.style.textAlign = 'center';
    totalPanier.style.color = 'white';
    totalPanier.style.padding = '1vw';
    totalPanier.style.borderRadius = '1vw';
  }
  totalPanier.innerText = "Total : " + total.toFixed(2) + " €";

  // Mise à jour du champ caché du formulaire paiement
  inputTotal.value = total.toFixed(2);
  
  if (total <= 0) {
  boutonPaiement.disabled = true;
} else {
  boutonPaiement.disabled = false;
}
  destination2.appendChild(totalPanier);
  destination2.appendChild(formPaiement);
}

function addToCart(stockage) {
  const voyageForm = stockage.closest('.voyage-int');
  const prix = parseFloat(stockage.dataset.price);
  const titre = stockage.dataset.title;

  if (destination2.querySelector(`.voyage-int[data-title="${titre}"]`)) return;

  const clone = voyageForm.cloneNode(true);
  clone.dataset.title = titre;
  clone.dataset.price = prix;

  const image = clone.querySelector('.stockage img');
  if (image) {
    image.src = 'image/retour.png';
    image.style.cursor = 'pointer';
  }

  destination2.appendChild(clone);
  if (voyageForm.parentNode === source) source.removeChild(voyageForm);

  total += prix;
  updateTotal();

  // Mise à jour AJAX statut => "Panier"
  const id = voyageForm.querySelector('input[name="id"]').value;
  const email = "<?= $email ?>";

  fetch('changer_statut.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `id=${encodeURIComponent(id)}&email=${encodeURIComponent(email)}&statut=Panier`
  })
  .then(res => res.text())
  .then(console.log)
  .catch(console.error);
}

function removeFromCart(stockage) {
  const voyageForm = stockage.closest('.voyage-int');
  const prix = parseFloat(stockage.dataset.price);
  const titre = stockage.dataset.title;

  if (voyageForm.parentNode === destination2) {
    destination2.removeChild(voyageForm);
  }

  if (source.querySelector(`.voyage-int[data-title="${titre}"]`)) return;

  const clone = voyageForm.cloneNode(true);
  clone.dataset.title = titre;
  clone.dataset.price = prix;

  const image = clone.querySelector('.stockage img');
  if (image) {
    image.src = 'image/panier.png';
    image.style.cursor = 'pointer';
  }

  source.appendChild(clone);

  total -= prix;
  updateTotal();

  // Mise à jour AJAX statut => "Consulté"
  const id = voyageForm.querySelector('input[name="id"]').value;
  const email = "<?= $email ?>";

  fetch('changer_statut.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `id=${encodeURIComponent(id)}&email=${encodeURIComponent(email)}&statut=Consulté`
  })
  .then(res => res.text())
  .then(console.log)
  .catch(console.error);
}

document.body.addEventListener('click', (e) => {
  const stockage = e.target.closest('.stockage');
  if (!stockage) {
    console.log("Pas de .stockage trouvé");
    return;
  }

  const parentForm = stockage.closest('.voyage-int');

  if (source.contains(parentForm)) {
    e.preventDefault();
    addToCart(stockage);
  } else if (destination2.contains(parentForm)) {
    e.preventDefault();
    removeFromCart(stockage);
  }
});


</script>


<script src="theme.js"></script>
</body>
</html>



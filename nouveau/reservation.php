<?php
session_start();

if (!isset($_SESSION['connect']) || $_SESSION['role'] != 'client') {
    header('Location: connexion.php');
    exit();
}

if (!isset($_POST['destination'])) {
    header('Location: Page-accueil.php');
    exit();
}

$destination = $_POST['destination'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" type="text/css" href="reservation.css"> 
</head>

<body style="background: #FEFAE0">

<div class="container">

<?php

$fic = "destinations/" . $destination . ".csv";
if($fic){
$lignes = file($fic); 

$titre = $lignes[0];

$prix = $lignes[14];
$prix2 = $lignes[21];

$prix1_1 = $lignes[15];
$prix1_2 = $lignes[16];
$prix1_3 = $lignes[17];

$prix2_1 = $lignes[18];
$prix2_2 = $lignes[19];
$prix2_3 = $lignes[20];
}


?>

<h1> Réservation pour <?php echo $titre ?> </h1>

<div class="carree">


<form action="recap.php" method="POST" class="formulaire" target="_blank">

    <label for="depart">Date de départ :</label>
    <input type="date" id="depart" name="depart" required onchange="calculerTotal()">

    <label for="date">Date de fin :</label>
    <input type="date" id="return" name="return" max="2027-12-31" required onchange="calculerTotal()">

    <script>

        function todayDate(){

        let today = new Date();

        let jour = String(today.getDate()).padStart(2, '0');
        let mois = String(today.getMonth() + 1).padStart(2, '0');
        let annee = today.getFullYear(); 

        return annee + "-" + mois + "-" + jour;

        }

        var depart = document.getElementById('depart');
        var retour = document.getElementById('return');

        var limite = todayDate();
        depart.min = limite;

         depart.addEventListener('change', function () {

           let dateDepart = new Date(depart.value); 
           dateDepart.setDate(dateDepart.getDate() + 1); 

    let yyyy = dateDepart.getFullYear();
    let mm = String(dateDepart.getMonth() + 1).padStart(2, '0');
    let dd = String(dateDepart.getDate()).padStart(2, '0');

    let dateRetour = `${yyyy}-${mm}-${dd}`;

    retour.min = dateRetour;
        });

</script>

<script>

   function genererPersonnes() { 

let nbAdultes = document.getElementById('adults').value;
document.getElementById('option-container').innerHTML = '';

  for (let i = 0; i < nbAdultes; i++) {
    let option = document.createElement('div');
     option.classList.add('option');
     option.innerHTML = `

	<div class="int-option1">

          <h2>Adulte ${i + 1}</h2>

		<div class="int-option2">
          
                <p>Prix pour les Adultes :</p>
		<p>Billet d'Avion (inclus) : <?php echo $prix; ?>€</p>
                <p>Hébergement : <?php echo $prix1_1; ?>€/nuit</p>
                <p>Restaurants : <?php echo $prix1_2; ?>€/repas</p>
                <p>Sortie Extra : <?php echo $prix1_3; ?>€</p>
		
		<div class="int-option3">			
	      <label><input type="checkbox" onchange="calculerTotal()" name="options[${i}][hebergement]"value="hebergement"> Hébergement</label>
              <label><input type="checkbox" onchange="calculerTotal()" name="options[${i}][restaurant]" value="restaurant"> Restaurants</label>
              <label><input type="checkbox" onchange="calculerTotal()" name="options[${i}][extra]" value="extra"> Sortie<span>Extra</span></label>

		</div>
          <div class="erreur" style="color:red; font-style: italic; margin-top: 1vw;"></div>
        </div>
      </div>

        `;
                document.getElementById('option-container').appendChild(option);
	
	}

calculerTotal();

  }

       function genererPersonnes2() {

let nbEnfants = document.getElementById('enfant').value;
document.getElementById('option-container2').innerHTML = '';

  for (let i = 0; i < nbEnfants; i++) {
    let option = document.createElement('div');
     option.classList.add('option');
     option.innerHTML = `

	<div class="int-option1">

          <h2>Enfant ${i + 1}</h2>

		<div class="int-option2">
          
                <p>Prix pour les Enfants :</p>
		<p>Billet d'Avion (inclus) : <?php echo $prix2; ?>€</p>
                <p>Hébergement : <?php echo $prix2_1; ?>€/nuit</p>
                <p>Restaurants : <?php echo $prix2_2; ?>€/repas</p>
                <p>Sortie Extra : <?php echo $prix2_3; ?>€</p>
		
		<div class="int-option3">		
		
	      <label><input type="checkbox" onchange="calculerTotal()" name="options[${i}][hebergement]"value="hebergement"> Hébergement</label>
              <label><input type="checkbox" onchange="calculerTotal()" name="options[${i}][restaurant]" value="restaurant"> Restaurants</label>
              <label><input type="checkbox" onchange="calculerTotal()" name="options[${i}][extra]" value="extra"> Sortie<span>Extra</span></label>

		</div>
		<div class="erreur" style="color:red; font-style: italic; margin-top: 1vw;"></div>
		</div>
	</div>

        `;
                document.getElementById('option-container2').appendChild(option);
	
	}

calculerTotal();

  }

        </script>

        <label for="adultes">Nombre d'adultes :</label>
        <input type="number" id="adults" name="adults" value="0" min="1" required onchange="genererPersonnes()">

        <label for="enfant">Nombre d'enfants (-13 ans) :</label>
        <input type="number" id="enfant" name="enfant" value="0" min="0" required onchange="genererPersonnes2()">

	<input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
   
        <div id="option-container"></div>
        <div id="option-container2"></div>

<script>
const prix = {
  adulte: {
    avion: <?= $prix ?>,
    hebergement: <?= $prix1_1 ?>,
    restaurant: <?= $prix1_2 ?>,
    extra: <?= $prix1_3 ?>
  },
  enfant: {
    avion: <?= $prix2 ?>,
    hebergement: <?= $prix2_1 ?>,
    restaurant: <?= $prix2_2 ?>,
    extra: <?= $prix2_3 ?>
  }
};

function calculerTotal() {
  let total = 0;

  let countAdulte = [0, 0, 0]; 
  let countEnfant = [0, 0, 0];

 const departValue = document.getElementById('depart').value;
 const retourValue = document.getElementById('return').value;

  const dateDepart = new Date(departValue);
  const dateRetour = new Date(retourValue);

  const diffTime = dateRetour - dateDepart;
  const nbNuits = Math.round(diffTime / (1000 * 60 * 60 * 24));

  const adultes = document.querySelectorAll('#option-container .option');
  adultes.forEach((adulte, i) => {

	total += prix.adulte.avion;	

    const erreurDiv = adulte.querySelector('.erreur');
    erreurDiv.innerHTML = '';

  const hebergementCheckbox = adulte.querySelector(`input[name="options[${i}][hebergement]"]`);
    if (hebergementCheckbox?.checked) {
      if (!departValue || !retourValue) {
        erreurDiv.innerHTML = 'Veuillez sélectionner les dates pour l’hébergement.';
      } else {
        total += prix.adulte.hebergement * nbNuits;
        countAdulte[0]++;
      }
    }

    if (adulte.querySelector(`input[name="options[${i}][restaurant]"]`)?.checked){
      total += prix.adulte.restaurant;
      countAdulte[1]++;
    }

    if (adulte.querySelector(`input[name="options[${i}][extra]"]`)?.checked){
      total += prix.adulte.extra;
      countAdulte[2]++;
    }
  });

  const enfants = document.querySelectorAll('#option-container2 .option');
  enfants.forEach((enfant, i) => {

	total += prix.enfant.avion;

    const erreurDiv = enfant.querySelector('.erreur');
    erreurDiv.innerHTML = '';

    const hebergementCheckbox = enfant.querySelector(`input[name="options[${i}][hebergement]"]`);
    if (hebergementCheckbox?.checked) {
      if (!departValue || !retourValue) {
        erreurDiv.innerHTML = 'Veuillez sélectionner les dates pour l’hébergement.';
      } else {
        total += Number(prix.enfant.hebergement) * nbNuits;
        countEnfant[0]++;
      }
    }
    if (enfant.querySelector(`input[name="options[${i}][restaurant]"]`)?.checked){
      total += prix.enfant.restaurant;
      countEnfant[1]++;
    }

    if (enfant.querySelector(`input[name="options[${i}][extra]"]`)?.checked){
      total += prix.enfant.extra;
      countEnfant[2]++;
   }
  });

  document.getElementById('total').innerText = total + ' €';
  document.getElementById('prix_total').value = total;

  document.getElementById('adulte_count1').value = countAdulte[0];
  document.getElementById('adulte_count2').value = countAdulte[1];
  document.getElementById('adulte_count3').value = countAdulte[2];
  
  document.getElementById('enfant_count1').value = countEnfant[0];
  document.getElementById('enfant_count2').value = countEnfant[1];
  document.getElementById('enfant_count3').value = countEnfant[2];

  document.getElementById('nuits').value = nbNuits;

}
</script>

        <h2>Total : <span id="total">0 €</span> </h2>
	<input type="hidden" name="prix_total" id="prix_total">

<input type="hidden" name="adulte_count1" id="adulte_count1">
<input type="hidden" name="adulte_count2" id="adulte_count2">
<input type="hidden" name="adulte_count3" id="adulte_count3">

<input type="hidden" name="enfant_count1" id="enfant_count1">
<input type="hidden" name="enfant_count2" id="enfant_count2">
<input type="hidden" name="enfant_count3" id="enfant_count3">

<input type="hidden" name="nuits" id="nuits">

    <button type="submit">Réserver</button>

</form>
</div>


</div>
</div>
</div>


      
</body>
</html>

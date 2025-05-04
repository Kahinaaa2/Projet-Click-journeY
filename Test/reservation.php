<?php
$ville = $_GET['ville'] ?? 'Destination';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Réservation pour <?= htmlspecialchars($ville) ?></title>
  <style>
      body {
        font-family: sans-serif;
        margin: 0;
        padding: 0;
        background-color: #0e0047;
        color: #333;
      }
      h1 {
        text-align: center;
        margin: 20px;
        font-size: 2rem;
        color: #fefae0;
      }
      .formulaire {
        background-color: #f9f9f9;
        padding: 20px;
        margin: 0 auto;
        width: 80%;
        max-width: 800px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .formulaire label {
        font-size: 1rem;
        margin-bottom: 8px;
        display: block;
      }
      .formulaire input,
      .formulaire select {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
      }
      .option {
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 10px;
      }
      .option div {
        display: flex;
        align-items: center;
        gap: 5px;
        background-color: #f5c518;
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
      }
      .personne {
        background-color: #f8f9fa;
        padding: 15px;
        margin: 15px 0;
        border-radius: 8px;
        border: 1px solid #ddd;
      }
      .personne h3 {
        margin-top: 0;
        color: #0e0047;
      }
      button {
        padding: 12px 20px;
        background-color: #f39c12;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1.1rem;
        cursor: pointer;
        margin-top: 20px;
      }
      button:hover {
        background-color: #e67e22;
      }
      .button-container {
        text-align: center;
      }
    </style>
</head>
<body>
  <h1>Réservation <?= strtoupper(htmlspecialchars($ville)) ?></h1>

  <div class="formulaire">
    <form method="POST" action="paiement.php" onsubmit="return calculerPrixTotal()">
      <label for="depart">Date de départ :</label>
      <input type="date" id="depart" name="depart" min="<?= date('Y-m-d') ?>" required />

      <label for="return">Date de fin :</label>
      <input type="date" id="return" name="return" min="<?= date('Y-m-d') ?>" required />

      <label for="adults">Nombre d'adultes :</label>
      <input type="number" id="adults" name="adults" min="1" value="1" required onchange="genererChampsPersonnes()" />

      <label for="enfants">Nombre d'enfants :</label>
      <input type="number" id="enfants" name="enfants" min="0" value="0" required onchange="genererChampsPersonnes()" />

      <div id="personnes-container"></div>

      <input type="hidden" name="ville" value="<?= htmlspecialchars($ville) ?>" />
      <input type="hidden" id="prix_total" name="prix_total" value="0" />

      <div class="button-container">
        <button type="submit">Confirmer la réservation</button>
      </div>
    </form>
  </div>

  <script>
    function genererChampsPersonnes() {
      const container = document.getElementById("personnes-container");
      const nbAdultes = parseInt(document.getElementById("adults").value) || 0;
      const nbEnfants = parseInt(document.getElementById("enfants").value) || 0;

      container.innerHTML = "";

      for (let i = 1; i <= nbAdultes; i++) {
        container.innerHTML += `
          <div class="personne">
            <h3>Adulte ${i}</h3>
            <label for="adulte_${i}_nom">Nom complet :</label>
            <input type="text" name="personnes[adulte_${i}][nom]" required>
            <label>Options :</label>
            <div class="option">
              <div><input type="checkbox" name="personnes[adulte_${i}][options][hebergement]" value="1"> Hébergement</div>
              <div><input type="checkbox" name="personnes[adulte_${i}][options][restauration]" value="1"> Restauration</div>
              <div><input type="checkbox" name="personnes[adulte_${i}][options][extra]" value="1"> Extra</div>
            </div>
          </div>`;
      }

      for (let i = 1; i <= nbEnfants; i++) {
        container.innerHTML += `
          <div class="personne">
            <h3>Enfant ${i}</h3>
            <label for="enfant_${i}_nom">Nom complet :</label>
            <input type="text" name="personnes[enfant_${i}][nom]" required>
            <label for="enfant_${i}_age">Âge :</label>
            <input type="number" name="personnes[enfant_${i}][age]" min="0" max="17" required>
            <label>Options :</label>
            <div class="option">
              <div><input type="checkbox" name="personnes[enfant_${i}][options][hebergement]" value="1"> Hébergement</div>
              <div><input type="checkbox" name="personnes[enfant_${i}][options][restauration]" value="1"> Restauration</div>
              <div><input type="checkbox" name="personnes[enfant_${i}][options][extra]" value="1"> Extra</div>
            </div>
          </div>`;
      }
    }

    function calculerPrixTotal() {
      let total = 0;
      const checkboxes = document.querySelectorAll("input[type='checkbox']:checked");

      // Simple tarif : 20€/option
      total = checkboxes.length * 20;

      document.getElementById("prix_total").value = total.toFixed(2);
      return true;
    }

    document.addEventListener("DOMContentLoaded", genererChampsPersonnes);
  </script>
</body>
</html>

<?php
// Vérification si le formulaire a bien été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données soumises
    $nomUtilisateur = $_POST['nom'];
    $emailUtilisateur = $_POST['email'];
    $ville = $_POST['ville'];
    $prixTotal = $_POST['prix_total'];
    $nombreEnfants = $_POST['enfants'];
    $agesEnfants = explode(",", $_POST['age_enfants']);  // Convertir la chaîne des âges en tableau

    // Calculer le prix des enfants de moins de 2 ans (seulement l'hébergement)
    $prixHébergementParEnfant = 50;  // Exemple : coût d'hébergement par enfant
    $prixTotalHébergementEnfants = 0;

    foreach ($agesEnfants as $age) {
        $age = trim($age);  // Nettoyer les espaces
        if (is_numeric($age) && $age < 2) {
            // Enfant de moins de 2 ans, il ne paye que l'hébergement
            $prixTotalHébergementEnfants += $prixHébergementParEnfant;
        }
    }

    // Ajouter l'hébergement des enfants de moins de 2 ans au prix total
    $prixTotal += $prixTotalHébergementEnfants; 
} else {
    // Redirection si l'utilisateur n'a pas soumis le formulaire
    header('Location: formulaire.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation des Détails</title>
    <style>
        /* Exemple de ton CSS de mise en page personnalisé */
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9; }
        h1 { text-align: center; color: #333; }
        .confirmation { 
            margin-top: 20px; 
            padding: 20px; 
            background-color: #fff; 
            border: 1px solid #ddd; 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        .confirmation p { font-size: 1.2rem; margin: 10px 0; }
        .button-container { text-align: center; margin-top: 20px; }
        button { padding: 12px 20px; background-color: #f39c12; color: white; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer; }
        button:hover { background-color: #e67e22; }
    </style>
</head>
<body>

    <h1>Confirmez vos Détails</h1>

    <div class="confirmation">
        <p><strong>Nom :</strong> <?= htmlspecialchars($nomUtilisateur) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($emailUtilisateur) ?></p>
        <p><strong>Ville :</strong> <?= htmlspecialchars($ville) ?></p>
        <p><strong>Prix Total Initial :</strong> <?= htmlspecialchars($prixTotal) ?> €</p>
        <p><strong>Nombre d'Enfants :</strong> <?= htmlspecialchars($nombreEnfants) ?></p>

        <?php if ($nombreEnfants > 0): ?>
            <p><strong>Enfants de moins de 2 ans :</strong> 
                <?php 
                    // Affichage des enfants de moins de 2 ans
                    $enfantsMoinsDeDeuxAns = array_filter($agesEnfants, function($age) {
                        return $age < 2;
                    });
                    echo count($enfantsMoinsDeDeuxAns) . " enfant(s)";
                ?>
            </p>
            <p><strong>Coût d'Hébergement des Enfants :</strong> <?= $prixTotalHébergementEnfants ?> €</p>
        <?php endif; ?>
    </div>

    <div class="button-container">
        <form action="paiement.php" method="POST">
            <input type="hidden" name="ville" value="<?= htmlspecialchars($ville) ?>">
            <input type="hidden" name="prix_total" value="<?= htmlspecialchars($prixTotal) ?>">
            <input type="hidden" name="nom" value="<?= htmlspecialchars($nomUtilisateur) ?>">
            <input type="hidden" name="email" value="<?= htmlspecialchars($emailUtilisateur) ?>">
            <input type="hidden" name="nombre_enfants" value="<?= htmlspecialchars($nombreEnfants) ?>">
            <input type="hidden" name="ages_enfants" value="<?= htmlspecialchars(implode(",", $agesEnfants)) ?>">

            <button type="submit">Passer au Paiement</button>
        </form>
    </div>

</body>
</html>

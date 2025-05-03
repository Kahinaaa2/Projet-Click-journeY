<?php
session_start();

// Initialisation
$mot = strtolower(trim($_POST['recherche'] ?? ''));
$voyage = [];
$parPage = 8;
$pageActuelle = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$debut = ($pageActuelle - 1) * $parPage;

if (!empty($mot) && file_exists("proposition.txt")) {
    $lignes = file("proposition.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lignes as $ligne) {
        $infos = explode(";", $ligne);
        // Vérifie si au moins un champ de la ligne contient le mot recherché
        foreach ($infos as $info) {
            if (stripos($info, $mot) !== false) {
                $voyage[] = $infos;
                break; // Ajouter chaque ligne une seule fois
            }
        }
    }
}

$totalVoyages = count($voyage);
$pagesTotales = ceil($totalVoyages / $parPage);
$voyagesAffiches = array_slice($voyage, $debut, $parPage);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de recherche</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            background-color: #0e0047;
            margin: 0;
            min-height: 100vh;
            color: #0e0047;
        }

        .conteneur-blocs {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }

        .element-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fefbec;
            border-radius: 8px;
            text-align: center;
            padding: 15px;
            width: 250px;
        }

        .element-info p {
            color: #0e0047;
            font-weight: bold;
            margin: 4px 0;
        }

        h1 {
            color: #fefae0;
            text-align: center;
            margin-top: 20px;
        }

        .pagination {
            text-align: center;
            margin: 20px;
        }

        .pagination a {
            padding: 8px 12px;
            background: #0e0047;
            color: white;
            margin: 2px;
            border-radius: 5px;
            text-decoration: none;
        }

        .pagination a.active {
            background: #0a0033;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Résultats pour "<?= htmlspecialchars($mot) ?>"</h1>

<div class="conteneur-blocs">
<?php foreach ($voyagesAffiches as $v): 
    $pays = $v[0] ?? '';
    $ville = ucfirst(strtolower($v[1] ?? ''));
    $film = ucfirst(strtolower($v[2] ?? ''));
    $prix = $v[3] ?? '';
?>
    <div class="element-info">
        <p><strong>Pays :</strong> <?= htmlspecialchars($pays) ?></p>
        <p><strong>Ville :</strong> <?= htmlspecialchars($ville) ?></p>
        <p><strong>Film :</strong> <?= htmlspecialchars($film) ?></p>
        <p><strong>Prix :</strong> <?= htmlspecialchars($prix) ?> €</p>
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

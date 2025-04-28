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
        foreach ($infos as $info) {
            if (stripos($info, $mot) !== false) {
                $voyage[] = $infos;
                break;
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
    <title>Recherche Rapide</title>
    <link rel="stylesheet" type="text/css" href="cssgeneral.css">
    <style>
        input[name="recherche"] {
            width: 50vw; 
            height: 4vw;
            border-color: #f1b410ff;
            border-width: 0.35vw;
        }

        a {
            text-decoration: none;
        }

        button {
            width: 10vw; 
            height: 4vw;
            background-color: #f1b410ff;
        }

        #recherche {
            font-size: 1.25vw;
            text-align: center;
        }

        .carree {
            width: 100vw;
            height: auto;
            margin: 0 auto;
            padding: 2vw 0;
            display: flex;
            justify-content: center;  
            align-items: center;
        }

        .conteneur-blocs {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }

        .element-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #0e0047;
            border-radius: 8px;
            text-align: center;
            justify-content: center;
            padding: 15px;
            width: 75vw;
        }

        .element-info p {
            color: #fefbec;
            font-weight: bold;
            margin: 4px 0;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 12px;
            margin: 2px;
            border-radius: 5px;
            text-decoration: none;
            color: #0e0047;
        }

        .pagination a.active {
            background: #f2eed6;
            font-weight: bold;
        }

       a:hover {
  transform: scale(1.05); 
}

    </style>
</head>

<body style="background: #FEFAE0">

<?php include 'header.php'; ?>

<div class="carree">
    <form method="POST" action="">
        <input type="text" name="recherche" placeholder="Entrez un mot-clé..." id="recherche" required>
        <button type="submit" id="recherche">Rechercher</button>
    </form>
</div>

<?php if (!empty($mot)): ?>

<div class="conteneur-blocs">
    <?php foreach ($voyagesAffiches as $v): 
        $pays = $v[0] ?? '';
        $ville = ucfirst(strtolower($v[1] ?? ''));
        $film = ucfirst(strtolower($v[2] ?? ''));
        $prix = $v[3] ?? '';
    ?>
    <a href="<?= strtolower(urlencode($pays . '-' . $ville)) ?>.html">
        <div class="element-info">
            <p><strong>Pays :</strong> <?= htmlspecialchars($pays) ?></p>
            <p><strong>Ville :</strong> <?= htmlspecialchars($ville) ?></p>
            <p><strong>Film :</strong> <?= htmlspecialchars($film) ?></p>
            <p><strong>Prix :</strong> <?= htmlspecialchars($prix) ?> €</p>
        </div>
        </a>
    <?php endforeach; ?>
</div>

<div class="pagination">
    <?php for ($i = 1; $i <= $pagesTotales; $i++): ?>
        <a class="<?= ($i == $pageActuelle) ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
<?php endif; ?>

</body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["recherche"]) && $_GET["recherche"] !== "") {
    $_SESSION['recherche'] = $_GET["recherche"];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche Rapide</title>
    <link rel="stylesheet" type="text/css" href="cssgeneral.css">
    <style>
        body{
          --couleurfond: #fefbec;
          --couleurtextepage: #0e0047;
          --couleurcarrepage: #f2eed6;
          --couleurecherche: #f1b410;
          --couleurecherchetexte: black;
        }
        
        body.sombre{
          --couleurfond: #2c206b;
          --couleurtextepage: #fefbec;
          --couleurcarrepage: #0e0047;
          --couleurecherche: #4d4090;
          --couleurecherchetexte: #fefbec;
        }
        
        body{
          background-color: var(--couleurfond);
        }
        
        
        input[name="recherche"] {
            width: 50vw; 
            height: 4vw;
            border-color: var(--couleurecherche);
            border-width: 0.35vw;
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
        }

        #recherche {
            font-size: 1.25vw;
            text-align: center;
        }

        .carree {
            width: 100vw;
            height: 10vw;
            margin: 0 auto;
            padding: 2vw 0;
            display: flex;
            justify-content: center;  
            align-items: center;
        }
        
        .carree form {
    display: flex;
    align-items: center;
    gap: 1vw; /* Espace entre les éléments */
}

.carree select[name="tri"],
.carree button {
    height: 4vw;
    font-size: 1vw;
    box-sizing: border-box;
}

.carree button:hover{
    background-color: #0e0047;
    color: #FEFAE0;
}

.carree select[name="tri"]{
    border: 0.15vw solid #f1b410ff;
    border-left-color: #e2e2e2;
    border-top-color: #e2e2e2;
    border-right-color: #969696;
    border-bottom-color: #969696;
    text-align: center;
}

.carree select[name="tri"]:hover{
    border-left-color: #969696;
    border-top-color: #969696;
    border-right-color: #e2e2e2;
    border-bottom-color: #e2e2e2;
    background-color: #0e0047;
    color: #fefbec;
    cursor: pointer;
}

.carree select[name="tri"] {
    width: 17vw;
    background-color: var(--couleurecherche);
    color: var(--couleurecherchetexte);
}

select[name="tri"] option {
    background-color: #f1b410ff;
}

.carree button {
    width: 10vw;
    background-color: var(--couleurecherche);
    color: var(--couleurecherchetexte);
    cursor: pointer;
}


        select[name="tri"] {
            height: 4vw;
            font-size: 1vw;
            margin-left: 1vw;
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
            border-radius: 0.4vw;
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
            margin-bottom: 4vw;
        }

        .pagination a {
            padding: 8px 12px;
            margin: 2px;
            border-radius: 5px;
            text-decoration: none;
            color: var(--couleurtextepage);
        }

        .pagination a.active {
            background-color: var(--couleurcarrepage);
            font-weight: bold;
        }

        a:hover {
            transform: scale(1.05); 
        }

        .bloc {
            position: relative;
            height: 35vw;
            width: 70vw;
            margin: 0 auto 2vw auto;
            overflow: hidden;
        }

        .bloc img,
        .bloc video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.5s ease;
            z-index: 1;
        }

        .bloc video {
            opacity: 0;
            z-index: 0;
        }

        .bloc:hover .img1 {
            opacity: 0;
        }

        .bloc form button {
            all: unset;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 2;
            cursor: pointer;
        }

        .bloc2 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 17vw;
            width: 30vw;
            background-color: rgba(14,00,71,0.5);
            z-index: 3;
            border-radius: 2vw;
            text-align: center;
            color: white;
            font-size: 1.5vw;
            cursor: pointer;
            pointer-events: auto;
        }

        .bloc2:hover {
            transform: translate(-50%, -50%) scale(1.1);
            background-color: rgba(14,00,71,1);
        }

        h4 {
            margin: 0 auto;
            margin-top: 2vw;
            width: 28vw;
            font-size: 1.5vw;
        }

        .texte2 {
            font-size: 1.1vw;
        }

        .echec {
            color: #0e0047;
            margin: 0 auto;
            margin-left: 28vw;
            font-size: 1.3vw;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="carree">
    <form method="GET" action="">
        <input type="text" name="recherche" placeholder="Entrez un mot-clé..." id="recherche" required value="<?= isset($_SESSION['recherche']) ? htmlspecialchars($_SESSION['recherche']) : '' ?>">
        <select name="tri">
            <option value="">Filtrer</option>
            <option value="prix1croissant" <?= (isset($_GET['tri']) && $_GET['tri'] === 'prix1croissant') ? 'selected' : '' ?>>Prix croissant (Transport)</option>
            <option value="prix1decroissant" <?= (isset($_GET['tri']) && $_GET['tri'] === 'prix1decroissant') ? 'selected' : '' ?>>Prix décroissant (Transport)</option>
            <option value="prix2croissant" <?= (isset($_GET['tri']) && $_GET['tri'] === 'prix2croissant') ? 'selected' : '' ?>>Prix croissant (Hébergement)</option>
            <option value="prix2decroissant" <?= (isset($_GET['tri']) && $_GET['tri'] === 'prix2decroissant') ? 'selected' : '' ?>>Prix décroissant (Hébergement)</option>
            <option value="prix3croissant" <?= (isset($_GET['tri']) && $_GET['tri'] === 'prix3croissant') ? 'selected' : '' ?>>Prix croissant (Restaurants)</option>
            <option value="prix3decroissant" <?= (isset($_GET['tri']) && $_GET['tri'] === 'prix3decroissant') ? 'selected' : '' ?>>Prix décroissant (Restaurants)</option>
            <option value="prix4croissant" <?= (isset($_GET['tri']) && $_GET['tri'] === 'prix4croissant') ? 'selected' : '' ?>>Prix croissant (Sortie Extra)</option>
            <option value="prix4decroissant" <?= (isset($_GET['tri']) && $_GET['tri'] === 'prix4decroissant') ? 'selected' : '' ?>>Prix décroissant (Sortie Extra)</option>
        </select>
        <button type="submit">Rechercher</button>
    </form>
</div>

<?php
$resultats = [];
$tri = isset($_GET['tri']) ? $_GET['tri'] : '';

if (isset($_SESSION['recherche'])) {
    $recherche = $_SESSION['recherche'];
    $nomFichierPropositions = 'proposition.csv';
    $recherche = str_replace(" ", "", $recherche);
    $recherche = strtolower($recherche);
    $recherche = ucfirst($recherche);

    if (file_exists($nomFichierPropositions)) {
        $fichier = fopen($nomFichierPropositions, 'r');
        while (($ligne = fgets($fichier)) !== false) {
            $ligne = trim($ligne);
            $mot = explode(';', $ligne);

            if (in_array($recherche, $mot)) {
                $nomfichierfilm = "destinations/" . $mot[0] . "-" . $mot[2] . ".csv";
                if (file_exists($nomfichierfilm)) {
                    $lignes2 = file($nomfichierfilm);
                    if ($lignes2) {
                        $resultats[] = $lignes2;
                    }
                }
            }
        }
        fclose($fichier);
    }
}

// Tri des résultats avant pagination
if ($tri === 'prix1croissant') {
    usort($resultats, function($a, $b) {
        return floatval(trim($a[14])) <=> floatval(trim($b[14]));
    });
} elseif ($tri === 'prix1decroissant') {
    usort($resultats, function($a, $b) {
        return floatval(trim($b[14])) <=> floatval(trim($a[14]));
    });
}
if ($tri === 'prix2croissant') {
    usort($resultats, function($a, $b) {
        return floatval(trim($a[15])) <=> floatval(trim($b[15]));
    });
} elseif ($tri === 'prix2decroissant') {
    usort($resultats, function($a, $b) {
        return floatval(trim($b[15])) <=> floatval(trim($a[15]));
    });
}
if ($tri === 'prix3croissant') {
    usort($resultats, function($a, $b) {
        return floatval(trim($a[16])) <=> floatval(trim($b[16]));
    });
} elseif ($tri === 'prix3decroissant') {
    usort($resultats, function($a, $b) {
        return floatval(trim($b[16])) <=> floatval(trim($a[16]));
    });
}
if ($tri === 'prix4croissant') {
    usort($resultats, function($a, $b) {
        return floatval(trim($a[17])) <=> floatval(trim($b[17]));
    });
} elseif ($tri === 'prix4decroissant') {
    usort($resultats, function($a, $b) {
        return floatval(trim($b[17])) <=> floatval(trim($a[17]));
    });
}

// Pagination
$total_resultats = count($resultats);
$resultats_par_page = 3;
$total_pages = ceil($total_resultats / $resultats_par_page);
$page_actuelle = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$depart = ($page_actuelle - 1) * $resultats_par_page;
$resultats_affiches = array_slice($resultats, $depart, $resultats_par_page);

// Affichage des résultats
foreach ($resultats_affiches as $lignes2) {
    ?>
    <div class="bloc">
        <img src="image/<?= trim($lignes2[2]) ?>_2.1.1.jpg" alt="Image" class="img1">
        <video muted loop>
            <source src="video/<?= trim($lignes2[2]) ?>.mov" type="video/mp4">
        </video>

        <form method="GET" action="destination-film.php">
            <button type="submit" name="choix_destination_film" value="<?= trim($lignes2[13]) ?>"></button>
        </form>

        <div class="bloc2">
            <h4><?= trim($lignes2[23]) ?></h4>
            <p>A partir de : <b><?= trim($lignes2[14]) ?>€</b></p>
            <p>Options disponibles :<br>
                <div class="texte2"><b>Logement - Restaurants - Sortie Extra</b></div>
            </p>
            <form method="GET" action="destination-film.php">
                <button type="submit" name="choix_destination_film" value="<?= trim($lignes2[13]) ?>"></button>
            </form>
        </div>
    </div>
    <?php
}

// Pagination avec tri conservé
if ($total_pages > 1) {
    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = $i == $page_actuelle ? 'active' : '';
        $tri_param = $tri ? '&tri=' . $tri : '';
        echo '<a class="' . $active . '" href="?page=' . $i . '&recherche=' . urlencode($_SESSION['recherche']) . $tri_param . '">' . $i . '</a>';
    }
    echo '</div>';
}

// Aucun résultat
if ($total_resultats === 0 && $recherche!= "") {
    echo '<div class="echec">
            <p>Aucun résultat trouvé pour "<b>' . htmlspecialchars($_SESSION['recherche']) . '</b>".</p>
          </div>';
}
?>

<script>
document.querySelectorAll('.bloc').forEach(bloc => {
    const video = bloc.querySelector('video');

    bloc.addEventListener('mouseenter', () => {
        video.style.opacity = '1';
        video.play();
    });

    bloc.addEventListener('mouseleave', () => {
        video.pause();
        video.currentTime = 0;
        video.style.opacity = '0';
    });
});
</script>

</body>
</html>


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
    <link rel="stylesheet" type="text/css" href="profil.css">
    <style>

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

       a:hover {
        transform: scale(1.05); 
      }

    </style>
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
        $ville = ucfirst(strtolower($v[1] ?? ''));
        $pays = ucfirst(strtolower($v[2] ?? ''));
        $film = ucfirst(strtolower($v[3] ?? ''));
        $date1 = $v[4] ?? '';
        $date2 = $v[5] ?? '';
        $statut = $v[6] ?? '';
        $prix = $v[7] ?? '';
    ?>
<a href="recap.php">
        <div class="element-info">
            <p><strong>Ville :</strong> <?= htmlspecialchars($ville) ?></p>
            <p><strong>Pays :</strong> <?= htmlspecialchars($pays) ?></p>
            <p><strong>Film :</strong> <?= htmlspecialchars($film) ?></p>
            <p><strong>Date de départ :</strong> <?= htmlspecialchars($date1) ?></p>
            <p><strong>Date de retour :</strong> <?= htmlspecialchars($date2) ?></p>
            <p><strong>Statut :</strong> <?= htmlspecialchars($statut) ?></p>
            <p><strong>Prix :</strong> <?= htmlspecialchars($prix) ?></p>
        </div>
    </a>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>



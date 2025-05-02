<?php
session_start();

if (!isset($_SESSION['connect'])) {
    header("Location: connexion.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: Page-accueil.php");
    exit();
}

$clients = [];
$clientsFiltres = [];
$parPage = 12;

// Lecture depuis clients.txt
if (file_exists("clients.txt")) {
    $lignes = file("clients.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lignes as $ligne) {
        $infos = explode(";", $ligne);
        if (isset($infos[4]) && trim($infos[4]) === "client") {
            $clientsFiltres[] = $infos;
        }
    }
}

// Comptage fait ici, comme tu voulais
$totalClients = count($clientsFiltres);
$pagesTotales = ceil($totalClients / $parPage);
$pageActuelle = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$debut = ($pageActuelle - 1) * $parPage;
$clientsAffiches = array_slice($clientsFiltres, $debut, $parPage);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Utilisateurs</title>
    <style>
        
         body {
            display: flex;
            flex-direction: column;
            background-color: #0e0047;
            margin: 0;
            justify-content: center;
            color: #0e0047;
        }

        .conteneur-blocs {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         gap: 20px;
        }

        .element-info {
          display: flex;
          flex-direction: column;
          align-items: center;
          font-size: 16px;
          background-color:#fefbec;
          border-radius: 8px;
          text-align: center;
          padding: 10px;
          width: 18vw;
          padding: 15px;
          height: 10vw;

         }

        .element-info p {
          color: #0e0047;
          font-weight: bold;
          margin: 4px 0;
         }

         a {
          text-decoration: none;
         }

        h1 {
            color: #fefae0;
            text-align: center;
            margin-bottom: 2vw;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
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
            color: white;
            font-weight: bold;
        }

        button {
            width: 7vw;
            height: 3vw;
            background: #0e0047;
            border: none;
            color: white;
            font-size: 0.9vw;
            cursor: pointer;
            border-radius: 15px;
            margin-top: 10px;
        }

        .b button:hover {
        background: #005e33;
    }

    .a button:hover{
        background: #980000;
    }

    .boutons {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-top: 10px;
}

    </style>
</head>
<body>

 <a href="admin.php"><p>🚪</p></a>


<h1>Liste des utilisateurs</h1>

<div class="conteneur-blocs">
<?php foreach ($clientsAffiches as $mot): 
    $email = $mot[0] ?? '';
    $prenom = ucfirst(strtolower($mot[2] ?? ''));
    $nom = ucfirst(strtolower($mot[3] ?? ''));
    $date = $mot[5] ?? '';
    $dob = $mot[6] ?? '';
    $adresse = $mot[7] ?? '';
?>
    <div class="element-info">
        <p><strong>Nom :</strong> <?= $nom ?></p>
        <p><strong>Prénom :</strong> <?= $prenom ?></p><br>
        <p><strong>Email :</strong> <?= $email ?></p><br>
        <p><strong>Inscrit le</strong> <?= $date ?></p><br>
        <div class ="boutons">
        <div class = "b">
      <a href="changer.php?email=<?= urlencode($email) ?>"><button>Changer en Administrateur</button></a>
  </div>
</div>
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
